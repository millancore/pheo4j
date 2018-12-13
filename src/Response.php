<?php

namespace Pheo4j;

class Response
{
    private $result;

    public function __construct($result)
    {
        $this->result = $result;
    }

    public function get()
    {
        return $this->result;
    }

    public function toArray()
    {
        $response = $this->result;
        $parse = array();

        foreach ($response->body->results as $value) {
            $columns = $value->columns;
      
            foreach ($value->data as $node) {
                $parse[] = array_combine($columns, $node->row);
            }
        }

        return $parse;
    }
}
