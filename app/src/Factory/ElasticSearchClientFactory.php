<?php

namespace App\Factory;

use Elastic\Elasticsearch\Client;
use Elastic\Elasticsearch\ClientBuilder;
use Elastic\Elasticsearch\Exception\AuthenticationException;

class ElasticSearchClientFactory
{
    private Client $client;

    /**
     * @throws AuthenticationException
     */
    public function __construct(string $elasticsearchHost, string $elasticsearchPort)
    {
        $this->client = ClientBuilder::create()
            ->setHosts(["$elasticsearchHost:$elasticsearchPort"])
            ->build();
    }

    /**
     * @return Client
     */
    public function getClient(): Client
    {
        return $this->client;
    }
}
