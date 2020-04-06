<?php

namespace App\Command;

use App\Context\LogContext;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
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
        $this->operationName = LogContext::MULTIPLY_COMMAND_NAME;
        $this->message       = 'The integer multiply of %s is %s.';
        $this->numbers       = $input->getArgument('numbers');
        $this->resultNumber  = 1;

        foreach ($this->numbers as $number) {
            $this->resultNumber *= $number;
        }

        return parent::execute($input, $output);
    }
}