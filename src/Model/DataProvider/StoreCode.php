<?php

namespace MindCandy\Prefab\Model\DataProvider;

use Magento\Store\Api\Data\StoreInterface;
use MindCandy\Prefab\Api\DataProviderInterface;

class StoreCode implements DataProviderInterface
{
    public function getData(StoreInterface $store)
    {
        return $store->getCode();
    }
}