<?php

declare(strict_types=1);

namespace RVxLab\SurrealDB;

use RVxLab\SurrealDB\Connections\ConnectionContract;

class SurrealDB
{
    final public function __construct(public readonly ConnectionContract $connection)
    {
    }

    public static function make(ConnectionContract $connection): static
    {
        return new static($connection);
    }

    /** @param array{user: string, password: string, namespace: ?string, database: ?string, user_scope: ?string} $connectionConfig */
    public function connect(array $connectionConfig): static
    {
        $this->connection->connect($connectionConfig);

        return $this;
    }

    public function disconnect(): static
    {
        $this->connection->disconnect();

        return $this;
    }
}
