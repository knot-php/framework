<?php
declare(strict_types=1);

namespace KnotPhp\Framework\Application;

use Throwable;

use Stk2k\Util\Util;

use KnotLib\Console\Router\ShellDispatcherInterface;
use KnotLib\Kernel\FileSystem\Dir;
use KnotLib\Kernel\Kernel\ApplicationInterface;
use KnotLib\Kernel\Kernel\ApplicationType;

use KnotPhp\Module\AuraSession\AuraSessionModule;
use KnotPhp\Framework\Module\DefaultConsoleModuleFactory;
use KnotPhp\Framework\Package\KnotFrameworkConsolePackage;

abstract class KnotConsoleApplication extends KnotBaseApplication
{
    /**
     * {@inheritDoc}
     */
    public static function type(): ApplicationType
    {
        return ApplicationType::of(ApplicationType::CLI);
    }

    /**
     * Returns application dispatcher
     *
     * @return ShellDispatcherInterface
     */
    protected abstract function getDispatcher() : ShellDispatcherInterface;

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
        $this->requirePackage(KnotFrameworkConsolePackage::class);
        $this->requireModule(AuraSessionModule::class);

        $this->addModuleFactory(new DefaultConsoleModuleFactory($this->getDispatcher(), $this->getRoutingRules()));

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