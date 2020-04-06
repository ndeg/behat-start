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
            ->addArgument('numbers', InputArgument::IS_ARRAY, 'The X integers to multiply.')
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

        if (count($numbers) < 2) {
            $output->writeln(
                sprintf(
                    'The command need at least two number(s). %d were passed.',
                    count($numbers)
                )
            );
            return 1;
        }

        $sum = 0;
        foreach ($numbers as $number){
            $sum *= (int) $number;
        }

        $output->writeln(
            sprintf(
                'The integer product of the %g numbers is %d.',
                count($numbers),
                $sum
            )
        );

        return 0;
    }
}