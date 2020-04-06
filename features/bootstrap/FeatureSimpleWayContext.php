<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;
use Webmozart\Assert\Assert;


/**
 * Defines application features from the specific context.
 */
class FeatureSimpleWayContext implements Context
{
    /** @var string */
    private $output;

    /**
     * @When I call :command with :arg2
     * @When I call :command with :arg2 and :arg3
     * @When I call :command with :arg2 and :arg3 and :arg4
     */
    public function iCallWithAnd($command, $arg2, $arg3 = null, $arg4 = null)
    {
        $this->output = shell_exec(
            sprintf(
                "php bin/console %s %s %s %s",
                $command,
                $arg2,
                $arg3,
                $arg4
            )
        );
    }

    /**
     * @Then I should see :text
     */
    public function iShouldSee($text)
    {
        if ("" === $text) {
            Assert::string("", $text);
        } else {
            Assert::contains(trim($this->output), $text);
        }
    }
}
