<?php

namespace Alva\AppConsole\Traits;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Trait writeMessage
 *
 * @package Alva\AppConsole\Traits
 */
trait writeMessage
{
    /**
     * @var string
     */
    protected static $MESSAGE_INFO = 'fg=cyan';
    /**
     * @var string
     */
    protected static $MESSAGE_SUCCESS = 'fg=green';
    /**
     * @var string
     */
    protected static $MESSAGE_QUESTION = 'question';
    /**
     * @var string
     */
    protected static $MESSAGE_ERROR = 'error';
    /**
     * @var string
     */
    protected static $MESSAGE_COMMENT = 'comment';

    /**
     * @var InputInterface
     */
    protected $input;
    /**
     * @var OutputInterface
     */
    protected $output;

    /**
     * @param InputInterface $input
     *
     * @return writeMessage
     */
    public function setInput(InputInterface $input): self
    {
        $this->input = $input;

        return $this;
    }

    /**
     * @param OutputInterface $output
     *
     * @return writeMessage
     */
    public function setOutput(OutputInterface $output): self
    {
        $this->output = $output;

        return $this;
    }

    /**
     * Print format or return message
     *
     * @param        $messages
     * @param string $type
     * @param bool   $return
     * @param bool   $lineBreak
     *
     * @return string
     */
    protected function write($messages, string $type, bool $return = false, bool $lineBreak = true)
    {
        $messages = '<' . $type . '>' . $messages . '</' . $type . '>' . ($lineBreak ? PHP_EOL : '');

        if ($return) return $messages;

        $this->output->write($messages);
    }

    /**
     * Print format or return success message
     *
     * @param      $messages
     * @param bool $return
     * @param bool $lineBreak
     */
    protected function writeSuccess($messages, bool $return = false, bool $lineBreak = true)
    {
        $this->write($messages, self::$MESSAGE_SUCCESS, $return, $lineBreak);
    }

    /**
     * Print format or return info message
     *
     * @param      $messages
     * @param bool $return
     * @param bool $lineBreak
     */
    protected function writeInfo($messages, bool $return = false, bool $lineBreak = true)
    {
        $this->write($messages, self::$MESSAGE_INFO, $return, $lineBreak);
    }

    /**
     * Print format or return error message
     *
     * @param      $messages
     * @param bool $return
     * @param bool $lineBreak
     */
    protected function writeError($messages, bool $return = false, bool $lineBreak = true)
    {
        $this->write($messages, self::$MESSAGE_ERROR, $return, $lineBreak);
    }

    /**
     * Print format or return question message
     *
     * @param      $messages
     * @param bool $return
     * @param bool $lineBreak
     */
    protected function writeQuestion($messages, bool $return = false, bool $lineBreak = true)
    {
        $this->write($messages, self::$MESSAGE_QUESTION, $return, $lineBreak);
    }

    /**
     * Print format or return comment message
     *
     * @param      $messages
     * @param bool $return
     * @param bool $lineBreak
     */
    protected function writeComment($messages, bool $return = false, bool $lineBreak = true)
    {
        $this->write($messages, self::$MESSAGE_COMMENT, $return, $lineBreak);
    }
}