<?php

namespace MindCandy\Prefab\Model\DataProvider;


use Magento\Store\Api\Data\StoreInterface;
use MindCandy\Prefab\Api\DataProviderInterface;
use MindCandy\Prefab\Model\Filesystem;

class BaseDir implements DataProviderInterface
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
        return $this->filesystem->getRootDirectory();
    }
}