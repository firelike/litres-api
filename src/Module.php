<?php
namespace Firelike\LitRes;

use Zend\ModuleManager\Feature\ConsoleUsageProviderInterface;
use Zend\Console\Adapter\AdapterInterface as Console;

class Module implements ConsoleUsageProviderInterface
{

    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }


    public function getConsoleUsage(Console $console)
    {
        return array(
            // Describe available commands
            'litres browser [--search=] [--verbose|-v]' => 'call browser service method',
            'litres genres [--verbose|-v]' => 'call genres service method',
            'litres persons [--search_person=] [--verbose|-v]' => 'call persons service method',

            // Describe expected parameters
            array(
                '--verbose|-v',
                '(optional) turn on verbose mode'
            ),
        );
    }
}