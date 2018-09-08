<?php

namespace Alva\AppConsole;

use Alva\AppConsole\Traits\writeMessage;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Alva\AppConsole\Helpers\Base;
use Symfony\Component\Console\Input\InputArgument;
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
        $this->setInput($input)->setOutput($output)->registerHelpers();
        $debugLevel = $input->getArgument('debugLevel');

        if (null !== $debugLevel && \preg_match('/^v+$/', $debugLevel)) {
            $this->debugLevel = \mb_strlen($debugLevel);
        }

        $this->exec();
    }

    /**
     *  Configure command
     *
     * @throws \ReflectionException
     */
    protected function configure()
    {
        $this->config();
        $this->addArgument('debugLevel', InputArgument::OPTIONAL, 'Debug');
    }

    /**
     * Un camel case, ExampleTest -> example-test
     *
     * @param string $str
     *
     * @return string
     */
    private function unCamelCase(string $str): string
    {
        $str = preg_replace('/([a-z])([A-Z])/', "\\1-\\2", $str);
        $str = strtolower($str);

        return $str;
    }

    /**
     * Executes the current command.
     *
     * @return mixed
     */
    abstract protected function exec();

    /**
     * Configure command
     *
     * @return mixed
     * @throws \ReflectionException
     */
    protected function config()
    {
        $action = $this->unCamelCase((new \ReflectionClass($this))->getShortName());

        $this
            ->setName('app:' . $action)
            ->setAliases([$action])
            ->setDescription($action)
            ->setHelp('./mt ' . $action . ' or ./mt app:' . $action);
    }

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