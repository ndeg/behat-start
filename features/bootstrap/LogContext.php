<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;

/**
 * Class LogContext
 *
 * @author Guillaume Carlier <guillaume.carlier@cgi.com>
 */

class LogContext implements Context
{
    /**
     * @BeforeScenario
     * @param BeforeScenarioScope $scope
     */
    public function before(BeforeScenarioScope $scope)
    {
        var_dump('oui');die;
    }

}
