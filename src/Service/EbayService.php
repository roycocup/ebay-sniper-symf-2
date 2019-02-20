<?php

namespace App\Service;

use App\Entity\IConnection;
use DTS\eBaySDK\Finding\Services\FindingService;
use DTS\eBaySDK\Shopping\Services;
use DTS\eBaySDK\Shopping\Types;

class EbayService implements IConnection
{
    public $url;

    private function isServiceAlive()
    {
        $service = new FindingService([
            'apiVersion' => '1.13.0',
            'globalId'   => 'EBAY-UK'
        ]);
        return $service ? true : false;
    }

    public function getCredentials()
    {
        return [
            'appId' => getenv('EBAY_SDK_APP_ID'),
            'devId' => getenv('EBAY_SDK_DEV_ID'),
            'certId' => getenv('EBAY_SDK_CERT_ID')
        ];
    }

    // https://developer.ebay.com/DevZone/shopping/docs/Concepts/ShoppingAPI_FormatOverview.html
    public function getData()
    {
        if (!$this->isServiceAlive())
            return null;

        $credentials = $this->getCredentials();

        // $service = new Services\ShoppingService([
        //     'credentials' => $credentials
        // ]);
        
        // $request = new Types\GeteBayTimeRequestType();
        
        // $response = $service->geteBayTime($request);

        // dump($response); die;

        // $config = [
        //     'apiVersion' => \DTS\eBaySDK\Shopping\Services\ShoppingService::API_VERSION,
        //     'siteId'=> '3', // 3 ebay UK, 0-US, 2-Can, 15-aus, 16-austria, 23-belgium, 71 france // http://www.ebay.com/gds/ALL-EBAY-WORLD-SITES-/10000000204201621/g.html
        //     'credentials' => $credentials,
        // ];
        
        // $service = new Services\ShoppingService($config);

        // $request = new Types\GetSingleItemRequestType();
        // $request->ItemID = "333002967311";
        // $response = $service->getSingleItem($request);

        // dump($response); die;

        // if (isset($response->Errors)) {
        //     foreach ($response->Errors as $error) {
        //         printf(
        //             "%s: %s\n%s\n\n",
        //             'Error',
        //             $error->ShortMessage,
        //             $error->LongMessage
        //         );
        //     }
        // }
        // $ebayItem = $response->Item;

    }
}