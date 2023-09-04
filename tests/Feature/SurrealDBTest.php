<?php

declare(strict_types=1);

use RVxLab\SurrealDB\Connections\ConnectionContract;
use RVxLab\SurrealDB\SurrealDB;

test('Can connect to SurrealDB', function (string $host, string $connectionClass): void {
    $client = (new SurrealDB())->connect([
        'host' => $host,
        'user' => 'test',
        'password' => 'secret',
        'namespace' => null,
        'database' => null,
        'user_scope' => null,
    ]);

    /** @var class-string<ConnectionContract> $connectionClass */
    expect($client->getConnection())->toBeInstanceOf($connectionClass);
})->with([
    ['host' => 'http://127.0.0.1:8000', 'expectedConnection' => \RVxLab\SurrealDB\Connections\HttpConnection::class],
]);
