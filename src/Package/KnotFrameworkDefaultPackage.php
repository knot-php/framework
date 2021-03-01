<?php
declare(strict_types=1);

namespace KnotPhp\Framework\Package;

use KnotLib\Kernel\Module\PackageInterface;

use KnotPhp\Module\Stk2kEventStream\Stk2kEventStreamModule;
use KnotPhp\Module\KnotPipeline\KnotPipelineModule;
use KnotPhp\Module\KnotLogger\KnotLoggerModule;
use KnotPhp\Module\KnotDi\KnotDiModule;
use KnotPhp\Module\KnotService\KnotServiceModule;

class KnotFrameworkDefaultPackage implements PackageInterface
{
    /**
     * Get package module list
     *
     * @return string[]
     */
    public static function getModuleList() : array
    {
        return [
            Stk2kEventStreamModule::class,
            KnotPipelineModule::class,
            KnotLoggerModule::class,
            KnotDiModule::class,
            KnotServiceModule::class,
        ];
    }
}