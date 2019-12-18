<?php
declare(strict_types=1);

namespace KnotPhp\Framework\Application;

use Throwable;

use Stk2k\Util\Util;

use KnotLib\Router\DispatcherInterface;
use KnotLib\Kernel\FileSystem\Dir;
use KnotLib\Kernel\Kernel\ApplicationInterface;
use KnotLib\Kernel\Kernel\ApplicationType;

use KnotPhp\Module\AuraSession\AuraSessionModule;
use KnotPhp\Framework\Module\DefaultHttpModuleFactory;
use KnotPhp\Framework\Package\KnotFrameworkHttpPackage;

abstract class KnotApiApplication extends KnotBaseApplication
{
    /**
     * {@inheritDoc}
     */
    public static function type(): ApplicationType
    {
        return ApplicationType::of(ApplicationType::API);
    }

    /**
     * Returns application dispatcher
     *
     * @return DispatcherInterface
     */
    public abstract function getDispatcher() : DispatcherInterface;

    /**
     * Configure application
     *
     * @throws
     */
    public function configure() : ApplicationInterface
    {
        $this->requirePackage(KnotFrameworkHttpPackage::class);
        $this->requireModule(AuraSessionModule::class);

        $route_config = $this->filesystem()->getFile(Dir::CONFIG, 'route.config.php');

        /** @noinspection PhpIncludeInspection */
        $routing_rule = require ($route_config);

        $this->addModuleFactory(new DefaultHttpModuleFactory($this->getDispatcher(), $routing_rule));

        return $this;
    }

    /**
     * Handle exception
     *
     * @param Throwable $e
     */
    public function handleException(Throwable $e)
    {
        parent::handleException($e);

        Util::dumpException($e, function($line) {
            echo $line . PHP_EOL;
        });
    }
}