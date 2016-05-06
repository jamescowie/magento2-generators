<?php


namespace Jcowie\Generators\Test\Unit\Console\Commands;

use Symfony\Component\Console\Tester\CommandTester;
use \Jcowie\Generators\Commands\GenerateModuleCommand;

class GenerateModuleCommandTest extends \PHPUnit_Framework_TestCase
{
    /** @var  GenerateModuleCommand */
    protected $command;

    public function setUp()
    {
        $this->command = new GenerateModuleCommand();
    }

    /**
     * @expectedException \RuntimeException
     * @expectedExceptionMessage Not enough arguments
     */
    public function testThatAErrorIsThrownIfNoModuleNameIsSet()
    {
        $commandTests = new CommandTester($this->command);
        $commandTests->execute([]);
    }
}
