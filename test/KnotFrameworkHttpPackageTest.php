<?php
declare(strict_types=1);

namespace KnotPhp\Framework\Test;

use KnotPhp\Module\KnotHttp\KnotHttpResponderModule;
use KnotPhp\Framework\KnotFrameworkHttpPackage;
use KnotPhp\Module\KnotDi\KnotDiModule;
use KnotPhp\Module\KnotHttp\KnotHttpRoutingMiddlewareModule;
use KnotPhp\Module\KnotHttpService\KnotHttpServiceModule;
use KnotPhp\Module\KnotLogger\KnotLoggerModule;
use KnotPhp\Module\KnotPipeline\KnotPipelineModule;
use KnotPhp\Module\KnotRouter\KnotRouterModule;
use KnotPhp\Module\KnotService\KnotServiceModule;
use KnotPhp\Module\NyholmPsr7\NyholmPsr7RequestModule;
use KnotPhp\Module\NyholmPsr7\NyholmPsr7ResponseModule;
use KnotPhp\Module\Stk2kEventStream\Stk2kEventStreamModule;
use PHPUnit\Framework\TestCase;

final class KnotFrameworkHttpPackageTest extends TestCase
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

                // KnotHttpPackage
                KnotHttpResponderModule::class,
                KnotHttpRoutingMiddlewareModule::class,

                // others
                KnotHttpServiceModule::class,
                NyholmPsr7RequestModule::class,
                NyholmPsr7ResponseModule::class,
                KnotRouterModule::class,
            ]
            , KnotFrameworkHttpPackage::getModuleList());
    }
}