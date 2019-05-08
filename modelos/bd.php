<?php
class bd{
  public $connection;


  public function __construct(){

      $this->connection =  new mysqli("127.0.0.1", "Julian", "2019", "batallones", 3306);
      if ($mysqli->connect_errno) {
          echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
      }else {
        return $this->connection;
      }
      //
      // $query = "SELECT * FROM batallones ";
      // $result = $this->connection->query($query);
      //
      //
      // var_dump($result);
  }




}
?>
