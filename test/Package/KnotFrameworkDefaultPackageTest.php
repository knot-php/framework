<?php
declare(strict_types=1);

namespace KnotPhp\Framework\Test\Package;

use KnotPhp\Framework\Package\KnotFrameworkDefaultPackage;
use KnotPhp\Module\KnotDi\KnotDiModule;
use KnotPhp\Module\KnotExceptionHandler\Html\HtmlExceptionHandlerModule;
use KnotPhp\Module\KnotLogger\KnotLoggerModule;
use KnotPhp\Module\KnotPipeline\KnotPipelineModule;
use KnotPhp\Module\KnotService\KnotServiceModule;
use KnotPhp\Module\Stk2kEventStream\Stk2kEventStreamModule;
use PHPUnit\Framework\TestCase;

final class KnotFrameworkDefaultPackageTest extends TestCase
{
    public function testGetModuleList()
    {
        $this->assertEquals(
            [
                Stk2kEventStreamModule::class,
                KnotPipelineModule::class,
                KnotLoggerModule::class,
                KnotDiModule::class,
                KnotServiceModule::class,
            ]
            , KnotFrameworkDefaultPackage::getModuleList());
    }
}