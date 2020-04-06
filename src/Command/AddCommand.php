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

        if (count($numbers) < 2) {
            $output->writeln(
                sprintf(
                    '%d number(s) were passed to the command. At least two are allowed.',
                    count($numbers)
                )
            );

            return 1;
            // C'est un peu bourrin, mais ça permet de montrer comment gérer les exceptions.
//            throw new \Exception(
//                sprintf(
//                    '%d number(s) were passed to the command. At least two are allowed.',
//                    count($numbers)
//                )
//            );
        }

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