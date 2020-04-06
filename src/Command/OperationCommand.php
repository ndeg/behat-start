<?php

namespace App\Command;

use App\Service\LogService;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

abstract class OperationCommand extends Command
{
    /** @var string */
    protected $operationName;
    /** @var string */
    protected $message;
    /** @var string */
    protected $numbers;
    /** @var string */
    protected $resultNumber;
    /** @var LogService */
    protected $logService;

    protected static $defaultName = 'app:operations:base';

    public function __construct(string $name = '', LogService $logService = null)
    {
        $this->logService = $logService;
        parent::__construct($name ? $name : self::$defaultName);
    }

    /**
     * {@inheritDoc}
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!is_array($this->numbers)) {
            $this->numbers = [$this->numbers];
        }

        if (2 > count($this->numbers)) {
            $message = sprintf(
                '%d number(s) were passed to the command. Only several are allowed.',
                count($this->numbers)
            );

            $this->writeln($output, $message, LogService::LEVEL_WARNING);

            return 1;
        }

        $message = sprintf(
            $this->message,
            implode(' and ', $this->numbers),
            $this->resultNumber
        );

        $this->writeln($output, $message);

        return 0;
    }

    /**
     * @param OutputInterface $output
     * @param string          $message
     * @param string          $level
     *
     * @throws \Exception
     */
    public function writeln(OutputInterface $output, $message = '', $level = LogService::LEVEL_INFO)
    {
        if ('' === $message) {
            throw new \Exception('Empty message log.');
        }

        $output->writeln($message);
        $this->logService->log($this->operationName . $message, $level);
    }
}