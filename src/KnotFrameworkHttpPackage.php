<?php
declare(strict_types=1);

namespace KnotPhp\Framework;

use KnotLib\Kernel\Module\PackageInterface;

use KnotPhp\Module\KnotHttpResponder\KnotHttpResponderModule;
use KnotPhp\Module\KnotHttpService\KnotHttpServiceModule;
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
        return array_merge(KnotFrameworkDefaultPackage::getModuleList(),
            [
                KnotHttpServiceModule::class,
                KnotHttpResponderModule::class,
                NyholmPsr7RequestModule::class,
                NyholmPsr7ResponseModule::class,
            ]);
    }
}