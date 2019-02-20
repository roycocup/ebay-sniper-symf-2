<?php

namespace App\Service;

use App\Entity\IConnection;
use DTS\eBaySDK\Finding\Services\FindingService;

class EbayService implements IConnection
{
    public $url;

    public function getData()
    {
        $service = new FindingService([
            'apiVersion' => '1.13.0',
            'globalId'   => 'EBAY-UK'
        ]);
        return $service;
    }
}