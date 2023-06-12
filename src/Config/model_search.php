<?php declare(strict_types=1);

return [
    'hosts' => explode(',', (string) env('MODEL_SEARCH_ELASTICSEARCH_HOSTS')),
];
