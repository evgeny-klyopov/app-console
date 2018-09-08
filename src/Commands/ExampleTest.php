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
     *  Configure command
     */
    protected function configure()
    {
        $this
            ->setName('app:example-test')
            ->setAliases(['example-test'])
            ->setDescription('example-test')
            ->setHelp('./mt example-test or ./mt app:example-test');
    }

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
    }
}