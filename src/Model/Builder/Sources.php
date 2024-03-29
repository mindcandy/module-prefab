<?php

namespace MindCandy\Prefab\Model\Builder;

use Magento\Framework\Component\ComponentRegistrar;
use MindCandy\Prefab\Api\BuilderInterface;
use MindCandy\Prefab\Model\Filesystem;

class Sources implements BuilderInterface
{
    /**
     * @var ComponentRegistrar
     */
    private $componentRegistrar;

    /**
     * @var Filesystem
     */
    private $filesystem;

    public function __construct(
        ComponentRegistrar $componentRegistrar,
        Filesystem $filesystem
    ) {
        $this->componentRegistrar = $componentRegistrar;
        $this->filesystem = $filesystem;
    }

    public function build()
    {
        // Iterate through all modules
        $modules = $this->componentRegistrar->getPaths(ComponentRegistrar::MODULE);

        foreach ($modules as $name => $path) {
            $relativePath = $this->filesystem->getRelativeDirectory($path);
            $this->copyFilesForModule($relativePath, $name);
        }
    }

    /**
     * @param $path
     * @param $name
     */
    public function copyFilesForModule($path, $name)
    {
        $root = $this->filesystem->getLocation();
        $sourceDir = "{$path}/prefab";
        $destinationDir = "{$root}/prefab/{$name}";

        if ($this->filesystem->getFilesystem()->has($destinationDir)) {
            $this->filesystem->getFilesystem()->deleteDir($destinationDir);
        }

        foreach ($this->filesystem->getFilesystem()->listContents($sourceDir, true) as $file) {
            if ($file['type'] !== 'file') {
                continue;
            }

            $source = $file['path'];
            $destination = str_replace($sourceDir, $destinationDir, "/{$file['path']}");

            $this->filesystem->getFilesystem()->copy($source, $destination);
        }
    }
}