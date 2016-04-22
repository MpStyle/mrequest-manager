<?php

namespace mpstyle\request\test\book;

use mpstyle\request\book\RequestBook;
use mpstyle\request\entity\FilterType;

class RequestBookTest extends \PHPUnit_Framework_TestCase
{
    private $fileContent = "";

    public function testTransform()
    {
        $requestBook = new RequestBook();

        $request = $requestBook->transform( json_decode( $this->fileContent, true ) );

        $this->assertEquals( 1, $request->getPagination()->getPage() );
        $this->assertEquals( 20, $request->getPagination()->getPageSize() );

        $this->assertEquals( 3, count( $request->getFilters() ) );
        $this->assertEquals( 1, count( $request->getOrderClauses() ) );

        $this->assertEquals( "fieldName1", $request->getOrderClauses()[0]->getFieldName());
        $this->assertEquals( "orderDirection1", $request->getOrderClauses()[0]->getOrderDirection());

        $this->assertEquals( "name1", $request->getFilters()[0]->getName());
        $this->assertEquals( "type1", $request->getFilters()[0]->getType());
        $this->assertEquals( "value1", $request->getFilters()[0]->getValue());

        $this->assertEquals( "name2", $request->getFilters()[1]->getName());
        $this->assertEquals( "type2", $request->getFilters()[1]->getType());
        $this->assertEquals( 1, $request->getFilters()[1]->getValue());

        $this->assertEquals( "name4", $request->getFilters()[2]->getName());
        $this->assertEquals( false, $request->getFilters()[2]->getValue());
        $this->assertEquals( FilterType::BOOLEAN, $request->getFilters()[2]->getType());
    }

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        parent::setUp();

        $this->fileContent = file_get_contents( __DIR__ . '/../resources/request.json' );
    }

    /**
     * Tears down the fixture, for example, close a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        parent::tearDown();
    }


}
