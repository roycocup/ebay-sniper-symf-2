<?php

namespace App\Service;

use App\Entity\{IConnection, Item};

class ItemService 
{
    protected $item, $connection;

    public function __construct(Item $item, IConnection $connection)
    {
        $this->item = $item;
        $this->connection = $connection;
    }

    public function populate(): Item
    {
        $data = $this->connection->getData();
        $this->item->setTitle($data['title']);
        $this->item->setRawData($data);

        return $this->item;
    }
}