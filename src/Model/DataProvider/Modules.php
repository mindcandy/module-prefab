<?php

namespace MindCandy\Prefab\Model\DataProvider;


use Magento\Framework\Component\ComponentRegistrar;
use Magento\Store\Api\Data\StoreInterface;
use MindCandy\Prefab\Api\DataProviderInterface;

class Modules implements DataProviderInterface
{
    /**
     * @var ComponentRegistrar
     */
    private $componentRegistrar;

    public function __construct(
        ComponentRegistrar $componentRegistrar
    ) {
        $this->componentRegistrar = $componentRegistrar;
    }

    public function getData(StoreInterface $store)
    {
        return \json_encode($this->componentRegistrar->getPaths(ComponentRegistrar::MODULE), JSON_FORCE_OBJECT);
    }
}