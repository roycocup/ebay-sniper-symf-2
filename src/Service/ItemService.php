<?php

namespace App\Service;

use App\Entity\{IConnection, Item};

class ItemService 
{
    private $item; 
    private $connection;

    protected $data;  

    public function __construct(Item $item, IConnection $connection)
    {
        $this->item = $item;
        $this->connection = $connection;
    }

    private function populateInternalData()
    {
        $this->data = $this->connection->getData();
    }

    public function populate(): Item
    {
        $this->populateInternalData();
        $this->item->setTitle($this->data['title']);
        $this->item->setRawData($this->data);

        return $this->item;
    }
}