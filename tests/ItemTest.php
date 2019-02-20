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
}