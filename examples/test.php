<?php

include_once 'vendor/autoload.php';

use Pheo4j\Client;
use Pheo4j\Cypher;

$cypher = new Cypher;
$client = new Client('localhost', 7474);
$client->setAuth('neo4j', 'pom');


$client->Cypher('MATCH (a) RETURN a.name as lalal');
$response = $client->execute();

var_dump($response->toArray());





