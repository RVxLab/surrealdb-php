<?php

declare(strict_types=1);

namespace RVxLab\SurrealDB\Connections;

interface ConnectionContract
{
    /**
     * Connect to the SurrealDB with the passed connection config
     *
     * @param array{user: string, password: string, namespace: ?string, database: ?string, user_scope: ?string} $connectionConfig
     */
    public function connect(array $connectionConfig): static;

    /**
     * Disconnect from the SurrealDB server
     *
     * This method is called upon destruction of the connection class
     */
    public function disconnect(): void;
}
