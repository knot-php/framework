<?php
declare(strict_types=1);

namespace KnotPhp\Framework;

use KnotPhp\Command\Command\CommandDescriptorProviderInterface;
use KnotPhp\Command\Command\Provider\AcmeCommandProvider;
use KnotPhp\DataStore\Tools\Command\Provider\DataStoreToolsCommandProvider;

final class KnotCommandProvider implements CommandDescriptorProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public static function provide(): array
    {
        $descs = [];

        // Add calgamo default commands
        $descs = array_merge($descs, AcmeCommandProvider::provide());

        // Add datastore-tools commands
        $descs = array_merge($descs, DataStoreToolsCommandProvider::provide());

        return $descs;
    }

}