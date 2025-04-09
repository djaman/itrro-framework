<?php
/**************************
 * Project : Adultwire.site
 * Theme   : @TruckUI
 * Earlier : @desiwire for adultwire
 * Version : v3.29.2
 * Dev     : Aman Chauhan™
 * Date    : 21/03/2023
 * Support : djamanmixprime@gmail.com
 * license : https://www.apache.org/licenses/LICENSE-2.0
 * **************************/
class database {
  public $connection;

  public static function getIntance() {
    return new database(
      "localhost",
      "root",
      "",
      "name"
    );
  }

  public function __construct($dbhost, $dbuser, $dbpass, $dbname) {
    try {
      $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);

      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->connection = $conn;
      return $this->connection;
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      return false;
    }
  }

  public function get($query) {
    if (empty($query)) {
      // Handle the case when the query is empty
    }
    $get = $this->connection->prepare($query);
    $get->execute();
    return $get->fetchAll(PDO::FETCH_ASSOC);
  }

  public function insert($query) {
    if (empty($query)) {
      // Handle the case when the query is empty
      echo "query is empty";
    }
    $insert = $this->connection->prepare($query);

    return $insert->execute();
  }

  public function update($query) {
    if (empty($query)) {
      // Handle the case when the query is empty
      echo "query is empty";
    }

    $update = $this->connection->prepare($query);

    return $update->execute();
  }

  public function getCount($query) {
    $res = $this->connection->query($query);
    return $num_rows = $res->fetchColumn();
  }
}
?>