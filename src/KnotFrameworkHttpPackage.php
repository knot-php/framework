<?php
declare(strict_types=1);

namespace KnotPhp\Framework;

use KnotLib\Kernel\Module\PackageInterface;

use KnotPhp\Module\KnotHttp\Package\KnotHttpPackage;
use KnotPhp\Module\KnotHttpService\KnotHttpServiceModule;
use KnotPhp\Module\KnotRouter\KnotRouterModule;
use KnotPhp\Module\NyholmPsr7\NyholmPsr7RequestModule;
use KnotPhp\Module\NyholmPsr7\NyholmPsr7ResponseModule;

class KnotFrameworkHttpPackage implements PackageInterface
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
            KnotHttpPackage::getModuleList(),
            [
                KnotHttpServiceModule::class,
                NyholmPsr7RequestModule::class,
                NyholmPsr7ResponseModule::class,
                KnotRouterModule::class,
            ]);
    }
}