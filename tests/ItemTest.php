<?php

namespace App\Tests;

use App\Entity\Item;
use App\Service\ItemService;

class ItemTest extends TestBase
{
    public function test_item_has_url_property()
    {
        $this->assertClassHasAttribute('url', Item::class);
    }

    public function test_item_has_title_property()
    {
        $this->assertClassHasAttribute('title', Item::class);
    }

    public function test_item_has_raw_information_from_ebay()
    {
        $this->assertClassHasAttribute('rawData', Item::class);
    }
    
    public function test_rawdata_is_returned_as_array()
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
        $item->setRawData($expectData);

        $this->assertEquals($expectData, $item->getRawData());
    }

}