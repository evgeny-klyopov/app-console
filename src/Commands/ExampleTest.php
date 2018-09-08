<?php

namespace Alva\AppConsole\Commands;

use Alva\AppConsole\Command;

/**
 * Class Test
 *
 * @package Alva\AppConsole\Commands
 */
class ExampleTest extends Command
{
    /**
     * Execute
     *
     * @return mixed|void
     */
    protected function exec()
    {
        $this->writeSuccess('message success');
        $this->writeInfo('message info');
        $this->writeError('message error');
        $this->writeQuestion('message question');
        $this->writeComment('message comment');

        $this->getHelper('exampleTest')->printMessage();

        $this->debug('Debug Level 1', 1);
        $this->debug('Debug Level 2', 2);
        $this->debug('Debug Level 3', 3);
    }
}