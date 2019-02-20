<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use App\Service\{ItemService, EbayService};
use app\Entity\Item;

class EbayConnectionTest extends WebTestCase
{
    public function test_service_makes_actual_request_to_ebay()
    {
        // make a request to sandbox
        $ebay = new EbayService();
        $ebay->url = 'https://ebay.com/test/';

        $data = $ebay->getData();

        $this->assertNotNull($data);
    }
}
