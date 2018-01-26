<?php

namespace MindCandy\Prefab\Model\Builder;

use MindCandy\Prefab\Api\BuilderInterface;
use MindCandy\Prefab\Model\Generator\PackageJson as PackageJsonGenerator;
use MindCandy\Prefab\Model\Filesystem;
use MindCandy\Prefab\Model\Config\Data as PrefabConfig;

class PackageJson implements BuilderInterface
{
    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @var PackageJsonGenerator
     */
    private $packageJsonGenerator;

    /**
     * @var PrefabConfig
     */
    private $prefabConfig;

    public function __construct(
        Filesystem $filesystem,
        PackageJsonGenerator $packageJsonGenerator,
        PrefabConfig $prefabConfig
    ) {
        $this->filesystem = $filesystem;
        $this->packageJsonGenerator = $packageJsonGenerator;
        $this->prefabConfig = $prefabConfig;
    }

    public function build()
    {
        $config = $this->prefabConfig->get(null);
        $contents = $this->packageJsonGenerator->generate($config);

        $location = $this->filesystem->getLocation();
        $name = 'package.json';

        $this->filesystem->getFilesystem()->put(
            "{$location}/{$name}",
            $contents
        );
    }
}