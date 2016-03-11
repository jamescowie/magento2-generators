<?php

namespace spec\PocketGuide\Generators\Model;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ModuleFolderGeneratorSpec extends ObjectBehavior
{
    function let(\Symfony\Component\Filesystem\Filesystem $filesystem)
    {
        $this->beConstructedWith($filesystem);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('PocketGuide\Generators\Model\ModuleFolderGenerator');
    }

    function it_should_throw_an_exception_if_a_module_folder_already_exists($filesystem)
    {
        $path = 'app/code/test/test/';
        $filesystem->exists($path)->willReturn(true);
        $this->shouldThrow(new \Exception("Error module already exists"))->duringMake($path);
    }

    function it_should_create_a_folder_given_a_valid_path($filesystem)
    {
        $path = 'app/code/test/test';
        $filesystem->exists($path)->willReturn(false);
        $filesystem->mkdir($path, 0700)->willReturn(true);
        $this->make($path)->shouldReturn(true);
    }
}
