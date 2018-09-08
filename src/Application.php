<?php

namespace Alva\AppConsole;

use Alva\AppConsole\Helpers\Base;
use Symfony\Component\Console\Application as SymfonyConsole;

/**
 * Class Application
 *
 * @package Alva\AppConsole
 */
final class Application
{
    /**
     * @var array
     */
    private $commands = [];
    /**
     * @var SymfonyConsole
     */
    private $app;

    /**
     * Application constructor.
     */
    public function __construct()
    {
        $this->app = new SymfonyConsole();
    }

    /**
     * Run Application
     *
     * @throws \Exception
     */
    public function run(): void
    {
        $this->setCommands()->addCommands()->run();
    }

    /**
     * Set commands
     *
     * @return Application
     */
    private function setCommands(): self
    {
        $this->commands = (new Base())->getCollectionClass(PATH_COMMANDS, NAMESPACE_COMMANDS);

        return $this;
    }

    /**
     * Register command
     *
     * @return SymfonyConsole
     */
    private function addCommands(): SymfonyConsole
    {
        foreach ($this->commands as $class) {
            $this->app->add(new $class);
        }

        return $this->app;
    }
}