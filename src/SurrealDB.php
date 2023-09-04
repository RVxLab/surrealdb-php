<?php

declare(strict_types=1);

namespace RVxLab\SurrealDB;

use GuzzleHttp\Client;
use RVxLab\SurrealDB\Connections\ConnectionContract;
use RVxLab\SurrealDB\Connections\HttpConnection;

class SurrealDB
{
    private ConnectionContract $connection;

    public function getConnection(): ConnectionContract
    {
        return $this->connection;
    }

    /** @param array{host: string, user: string, password: string, namespace: ?string, database: ?string, user_scope: ?string} $connectionConfig */
    public function connect(array $connectionConfig): static
    {
        $this->connection = (new HttpConnection(
            new Client([ 'base_uri' => $connectionConfig['host'] ])
        ))->connect([
            'user' => $connectionConfig['user'],
            'password' => $connectionConfig['password'],
            'namespace' => $connectionConfig['namespace'] ?? null,
            'database' => $connectionConfig['database'] ?? null,
            'user_scope' => $connectionConfig['user_scope'] ?? null,
        ]);

        return $this;
    }
}
