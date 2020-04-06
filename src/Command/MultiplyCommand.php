<?php

namespace App\Command;

use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class MultiplyCommand extends OperationCommand
{
    protected static $defaultName = 'app:operations:multiply';

    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this
            ->setDescription('Multiply two integers.')
            ->setHelp('Multiply two integers.')
            ->addArgument('numbers', InputArgument::IS_ARRAY, 'The two integers to multiply.')
        ;
    }

//    /**
//     * @param array $numbers
//     * @param OutputInterface $output
//     * @return int
//     */
//    protected function executeCommand(array $numbers, OutputInterface $output)
//    {
//        $sum = 1;
//        foreach ($numbers as $number) {
//            $sum *= (int) $number;
//        }
//
//        $output->writeln(
//            sprintf(
//                'The integer product of %s is %d.',
//                implode(', ', $numbers),
//                $sum
//            )
//        );
//
//        return 0;
//    }
}
