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
    abstract protected function executeCommand(array $numbers, OutputInterface $output);

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

        return $this->executeCommand($numbers, $output);
    }
}
