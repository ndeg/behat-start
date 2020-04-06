<?php

use App\Command\AddCommand;
use App\Command\MultiplyCommand;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Tester\CommandTester;
use Webmozart\Assert\Assert;

class CommandContext implements Context
{
    /** @var KernelInterface */
    private $kernel;

    /** @var CommandTester */
    private $commandTester;

    /** @var Exception */
    private $commandException;

    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @param TableNode $tableNode
     *
     * @When I run the :command command with arguments:
     */
    public function iRunTheAppOperationsAddCommandWithArguments(string $command, TableNode $tableNode)
    {
        $application = new Application($this->kernel);

        //Change class by command
        if($command == 'app:operations:add'){
            $application->add(new AddCommand());
        } else {
            $application->add(new MultiplyCommand());
        }

        $command = $application->find($command);

        $arguments = [];
        foreach ($tableNode->getRowsHash() as $key => $value) {
            $arguments[$key] = $value;
        }

        try {
            $this->buildTester($command)->execute($arguments);
        } catch (Exception $exception) {
            $this->commandException = $exception;
        }
    }

    /**
     * @param string $expectedOutput
     *
     * @Then /^the command output should be "([^"]*)"$/
     */
    public function theCommandOutputShouldBe($expectedOutput)
    {
        $current = trim($this->commandTester->getDisplay());
        if ($current != $expectedOutput) {
            throw new LogicException(sprintf('Current output is: [%s]', $current));
        }
    }

    /**
     * @param string $expectedException
     *
     * @Then /^the command exception should be of type "([^"]*)"$/
     */
    public function theCommandExceptionShouldBe($expectedException)
    {
        if (get_class($this->commandException) != $expectedException) {
            throw new LogicException(sprintf('Current exception is: [%s]', $this->commandException));
        }
    }

    /**
     * @Then the command exception message should be :arg1
     */
    public function theCommandExceptionMessageShouldBe($arg1)
    {
        Assert::eq($this->commandException->getMessage(), $arg1);
    }

    /**
     * @Then the command return code is :arg1
     */
    public function theCommandReturnCodeIs($arg1)
    {
        Assert::eq($this->commandTester->getStatusCode(), $arg1);
    }

    private function buildTester(Command $command)
    {
        $this->commandTester = new CommandTester($command);

        return $this->commandTester;
    }
}
