<?php

declare(strict_types=1);

use GuzzleHttp\Client;
use RVxLab\SurrealDB\Connections\FakeConnection;
use RVxLab\SurrealDB\Connections\HttpConnection;
use RVxLab\SurrealDB\SurrealDB;

test('Can create a SurrealDB instance with the HTTP connection', function (): void {
    $surrealDb = SurrealDB::make(new HttpConnection(new Client([
        'base_uri' => 'http://127.0.0.1:8000',
    ])));

    expect($surrealDb->connection)->toBeInstanceOf(HttpConnection::class);
});

test('Forwards the connect/disconnect calls to the underlying connection', function (): void {
    $connection = new FakeConnection();
    $client = SurrealDB::make($connection)->connect([
        'user' => '',
        'password' => '',
        'database' => null,
        'namespace' => null,
        'user_scope' => null,
    ]);

    expect($connection->isConnected)->toBeTrue();

    $client->disconnect();

    expect($connection->isConnected)->toBeFalse();
});
