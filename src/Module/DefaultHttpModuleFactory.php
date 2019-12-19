<?php
declare(strict_types=1);

namespace KnotPhp\Framework\Module;

use KnotLib\Kernel\Kernel\ApplicationInterface;
use KnotLib\Kernel\Module\ModuleFactoryInterface;
use KnotLib\Router\DispatcherInterface;
use KnotPhp\Module\KnotRouter\ArrayConfigKnotRouterModule;

final class DefaultHttpModuleFactory implements ModuleFactoryInterface
{
    /** @var DispatcherInterface */
    private $dispatcher;

    /** @var array */
    private $routing_rules;

    /**
     * DefaultHttpModuleFactory constructor.
     *
     * @param DispatcherInterface $dispatcher
     * @param array $routing_rules
     */
    public function __construct(DispatcherInterface $dispatcher, array $routing_rules)
    {
        $this->dispatcher = $dispatcher;
        $this->routing_rules = $routing_rules;
    }

    /**
     * {@inheritDoc}
     */
    public function createModule(string $module_class, ApplicationInterface $app)
    {
        if ($module_class === ArrayConfigKnotRouterModule::class){
            return new ArrayConfigKnotRouterModule($this->dispatcher,$this->routing_rules);
        }
        return null;
    }

}