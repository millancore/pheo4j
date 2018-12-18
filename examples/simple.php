<?php

include_once 'vendor/autoload.php';

use Pheo4j\Client;
use Pheo4j\Query;

// Client
$client = new Client('localhost', 7474);

// Login
$client->setAuth('neo4j', 'pom');


// Query Builder *Optional
$query = new Query;

// Create Query 
$query->match('(a)')
      ->return('a.name, a.apellido');

// Add query to client
$client->Cypher($query->get());

# $client->Cypher('MATCH (a) a.name, a.apellido');

$response = $client->execute();

var_dump($response->toArray());