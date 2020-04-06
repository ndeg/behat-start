<?php

namespace App\Command;

use Symfony\Component\Console\Input\InputArgument;

class MultiplyCommand extends OperationsCommand
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
}