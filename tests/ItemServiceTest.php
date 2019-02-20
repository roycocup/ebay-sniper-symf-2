<?php

namespace App\Tests;

use App\Entity\{Item, IConnection};
use App\Service\ItemService;

class ItemServiceTest extends TestBase
{

    /** Given an url we are able to collect the rest of the info for the item from ebay */
    public function test_can_populate_an_item()
    {
        $item = new Item();
        $this->assertNull($item->getTitle());

        $connection = $this->getMockBuilder(IConnection::class)->getMock();
        $connection->method('getData')->willReturn('This is the real title');

        $itemService = new ItemService($item, $connection);
        $item = $itemService->populate();

        $this->assertEquals('This is the real title', $item->getTitle());
    }
}