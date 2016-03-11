<?php

namespace Jcowie\GeneratorsModule\Model;

use \Symfony\Component\Filesystem\Filesystem;

class ModuleFolderGenerator
{
    /** @var \Symfony\Component\Filesystem\Filesystem $filesystem */
    private $filesystem;

    /**
     * ModuleFolderGenerator constructor.
     * @param \Symfony\Component\Filesystem\Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    /**
     * @param $path
     * @throws \Exception
     */
    public function make($path)
    {
        $basePath = 'app/code/';

        if ($this->filesystem->exists($basePath . $path)) {
            throw new \Exception("Error module already exists");
        }

        return $this->filesystem->mkdir($basePath . $path, 0700);
    }
}
