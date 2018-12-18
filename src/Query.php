<?php

namespace Pheo4j;

class Query
{
  private $query;
  private $path = "\\Pheo4j\\Command\\";

  public function get()
  {
     return $this->query;
  }

  public function set($query)
  {
      $this->query = $query;
  }

  public function add($add)
  {
      $this->query .= $add; 
  }

  public function __call($command, $params)
  {
    $command = $this->path.$command;
    $command::set($this, implode($params));
    return $this;
  }

  public function return($params)
  {
    $this->add('RETURN '.$params);
  }

}