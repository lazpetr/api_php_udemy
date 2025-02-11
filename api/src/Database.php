<?php

class Database
{

  public function __construct(
    private string $host,
    private string $name,
    private string $user,
    private string $password,
    //Also define (database) *port* if it's a non-standard one


  ) {}

  public function getConnection() :PDO
  {

    $dns = "mysql:host={$this->host}; dbname={$this->name};charset=utf8";

    return new PDO($dns, $this->user, $this->password, [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

    ]);
  }
}
