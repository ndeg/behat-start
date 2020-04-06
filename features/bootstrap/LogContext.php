<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Symfony\Component\HttpKernel\KernelInterface;


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
//        shell_exec('rm -rf var/logs/*');
    }

}
