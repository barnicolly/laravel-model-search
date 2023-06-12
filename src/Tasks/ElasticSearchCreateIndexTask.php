<?php declare(strict_types=1);

namespace Barnicolly\ModelSearch\Tasks;

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\MissingParameterException;
use Elastic\Elasticsearch\Exception\ServerResponseException;

class ElasticSearchCreateIndexTask
{

    public function __construct(private readonly Client $elasticsearch)
    {
    }

    /**
     * @throws ServerResponseException
     * @throws ClientResponseException
     * @throws MissingParameterException
     */
    public function run(string $index, ?string $body = null): void
    {
        $params = [
            'index' => $index,
            'body' => $body,
        ];
        $this->elasticsearch->indices()->create($params);
    }
}
