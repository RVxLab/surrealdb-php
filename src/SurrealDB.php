<?php

declare(strict_types=1);

namespace RVxLab\SurrealDB;

use RVxLab\SurrealDB\Connections\ConnectionContract;
use RVxLab\SurrealDB\Connections\HttpConnection;

class SurrealDB
{
    private ConnectionContract $connection;

    final protected function __construct(
        public readonly string $host,
        public readonly string $user,
        public readonly string $password,
        public readonly ?string $namespace,
        public readonly ?string $database,
    ) {
    }

    public static function make(string $host, string $user, string $password, ?string $namespace = null, ?string $database = null): static
    {
        return (new static($host, $user, $password, $namespace, $database))->connect();
    }

    public function getConnection(): ConnectionContract
    {
        return $this->connection;
    }

    public function connect(): static
    {
        $this->connection = new HttpConnection();

        return $this;
    }
}
