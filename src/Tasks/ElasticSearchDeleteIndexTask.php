<?php

declare(strict_types=1);

namespace Barnicolly\ModelSearch\Tasks;

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\MissingParameterException;
use Elastic\Elasticsearch\Exception\ServerResponseException;

class ElasticSearchDeleteIndexTask
{
    public function __construct(private readonly Client $elasticsearch)
    {
    }

    /**
     * @throws ServerResponseException
     * @throws ClientResponseException
     * @throws MissingParameterException
     */
    public function run(string $index): void
    {
        $params = [
            'index' => $index,
            'ignore_unavailable' => true,
        ];
        $this->elasticsearch->indices()->delete($params);
    }
}
