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
            ->setDescription('Add two or more integers.')
            ->setHelp('Add two or more integers.')
            ->addArgument('numbers', InputArgument::IS_ARRAY, 'The two integers or more to add.')
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
            // C'est un peu bourrin, mais ça permet de montrer comment gérer les exceptions.
            throw new \Exception(
                sprintf(
                    '%d number(s) were passed to the command. Only two are allowed.',
                    count($numbers)
                )
            );
        }
        $sum = 0;
        foreach ($numbers as $number) {
            $sum += (int)$number;
        }
        $output->writeln(
            sprintf(
                'The integer sum of '.implode(', ',$numbers).' is '.$sum.'.'
            )
        );
        return 0;
    }
}