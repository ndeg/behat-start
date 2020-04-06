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
     * @Then the command have in his log :logtext with :level
     */
    public function theCommandHaveInHisLogWith($logtext, $level)
    {
        $this->logService = new LogService();
        $logs = $this->logService->getLogMessageByLevel('[' . strtoupper($level) . ']');

        $log = null;
        if (count($logs)) {
            $log = $logs[0];
        }
        Assert::eq($log, $logtext);
    }
}
