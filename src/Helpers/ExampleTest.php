<?php

namespace Alva\AppConsole\Helpers;

use Alva\AppConsole\Helper;

/**
 * Example helper
 * Class ExampleTest
 *
 * @package Alva\AppConsole\Helpers
 */
class ExampleTest extends Helper
{
    /**
     * Print message
     */
    public function printMessage()
    {
        $this->output->write('print message in helper' . PHP_EOL);
    }
}