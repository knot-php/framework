<?php
declare(strict_types=1);

namespace KnotPhp\Framework;

use KnotLib\Kernel\FileSystem\Dir;
use KnotLib\Kernel\FileSystem\FileSystemInterface;
use KnotLib\Kernel\FileSystem\AbstractFileSystem;

class DefaultFileSystem extends AbstractFileSystem implements FileSystemInterface
{
    /** @var array */
    private $dir_map;

    /**
     * DefaultFileSystem constructor.
     *
     * @param string $base_dir
     */
    public function __construct(string $base_dir)
    {
        $this->dir_map = [
            Dir::TMP       => $base_dir . '/var/tmp',
            Dir::CACHE     => $base_dir . '/var/cache',
            Dir::LOGS      => $base_dir . '/var/logs',
            Dir::DATA      => $base_dir . '/var/data',
            Dir::COMMAND   => $base_dir . '/var/command',
            Dir::CONFIG    => $base_dir . '/config',
            Dir::TEMPLATE  => $base_dir . '/template',
            Dir::BIN       => $base_dir . '/bin',
            Dir::SRC       => $base_dir . '/src',
            Dir::INCLUDE   => $base_dir . '/include',
            Dir::WEBROOT   => $base_dir . '/public',
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function directoryExists(int $dir): bool
    {
        return isset($this->dir_map[$dir]);
    }

    /**
     * {@inheritDoc}
     */
    public function getDirectory(int $dir) : string
    {
        return $this->dir_map[$dir] ?? parent::getDirectory($dir);
    }
}