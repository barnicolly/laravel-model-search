<?php

declare(strict_types=1);

return [
    'hosts' => explode(',', (string) env('MODEL_SEARCH_ELASTICSEARCH_HOSTS')),
    'index_prefix' => env('MODEL_SEARCH_INDEX_PREFIX', env('APP_NAME', '')),
    'username' => env('MODEL_SEARCH_ELASTICSEARCH_USERNAME', 'elastic'),
    'password' => env('MODEL_SEARCH_ELASTICSEARCH_PASSWORD', null),
];
