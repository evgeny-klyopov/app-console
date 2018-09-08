<?php

namespace Alva\AppConsole\Helpers;

use Alva\AppConsole\Helper;

/**
 * Class Base
 *
 * @package Alva\AppConsole\Helpers
 */
class Base extends Helper
{
    /**
     * Find and set class in directory path
     *
     * @param string $directoryPath
     * @param string $namespace
     *
     * @return array
     */
    public function getCollectionClass(string $directoryPath, string $namespace): array
    {
        $collectionClass = [];
        foreach (\glob($directoryPath . DS . '*.php') as $filename) {
            $key                   = \basename($filename, '.php');
            $collectionClass[$key] = '\\' . $namespace . '\\' . $key;
        }

        return $collectionClass;
    }
}