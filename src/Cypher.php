<?php

namespace Pheo4j;

class Cypher
{
  private $query;

  public function getQuery()
  {
     return $this->query;
  }

  public function setQuery($query)
  {
      $this->query = $query;
  }

  public function addQuery($add)
  {
      $this->query .= $add; 
  }

  public function match($params)
  {
     \Pheo4j\Command\Match::set($this, $params);
     return $this;
  }

  public function create($params)
  {
    // Contenido de la funcion
  }

  public function return($params)
  {
    \Pheo4j\Command\Get::set($this, $params);
    return $this->query;
  }

}