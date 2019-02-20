<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Service\{ItemService, EbayService};
use app\Entity\Item;

class EbayConnectionTest extends WebTestCase
{
    public function test_service_makes_actual_request_to_ebay()
    {
        $this->markTestIncomplete();
        // make a request to sandbox
        $item = new Item();
        $item->setUrl('https://ebay.com/test/');
        $itemService = new ItemService($item, new EbayService());
        $itemService->populate();

        $this->assertNotNull($item->getRawData());
    }
}
