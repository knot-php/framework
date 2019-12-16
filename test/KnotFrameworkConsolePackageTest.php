<?php
declare(strict_types=1);

namespace KnotPhp\Framework\Test;

use KnotPhp\Framework\KnotFrameworkConsolePackage;
use KnotPhp\Module\KnotConsole\KnotShellRequestModule;
use KnotPhp\Module\KnotConsole\KnotShellResponderModule;
use KnotPhp\Module\KnotConsole\KnotShellResponseModule;
use KnotPhp\Module\KnotConsole\KnotShellRouterModule;
use KnotPhp\Module\KnotExceptionHandler\KnotHtmlDebugExceptionHandlerModule;
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
                KnotHtmlDebugExceptionHandlerModule::class,

                // KnotConsolePackage
                KnotShellRequestModule::class,
                KnotShellResponseModule::class,
                KnotShellResponderModule::class,
                KnotShellRouterModule::class,
            ]
            , KnotFrameworkConsolePackage::getModuleList());
    }
}