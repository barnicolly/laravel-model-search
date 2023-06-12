<?php declare(strict_types=1);

namespace Barnicolly\ModelSearch\ServiceProviders;

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Support\ServiceProvider;

class ModelSearchServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
    }

    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/model_search.php', 'model_search'
        );
        $this->bindSearchClient();
    }

    private function bindSearchClient(): void
    {
        $this->app->bind(Client::class, static fn($app): Client => ClientBuilder::create()
            ->setHosts(config('model_search.hosts'))
            ->build());
    }
}
