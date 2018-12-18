<?php

namespace Pheo4j\Command;

class Match
{
   public static function set($cypher, String $match)
   {
      $query = $cypher->add('MATCH '.$match);
   }
}
