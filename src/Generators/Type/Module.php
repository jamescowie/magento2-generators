<?php

namespace Jcowie\Generators\Type;

use \Symfony\Component\Filesystem\Filesystem;

class Module
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
        if ($this->filesystem->exists($path)) {
            throw new \Exception("Error module already exists");
        }

        return $this->filesystem->mkdir($path, 0700);
    }
}
