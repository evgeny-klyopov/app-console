<?php

namespace Alva\AppConsole;

use Alva\AppConsole\Traits\writeMessage;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Alva\AppConsole\Helpers\Base;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Base class
 * Class Command
 *
 * @package Alva\AppConsole
 */
abstract class Command extends SymfonyCommand
{
    use writeMessage;

    /**
     * Before run
     *
     * @param InputInterface  $input
     * @param OutputInterface $output
     *
     * @return int|null|void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->setInput($input)->setOutput($output)->registerHelpers()->exec();
    }

    /**
     * Executes the current command.
     *
     * @return mixed
     */
    abstract protected function exec();

    /**
     * Register helpers
     *
     * @return Command
     */
    private function registerHelpers(): self
    {
        foreach ($this->getHelpers() as $name => $object) {
            /** @var \Alva\AppConsole\Helper $helper */
            $helper = new $object();
            $helper->setInput($this->input)->setOutput($this->output);

            $this->getHelperSet()->set($helper, \lcfirst($name));
        }

        return $this;
    }

    /**
     * Get helpers
     *
     * @return array
     */
    private function getHelpers(): array
    {
        return (new Base())->getCollectionClass(PATH_HELPERS, NAMESPACE_HELPERS);
    }
}