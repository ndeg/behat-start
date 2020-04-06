<?php

namespace App\Command;

use App\Helper\CommandHelper;
use App\Service\LogService;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MultiplyCommand extends OperationCommand
{
    protected static $defaultName = 'app:operations:multiply';

    public function __construct(string $name = '', LogService $logService = null)
    {
        parent::__construct($name ? $name : self::$defaultName, $logService);
    }

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
        $this->operationName = CommandHelper::MULTIPLY_COMMAND_NAME;
        $this->message       = 'The integer multiply of %s is %s.';
        $this->numbers       = $input->getArgument('numbers');
        $this->resultNumber  = 1;

        foreach ($this->numbers as $number) {
            $this->resultNumber *= $number;
        }

        return parent::execute($input, $output);
    }
}