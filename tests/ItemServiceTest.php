<?php

namespace App\Tests;

use App\Entity\{Item, IConnection};
use App\Service\ItemService;

class ItemServiceTest extends TestBase
{
    protected $connection; 

    public function setUp()
    {
        $this->connection = $this->getMockBuilder(IConnection::class)->getMock();
    }

    /** Given an url we are able to collect the rest of the info for the item from ebay */
    public function test_can_populate_an_item()
    {
        $item = new Item();
        $this->assertNull($item->getTitle());

        $this->connection->method('getData')->willReturn(['title'=>'This is the real title']);

        $itemService = new ItemService($item, $this->connection);
        $item = $itemService->populate();

        $this->assertEquals('This is the real title', $item->getTitle());
    }

    public function test_all_data_is_stored_on_items_rawdata_property()
    {
        $item = new Item();    
        $expectData = [
            'title' => 'some title',
            'ID' => 1424354,
            'status' => 'some status',
            'images' => [
                ['name' => 'image-name', 'size' => 5000, 'url'=>'http://somecat.com'],
                ['name' => 'image-name', 'size' => 5000, 'url'=>'http://somecat.com'],
            ],
        ];
        $this->connection->method('getData')->willReturn($expectData);

        $itemService = new ItemService($item, $this->connection);
        $item = $itemService->populate();

        $this->assertEquals($expectData, $item->getRawData());
    }

}