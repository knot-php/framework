<?php
declare(strict_types=1);

namespace KnotPhp\Framework\Test;

use PHPUnit\Framework\TestCase;

use KnotPhp\Framework\DefaultFileSystem;
use KnotLib\Kernel\FileSystem\Dir;
use KnotLib\Kernel\Exception\FileSystemException;

final class DefaultFileSystemTest extends TestCase
{
    /**
     * @throws FileSystemException
     */
    public function testGetDirectory()
    {
        $fs = new DefaultFileSystem(__DIR__);

        $this->assertEquals(__DIR__ . '/var/tmp', $fs->getDirectory(Dir::TMP));
        $this->assertEquals(__DIR__ . '/var/cache', $fs->getDirectory(Dir::CACHE));
        $this->assertEquals(__DIR__ . '/var/logs', $fs->getDirectory(Dir::LOGS));
        $this->assertEquals(__DIR__ . '/var/data', $fs->getDirectory(Dir::DATA));
        $this->assertEquals(__DIR__ . '/var/command', $fs->getDirectory(Dir::COMMAND));
        $this->assertEquals(__DIR__ . '/src', $fs->getDirectory(Dir::SRC));
        $this->assertEquals(__DIR__ . '/include', $fs->getDirectory(Dir::INCLUDE));
        $this->assertEquals(__DIR__ . '/config', $fs->getDirectory(Dir::CONFIG));
        $this->assertEquals(__DIR__ . '/template', $fs->getDirectory(Dir::TEMPLATE));
        $this->assertEquals(__DIR__ . '/bin', $fs->getDirectory(Dir::BIN));
        $this->assertEquals(__DIR__ . '/public', $fs->getDirectory(Dir::WEBROOT));
    }
}