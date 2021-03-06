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

abstract class KnotHttpApplication extends KnotBaseApplication
{
    /**
     * {@inheritDoc}
     */
    public static function type(): ApplicationType
    {
        return ApplicationType::of(ApplicationType::WEB_APP);
    }

    /**
     * Returns application dispatcher
     *
     * @return DispatcherInterface
     */
    protected abstract function getDispatcher() : DispatcherInterface;

    /**
     * Returns routing rules
     *
     * @return array
     */
    protected function getRoutingRules() : array
    {
        $route_config = $this->filesystem()->getFile(Dir::CONFIG, 'route.config.php');

        /** @noinspection PhpIncludeInspection */
        return require ($route_config);
    }

    /**
     * Configure application
     *
     * @throws
     */
    public function configure() : ApplicationInterface
    {
        $this->requirePackage(KnotFrameworkHttpPackage::class);
        $this->requireModule(AuraSessionModule::class);

        $this->addModuleFactory(new DefaultHttpModuleFactory($this->getDispatcher(), $this->getRoutingRules()));

        return parent::configure();
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
            echo '<pre>' . $line . '</pre>' . PHP_EOL;
        });
    }
}