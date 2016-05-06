<?php

namespace Jcowie\Generators\Generator;

use \Symfony\Component\Filesystem\Filesystem;
use Jcowie\Generators\Compilers\TemplateCompiler;

class ModuleGenerator
{
    /** @var \Symfony\Component\Filesystem\Filesystem $filesystem */
    private $filesystem;

    /** @var TemplateCompiler $compiler */
    private $compiler;

    const APP_CODE_PATH = 'app/code/';

    /**
     * ModuleFolderGenerator constructor.
     * @param \Symfony\Component\Filesystem\Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem, TemplateCompiler $compiler)
    {
        $this->filesystem = $filesystem;
        $this->compiler = $compiler;
    }

    public function generate($name)
    {
        if ($this->filesystem->exists(self::APP_CODE_PATH . $name)) {
            throw new \Exception("Error module already exists");
        }

        return $this->buildFolders($name);
    }

    /**
     * Format the name of the module to be used in M2 land
     * @param $name
     * @return array
     */
    private function formatName($name)
    {
        $validName = explode('/', $name);

        return [
            ucfirst($validName[0]),
            ucfirst($validName[1])
        ];
    }

    private function buildFolders($name)
    {
        return [
            $this->filesystem->mkdir(self::APP_CODE_PATH . $name, 0700),
            $this->filesystem->dumpFile(
                self::APP_CODE_PATH . $name . '/etc/module.xml',
                $this->compiler->compile('etc/module.xml.txt', ['NAME' => 'test_test'])
            ),
            $this->filesystem->dumpFile(
                self::APP_CODE_PATH . $name . '/registration.php',
                $this->compiler->compile('registration.php.txt', ['NAME' => 'Test_Test'])
            ),
            $this->filesystem->dumpFile(
                self::APP_CODE_PATH . $name . '/composer.json',
                $this->compiler->compile('composer.json.txt', ['NAME' => 'Test_Test', 'NAMESPACE' => '\\\Test\\\Test\\\'])
            )
        ];
    }
}
