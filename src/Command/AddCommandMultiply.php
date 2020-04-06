<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AddCommandMultiply extends Command
{
    protected static $defaultName = 'app:operations:multiply';

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
     * {@inheritDoc}
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $numbers = $input->getArgument('numbers');

        if (!is_array($numbers)) {
            $numbers = [$numbers];
        }

        if (2 < count($numbers)) {
            // C'est un peu bourrin, mais ça permet de montrer comment gérer les exceptions.
            throw new \Exception(
                sprintf(
                    '%d number(s) were passed to the command. Only two are allowed.',
                    count($numbers)
                )
            );
        }

        $sum = (int) $numbers[0] * (int) $numbers[1];

        $output->writeln(
            sprintf(
                'The integer sum of %g and %g is %d.',
                $numbers[0],
                $numbers[1],
                $sum
            )
        );

        return 0;
    }
}