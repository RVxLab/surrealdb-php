<?php

declare(strict_types=1);

namespace RVxLab\SurrealDB\Connections;

use GuzzleHttp\Client as Guzzle;

class HttpConnection implements ConnectionContract
{
    public function __construct(private readonly Guzzle $guzzle)
    {
    }

    /** {@inheritDoc} */
    public function connect(array $connectionConfig): static
    {
        return $this;
    }
}
