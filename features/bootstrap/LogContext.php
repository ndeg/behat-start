<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;

/**
 * Defines application features from the specific context.
 */
class LogContext implements Context
{
    /**
     * @BeforeScenario
     *
     * @param BeforeScenarioScope $scope
     */
    public function before(BeforeScenarioScope $scope){
        file_exists('./var/log/test.log') ? unlink('./var/log/test.log') : '';
    }

}