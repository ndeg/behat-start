<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class LogCommand extends Command
{

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //TODO check file in log and return value to compare in features
    }
}