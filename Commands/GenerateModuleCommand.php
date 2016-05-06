<?php

namespace Jcowie\Generators\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;

use Jcowie\Generators\Generator\ModuleGenerator;

class GenerateModuleCommand extends Command
{
    private $generator;

    public function __construct(ModuleGenerator $generator)
    {
        $this->generator = $generator;
        parent::__construct('ModuleGenerator');
    }

    public function configure()
    {
        $this->setName('generate:module');
        $this->setDescription('Generate all the folders required for a simple module');
        $this->addArgument(
            'module_name',
            InputArgument::REQUIRED,
            'Module Name (Vendor / Module )'
        );

        parent::configure();
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        if ($this->generator->generate($input->getArgument('module_name'))) {
            $output->writeln("Generated the module ok");
        } else {
            $output->writeln('Error module not generated');
        }

    }
}
