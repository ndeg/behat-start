<?php

namespace App\Command;

use App\Context\LogContext;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
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
            ->setDescription('Add integers.')
            ->setHelp('Add integers.')
            ->addArgument('numbers', InputArgument::IS_ARRAY, 'The integers to add.')
        ;
    }

    /**
     * {@inheritDoc}
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->operationName = LogContext::ADD_COMMAND_NAME;
        $this->message       = 'The integer sum of %s is %s.';
        $this->numbers       = $input->getArgument('numbers');
        $this->resultNumber  = array_sum($this->numbers);

        return parent::execute($input, $output);
    }
}