<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConsoleCommand extends Command
{
    protected static $defaultName = 'app:console-command';

    protected function configure()
    {

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

    }
}