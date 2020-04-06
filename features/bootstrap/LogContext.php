<?php

    use App\Service\LogService;
    use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;
use Webmozart\Assert\Assert;


/**
 * Defines application features from the specific context.
 */
class LogContext implements Context
{
    /** @var LogService */
    protected $logService;

    /**
     * @Then the command have in his log :logtext
     */
    public function theCommandHaveInHisLog($logtext)
    {
        $this->logService = new LogService();
        Assert::eq($this->logService->getLogMessageByLevel()[0], $logtext);
    }
}
