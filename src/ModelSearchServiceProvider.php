<?php

declare(strict_types=1);

namespace Barnicolly\ModelSearch;

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
            __DIR__ . '/../config/model_search.php',
            'model_search'
        );
        $this->bindSearchClient();
    }

    private function bindSearchClient(): void
    {
        $password = config('model_search.password');
        $username = config('model_search.username');
        $this->app->bind(Client::class, static function () use ($username, $password): Client {
            $concrete = ClientBuilder::create()
                ->setHosts((array) config('model_search.hosts'));
            if (is_string($password) && is_string($username) && $password && $username) {
                $concrete->setBasicAuthentication($username, $password);
            }
            return $concrete->build();
        });
    }
}
