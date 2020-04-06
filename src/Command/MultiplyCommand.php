<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MultiplyCommand extends Command
{
    protected static $defaultName = 'app:operations:multiply';

    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this
            ->setDescription('Multiply integers.')
            ->setHelp('Multiply integers.')
            ->addArgument('numbers', InputArgument::IS_ARRAY, 'The integers to multiply.')
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
                '%d number(s) were passed to the command. Only several are allowed.',
                count($numbers)
            ));

            return 1;
        }

        $result = 1;
        foreach ($numbers as $number) {
            $result *= $number;
        }

        $output->writeln(
            sprintf(
                'The integer multiply of %s is %s.',
                implode(' and ', $numbers),
                $result
            )
        );

        return 0;
    }
}