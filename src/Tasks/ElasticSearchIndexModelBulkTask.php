<?php

namespace Barnicolly\ModelSearch\Tasks;

use Barnicolly\ModelSearch\Contracts\SearchContract;
use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\ServerResponseException;
use Illuminate\Support\Collection;

class ElasticSearchIndexModelBulkTask
{
    public function __construct(private readonly Client $elasticsearch)
    {
    }

    /**
     * @param Collection<SearchContract> $collection
     *
     * @throws ClientResponseException
     * @throws ServerResponseException
     */
    public function run(Collection $collection): void
    {
        $params = [];
        foreach ($collection as $item) {
            $params['body'][] = [
                'index' => [
                    '_index' => $item->getSearchIndex(),
                    '_id' => $item->getKey(),
                ],
            ];
            $params['body'][] = $item->toSearchArray();
        }

        $this->elasticsearch->bulk($params);
    }
}
