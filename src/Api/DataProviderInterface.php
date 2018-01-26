<?php

namespace MindCandy\Prefab\Api;

use Magento\Store\Api\Data\StoreInterface;

interface DataProviderInterface
{
    public function getData(StoreInterface $store);
}
