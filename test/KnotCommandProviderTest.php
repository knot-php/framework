<?php
declare(strict_types=1);

namespace KnotPhp\Framework\Test;

use KnotPhp\Command\Command\CommandDescriptor;
use KnotPhp\Framework\KnotCommandProvider;
use PHPUnit\Framework\TestCase;

final class KnotCommandProviderTest extends TestCase
{
    public function testProvide()
    {
        $descs = KnotCommandProvider::provide();

        $command_id_list = array_map(function(CommandDescriptor $desc){
            return $desc->getCommandId();
        }, $descs);

        $this->assertEquals([

            //-------------------------------
            // calgamo default commands
            //-------------------------------
            'password:encrypt',

            //-------------------------------
            // datastore-tools commands
            //-------------------------------
            'db:describe:table',
            'db:generate:model',
            'db:generate:repository',
            'db:generate:entity',

        ], $command_id_list);
    }
}