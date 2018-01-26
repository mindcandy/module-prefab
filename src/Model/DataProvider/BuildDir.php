<?php

namespace MindCandy\Prefab\Model\DataProvider;


use Magento\Store\Api\Data\StoreInterface;
use MindCandy\Prefab\Api\DataProviderInterface;
use MindCandy\Prefab\Model\Filesystem;

class BuildDir implements DataProviderInterface
{
    /**
     * @var Filesystem
     */
    private $filesystem;

    public function __construct(
        Filesystem $filesystem
    ) {
        $this->filesystem = $filesystem;
    }

    public function getData(StoreInterface $store)
    {
        $root = $this->filesystem->getRootDirectory();
        $storeCode = $store->getCode();

        return "{$root}/pub/static/prefab_build/{$storeCode}";
    }


}