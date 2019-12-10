<?php
declare(strict_types=1);

namespace KnotPhp\Framework\Test;

use KnotPhp\Framework\KnotApplication;
use KnotLib\Kernel\Kernel\ApplicationType;

final class TestApplication extends KnotApplication
{
    public static function type(): ApplicationType
    {
        return ApplicationType::of(ApplicationType::CLI);
    }

}