<?php
declare(strict_types=1);

namespace KnotPhp\Framework\Test;

use KnotLib\Kernel\Kernel\ApplicationType;
use KnotPhp\Framework\Application\KnotBaseApplication;

final class ConcreteKnotBaseApplication extends KnotBaseApplication
{
    public static function type(): ApplicationType
    {
        return ApplicationType::of(ApplicationType::WEB_APP);
    }
}