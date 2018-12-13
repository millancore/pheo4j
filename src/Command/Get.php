<?php

namespace Pheo4j\Command;

class Get
{
   public static function set($cypher, String $match)
   {
      $query = $cypher->addQuery('RETURN '.$match);
   }
}
