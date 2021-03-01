<?php
declare(strict_types=1);

namespace KnotPhp\Framework\Test\Application;

use Exception;

use KnotPhp\Framework\DefaultFileSystem;
use PHPUnit\Framework\TestCase;
use KnotPhp\Framework\Test\ConcreteKnotBaseApplication;

final class KnotBaseApplicationTest extends TestCase
{
    public function testHandleException()
    {
        $fs = new DefaultFileSystem(__DIR__);
        $app = new ConcreteKnotBaseApplication($fs);

        // check std output
        ob_start();
        $app->handleException(new Exception('foo'));
        $out = ob_get_clean();

        $this->assertSame('', $out);
    }
}