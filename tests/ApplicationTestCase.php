<?php

declare(strict_types=1);

namespace Barnicolly\ModelSearch\Tests;

use Barnicolly\ModelSearch\ModelSearchServiceProvider;
use Orchestra\Testbench\TestCase;

class ApplicationTestCase extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [
            ModelSearchServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        $database = 'testbench';
        $app['config']->set('database.default', $database);
        $app['config']->set("database.connections.{$database}", [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);
    }
}
