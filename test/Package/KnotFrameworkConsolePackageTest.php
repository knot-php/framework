<?php
declare(strict_types=1);

namespace KnotPhp\Framework\Test\Package;

use KnotPhp\Framework\Package\KnotFrameworkConsolePackage;
use KnotPhp\Module\KnotConsole\ArrayConfigShellRouterModule;
use KnotPhp\Module\KnotConsole\ShellRequestModule;
use KnotPhp\Module\KnotConsole\ShellResponderModule;
use KnotPhp\Module\KnotConsole\ShellResponseModule;
use KnotPhp\Module\KnotConsole\ShellRoutingMiddlewareModule;
use KnotPhp\Module\KnotDi\KnotDiModule;
use KnotPhp\Module\KnotLogger\KnotLoggerModule;
use KnotPhp\Module\KnotPipeline\KnotPipelineModule;
use KnotPhp\Module\KnotService\KnotServiceModule;
use KnotPhp\Module\Stk2kEventStream\Stk2kEventStreamModule;
use PHPUnit\Framework\TestCase;

final class KnotFrameworkConsolePackageTest extends TestCase
{
    public function testGetModuleList()
    {
        $this->assertEquals(
            [
                // KnotFrameworkDefaultPackage
                Stk2kEventStreamModule::class,
                KnotPipelineModule::class,
                KnotLoggerModule::class,
                KnotDiModule::class,
                KnotServiceModule::class,

                // KnotDefaultConsolePackage
                ShellRequestModule::class,
                ShellResponseModule::class,
                ShellResponderModule::class,
                ShellRoutingMiddlewareModule::class,

                // KnotArrayConfigConsolePackage
                ArrayConfigShellRouterModule::class,

            ]
            , KnotFrameworkConsolePackage::getModuleList());
    }
}