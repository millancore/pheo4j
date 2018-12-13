<?php

namespace Pheo4j;

use Httpful\Request;

class Client
{
    private $request;
    private $dataBaseUrl;

    public function __construct(String $host, Int $port)
    {
        $this->dataBaseUrl = '/db/data/transaction/commit';
        $this->request = Request::post("$host:$port".$this->dataBaseUrl)                  // Build a PUT request...
        ->sendsJson();
    }


    public function setAuth($username, $password)
    {
        $this->request->authenticateWith($username, $password);
    }

    public static function createFrom(String $host, Int $port)
    {
        return new static($host, $port);
    }

    public function Cypher($cypher)
    {
        $this->request->body('{
            "statements": [
                {
                    "statement": "'.$cypher.'"
                }
            ]
        }');
    }

    public function execute()
    {
        return new Response($this->request->send());
    }
}
