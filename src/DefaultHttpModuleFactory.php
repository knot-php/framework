<?php
declare(strict_types=1);

namespace KnotPhp\Framework;

use KnotLib\Kernel\Kernel\ApplicationInterface;
use KnotLib\Kernel\Module\ModuleFactoryInterface;
use KnotLib\Router\DispatcherInterface;
use KnotPhp\Module\KnotRouter\ArrayConfigKnotRouterModule;

final class DefaultHttpModuleFactory implements ModuleFactoryInterface
{
    /** @var DispatcherInterface */
    private $dispatcher;

    /** @var array */
    private $routing_rule;

    /**
     * DefaultHttpModuleFactory constructor.
     *
     * @param DispatcherInterface $dispatcher
     * @param array $routing_rule
     */
    public function __construct(DispatcherInterface $dispatcher, array $routing_rule)
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
        if ($module_class === ArrayConfigKnotRouterModule::class){
            return new ArrayConfigKnotRouterModule($this->dispatcher,$this->routing_rule);
        }
        return null;
    }

}