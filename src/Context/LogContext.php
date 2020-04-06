<?php

namespace App\Context;

class LogContext
{
    /** @var string  */
    const LEVEL_INFO            = '[INFO]';
    /** @var string  */
    const LEVEL_WARNING         = '[WARNING]';
    /** @var string  */
    const ADD_COMMAND_NAME      = '[AddCommand]';
    /** @var string  */
    const MULTIPLY_COMMAND_NAME = '[MultiplyCommand]';
    /** @var string  */
    const FILENAME              = __DIR__ . '/../../var/log/behat.log';

    /**
     * @param string $message
     * @param string $level
     *
     * @throws \Exception
     */
    public static function log(string $message = '', string $level = self::LEVEL_INFO) {
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
}