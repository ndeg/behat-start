<?php

namespace App\Service;

use App\Helper\CommandHelper;

class LogService
{
    /** @var string  */
    const LEVEL_INFO            = '[INFO]';
    /** @var string  */
    const LEVEL_WARNING         = '[WARNING]';
    /** @var string  */
    const FILENAME              = __DIR__ . '/../../var/log/behat.log';

    /**
     * @param string $message
     * @param string $level
     *
     * @throws \Exception
     */
    public function log(string $message = '', string $level = self::LEVEL_INFO)
    {
        if ('' === $message) {
            throw new \Exception('Empty message log.');
        }

        file_put_contents(
            self::FILENAME,
            sprintf(
                '%s%s',
                $level,
                $message . PHP_EOL
            ),
            FILE_APPEND
        );
    }

    public function clearLogFile()
    {
        unlink(self::FILENAME);
    }

    public function getLogMessageByLevel($filterLevel = self::LEVEL_INFO)
    {
        $logs        = $this->getLogByLevel($filterLevel);
        $logMessages = [];
        foreach ($logs as $log) {
            $logExploded = null;
            if (null !== strpos($log, CommandHelper::ADD_COMMAND_NAME)) {
                $logExploded = explode(CommandHelper::ADD_COMMAND_NAME, $log);
            } else if(null !== strpos($log, CommandHelper::MULTIPLY_COMMAND_NAME)) {
                $logExploded = explode(CommandHelper::MULTIPLY_COMMAND_NAME, $log);
            }
            if (null !== $logExploded) {
                $logMessages[] = $logExploded[1];
            }
        }
        var_dump($logMessages);
        return $logMessages;
    }

    public function getLogByLevel($filterLevel = self::LEVEL_INFO)
    {
        $logs         = $this->getAllLogs();
        $logsFiltered = [];
        foreach ($logs as $log) {
            if (0 === strpos($log, $filterLevel)) {
                $logsFiltered[] = $log;
            }
        }

        return $logsFiltered;
    }

    public function getAllLogs()
    {
        $file = fopen(self::FILENAME, 'r');
        $logs = fread($file, filesize(self::FILENAME));
        fclose($file);

        $logLines = explode(PHP_EOL, $logs);
        // remove last line with "" only
        unset($logLines[count($logLines) - 1]);

        return $logLines;
    }
}