<?php
declare(strict_types=1);

namespace KnotPhp\Framework;

use KnotLib\Kernel\Module\PackageInterface;
use KnotModule\Stk2kEventStream\Stk2kEventStreamModule;
use KnotModule\KnotPipeline\KnotPipelineModule;
use KnotModule\KnotLogger\KnotLoggerModule;
use KnotModule\KnotDi\KnotDiModule;
use KnotModule\KnotService\KnotServiceModule;

class KnotFrameworkPackage implements PackageInterface
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