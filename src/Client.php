<?php

namespace Pheo4j;

use Httpful\Request;

class Client
{
    private $baseUrl;
    
    // Conection
    private $host;
    private $port;

    // Auth
    private $username;
    private $password;

    //Body payload
    private $body;

    public function __construct(String $host = 'localhost', Int $port = 7474)
    {
        $this->baseUrl = '/db/data/transaction/commit';
        $this->host = $host;
        $this->port = $port;
    }


    public function setAuth($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function Cypher($cypher)
    {
        $this->body = array(
            'statements' => [
                ['statement' => $cypher]
            ],
        );
    }

    public function execute()
    {
        $neo4jResponse = Request::post(
                $this->host.':'.$this->port.$this->baseUrl
                )->sendsJson()
                 ->authenticateWith($this->username, $this->password)
                 ->body(json_encode($this->body))
                 ->send();

        return new Response($neo4jResponse);
    }
}
