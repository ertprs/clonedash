<?php

include "config.php";

class Database
{
  protected $host     = DB_HOSTNAME;
  protected $dbname   = DB_DATABASE;
  protected $user     = DB_USERNAME;
  protected $password = DB_PASSWORD;

  public function openDbConnection()
  {
    $link = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->password);
    return $link;
  }

  public function closeDbConnection(&$link)
  {
    $link = null;
  }
}
