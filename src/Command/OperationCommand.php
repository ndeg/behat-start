<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class OperationCommand
 *
 * @package App\Command
 *
 * @author Guillaume Carlier <guillaume.carlier@cgi.com>
 */

abstract class OperationCommand extends Command
{
//    abstract protected function executeCommand(array $numbers, OutputInterface $output);

    /**
     * {@inheritDoc}
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $numbers = $input->getArgument('numbers');

        if (!is_array($numbers)) {
            $numbers = [$numbers];
        }

        if (count($numbers) < 2) {
            $output->writeln(
                sprintf(
                    '%d number(s) were passed to the command. At least two are allowed.',
                    count($numbers)
                )
            );

            return 1;
        }

        $command = explode(':', $input->getArgument('command'))[2];

        switch ($command) {
            case 'add':
                $operationName = 'sum';
                $sum = 0;
                foreach ($numbers as $number) {
                    $sum += (int) $number;
                }

                break;
            case 'multiply':
                $operationName = 'product';
                $sum = 1;
                foreach ($numbers as $number) {
                    $sum *= (int) $number;
                }

                break;
            default:
                $output->writeln(
                    sprintf(
                        "The command %s does not exists",
                        $command
                    )
                );

                return 2;
        }

        $output->writeln(
            sprintf(
                'The integer %s of %s is %d.',
                $operationName,
                implode(', ', $numbers),
                $sum
            )
        );

        return 0;
    }
}
