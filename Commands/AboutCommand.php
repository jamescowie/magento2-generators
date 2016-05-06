<?php

namespace Jcowie\Generators\Commands;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Command\Command;

class AboutCommand extends Command
{
    public function configure()
    {
        $this->setName('generate:about');
        $this->setDescription('About the generators project.');

        parent::configure();
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln("The generators are a set of commands that will generate M2 classes from the CLI to speed up development");
    }
}
