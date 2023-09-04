<?php

declare(strict_types=1);

namespace RVxLab\SurrealDB\Connections;

interface ConnectionContract
{
    /**
     * @param array{user: string, password: string, namespace: ?string, database: ?string, user_scope: ?string} $connectionConfig
     * @return $this
     */
    public function connect(array $connectionConfig): static;
}
