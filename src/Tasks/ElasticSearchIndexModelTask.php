<?php declare(strict_types=1);

namespace Barnicolly\ModelSearch\Tasks;

use Barnicolly\ModelSearch\Contracts\SearchContract;
use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\MissingParameterException;
use Elastic\Elasticsearch\Exception\ServerResponseException;

class ElasticSearchIndexModelTask
{

    public function __construct(private readonly Client $elasticsearch)
    {
    }

    /**
     * @throws ServerResponseException
     * @throws ClientResponseException
     * @throws MissingParameterException
     */
    public function run(SearchContract $model): void
    {
        $params = [
            'index' => $model->getSearchIndex(),
            'id' => $model->getKey(),
            'body' => $model->toSearchArray(),
        ];
        $this->elasticsearch->index($params);
    }
}
