<?php
declare(strict_types=1);

namespace KnotPhp\Framework;

use KnotLib\Console\Router\ShellDispatcherInterface;
use KnotLib\Kernel\Kernel\ApplicationInterface;
use KnotLib\Kernel\Module\ModuleFactoryInterface;
use KnotPhp\Module\KnotConsole\ArrayConfigShellRouterModule;

final class DefaultConsoleModuleFactory implements ModuleFactoryInterface
{
    /** @var ShellDispatcherInterface */
    private $dispatcher;

    /** @var array */
    private $routing_rule;

    /**
     * DefaultConsoleModuleFactory constructor.
     *
     * @param ShellDispatcherInterface $dispatcher
     * @param array $routing_rule
     */
    public function __construct(ShellDispatcherInterface $dispatcher, array $routing_rule)
    {
        $this->dispatcher = $dispatcher;

        $new_rules = [];
        foreach($routing_rule as $key => $config){
            $new_rules[$key] = $config;
            $new_rules['/index.php' . $key] = $config;
            $new_rules['/index-dev.php' . $key] = $config;
        }

        $this->routing_rule = $new_rules;
    }

    /**
     * {@inheritDoc}
     */
    public function createModule(string $module_class, ApplicationInterface $app)
    {
        if ($module_class === ArrayConfigShellRouterModule::class){
            return new ArrayConfigShellRouterModule($this->dispatcher,$this->routing_rule);
        }
        return null;
    }

}