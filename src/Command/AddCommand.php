<?php

namespace App\Command;

use Symfony\Component\Console\Input\InputArgument;

class AddCommand extends OperationsCommand
{
    protected static $defaultName = 'app:operations:add';

    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this
            ->setDescription('Add integers.')
            ->setHelp('Add integers.')
            ->addArgument('numbers', InputArgument::IS_ARRAY, 'The X integers to add.')
        ;
    }
}