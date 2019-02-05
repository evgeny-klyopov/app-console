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
     *
     * @param string|null $name
     * @param string|null $version
     */
    public function __construct(string $name = null, string $version = null)
    {
        $this->app = new SymfonyConsole($name, $version);
        $this->setCommands()
            ->addCommands();
    }

    /**
     * Get symfony application
     *
     * @return SymfonyConsole
     */
    public function getSymfonyConsole(): SymfonyConsole
    {
        return $this->app;
    }

    /**
     * Runs the current application.
     *
     * @return int 0 if everything went fine, or an error code
     *
     * @throws \Exception When running fails. Bypass this when {@link setCatchExceptions()}.
     */
    public function run()
    {
        return $this->app->run();
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
     * @return Application
     */
    private function addCommands(): Application
    {
        foreach ($this->commands as $class) {
            $this->app->add(new $class);
        }

        return $this;
    }
}