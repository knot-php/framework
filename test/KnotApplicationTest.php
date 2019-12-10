<?php
declare(strict_types=1);

namespace KnotPhp\Framework\Test;

use Exception;

use KnotPhp\Framework\DefaultFileSystem;
use PHPUnit\Framework\TestCase;

final class KnotApplicationTest extends TestCase
{
    public function testHandleException()
    {
        $fs = new DefaultFileSystem(__DIR__);
        $app = new TestApplication($fs);

        // check std output
        ob_start();
        $app->handleException(new Exception(''));
        $out = ob_get_clean();

        $this->assertSame('500 Internal Server Error', $out);
    }
}