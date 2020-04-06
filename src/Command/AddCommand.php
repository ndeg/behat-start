<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddCommand extends Command
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
            ->addArgument('numbers', InputArgument::IS_ARRAY, 'The integers to add.')
        ;
    }

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

        if (2 > count($numbers)) {
            $output->write(sprintf(
                '%d number(s) were passed to the command. Only two are allowed.',
                count($numbers)
            ));

            return 1;
        }

        $output->writeln(
            sprintf(
                'The integer sum of %s is %s.',
                implode(' and ', $numbers),
                array_sum($numbers)
            )
        );

        return 0;
    }
}