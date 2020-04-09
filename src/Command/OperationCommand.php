<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class OperationCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $numbers = $input->getArgument('numbers');
        if (!is_array($numbers)) {
            $numbers = [$numbers];
        }

        if (2 > count($numbers)) {
            $output->writeln(
                sprintf(
                    '%d number(s) were passed to the command. Only two are allowed.',
                    count($numbers)
                )
            );
            return 1;
        }

        $command = $input->getArgument('command');
        var_dump($command);
        die;

        $output->writeln(
            sprintf(
                'The integer sum of ' . implode(', ', $numbers) . ' is ' . $sum . '.'
            )
        );
        return 0;
    }


}