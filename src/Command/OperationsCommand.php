<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class OperationsCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $numbers = $input->getArgument('numbers');
        $logger = $this->get('logger');

        if (!is_array($numbers)) {
            $numbers = [$numbers];
        }

        if (count($numbers) < 2) {
            $output->writeln(
                sprintf(
                    'The command need at least two number(s). %d were passed.',
                    count($numbers)
                )
            );
            $logger->info('Error !');
            return 1;
        }

        $command   = $input->getArgument('command');
        $label = 'Error in command !';
        $result    = null;
        $return    = 1;

        if($command == 'app:operations:add'){
            $label = 'sum';
            $result = 0;
            foreach ($numbers as $number) {
                $result += (int) $number;
            }
            $return = 0;
        }else if($command == 'app:operations:multiply'){
            $label = 'product';
            $result = 1;
            foreach ($numbers as $number) {
                $result *= (int) $number;
            }
            $return = 0;
        }

        $output->writeln(
            sprintf(
                'The integer %s of the %g numbers is %d.',
                $label,
                count($numbers),
                $result
            )
        );

        return $return;
    }
}