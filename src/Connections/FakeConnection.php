<?php

declare(strict_types=1);

namespace RVxLab\SurrealDB\Connections;

/**
 * @internal
 */
class FakeConnection implements ConnectionContract
{
    public bool $isConnected = false;

    /** {@inheritDoc} */
    public function connect(array $connectionConfig): static
    {
        $this->isConnected = true;

        return $this;
    }

    /** {@inheritDoc} */
    public function disconnect(): void
    {
        $this->isConnected = false;
    }

    public function __destruct()
    {
        $this->disconnect();
    }
}
