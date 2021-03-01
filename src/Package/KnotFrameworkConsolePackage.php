<?php
declare(strict_types=1);

namespace KnotPhp\Framework\Package;

use KnotLib\Kernel\Module\PackageInterface;

use KnotPhp\Module\KnotConsole\Package\KnotArrayConfigConsolePackage;
use KnotPhp\Module\KnotExceptionHandler\TextExceptionHandlerModule;

class KnotFrameworkConsolePackage implements PackageInterface
{
    /**
     * Get package module list
     *
     * @return string[]
     */
    public static function getModuleList() : array
    {
        return array_merge(
            KnotFrameworkDefaultPackage::getModuleList(),
            KnotArrayConfigConsolePackage::getModuleList(),
            [
                TextExceptionHandlerModule::class,
            ]
        );
    }
}