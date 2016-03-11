<?php

namespace Jcowie\GeneratorsModule\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;

use Jcowie\GeneratorsModule\Model\ModuleFolderGenerator as Generator;

class GeneratorCommand extends Command
{
    /** @var \Jcowie\GeneratorsModule\Model\ModuleFolderGenerator $generator */
    private $generator;

    /**
     * @param \Jcowie\GeneratorsModule\Model\ModuleFolderGenerator $generator
     */
    public function __construct(Generator $generator)
    {
        $this->generator = $generator;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName('generate:module');
        $this->setDescription('Build a magento 2 module from the command line');
        $this->addArgument(
            'name',
            InputArgument::REQUIRED,
            'Module Name ( Test/Module/ ) '
        );
        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->generator->make($input->getArgument('name'));
        $output->writeln("Module folder created");
    }
}
