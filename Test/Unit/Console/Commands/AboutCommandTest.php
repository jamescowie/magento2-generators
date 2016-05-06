<?php

namespace Jcowie\Generators\Test\Unit\Console\Commands;

use Jcowie\Generators\Commands\AboutCommand;
use Symfony\Component\Console\Tester\CommandTester;

class AboutCommandTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var AboutCommand
     */
    private $command;

    public function setUp()
    {
        $this->command = new AboutCommand();
    }

    public function testDisplayErrorMessage()
    {
        $commandTester = new CommandTester($this->command);
        $commandTester->execute([]);

        $this->assertContains(
            'The generators are a set of commands that will generate M2 classes from the CLI to speed up development',
            $commandTester->getDisplay()
        );
    }

}
