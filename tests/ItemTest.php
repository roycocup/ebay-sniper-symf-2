<?php

namespace App\Tests;

use App\Entity\Item;

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

    
}