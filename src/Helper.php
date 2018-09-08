<?php

namespace Alva\AppConsole;

use Alva\AppConsole\Traits\writeMessage;
use Symfony\Component\Console\Helper\Helper as SymfonyHelper;

/**
 * Class Helper
 *
 * @package Alva\AppConsole
 */
abstract class Helper extends SymfonyHelper
{
    use writeMessage;

    /**
     * Set name helper
     *
     * @return string
     */
    public function getName(): string
    {
        try {
            return (new \ReflectionClass($this))->getShortName();
        } catch (\ReflectionException $e) {
            echo 'Registration error for helpers class';
        }
    }
}