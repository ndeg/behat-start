<?php

namespace App\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class AddCommand extends OperationCommand
{
    protected static $defaultName = 'app:operations:add';

    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this
            ->setDescription('Add two integers.')
            ->setHelp('Add two integers.')
            ->addArgument('numbers', InputArgument::IS_ARRAY, 'The two integers to add.')
        ;
    }

    /**
     * @param array $numbers
     * @param OutputInterface $output
     * @return int
     */
    protected function executeCommand(array $numbers, OutputInterface $output)
    {
        $sum = 0;
        foreach ($numbers as $number) {
            $sum += (int) $number;
        }

        $output->writeln(
            sprintf(
                'The integer sum of %s is %d.',
                implode(', ', $numbers),
                $sum
            )
        );

        return 0;
    }
}