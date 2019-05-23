<?php

class db extends TinyMVC_Model
{
  private $host, $username, $password, $dbname;

  protected $conn;
  public $numOfRows;

  public function __construct($host = 'localhost', $username ='root', $password ='', $dbname ='klanten')
  {
    $this->host =$host;
    $this->username =$username;
    $this->password =$password;
    $this->dbname = $dbname;


    try {
    $this->conn = new PDO("mysql:host=".$this->host.";dbname=". $this->dbname, $this->username, $this->password);
    // set the PDO error mode to exception
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }
    catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

  }
  public function getAllData($table){
    $stmt = $this->conn->prepare("SELECT * FROM ".$table);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll();
    $this->numOfRows = sizeof($result);
    return $result;
}

  public function updateDataById($table, $contact_id, $achternaam, $voornaam, $telnr, $gsmnr, $email, $bedrijf_id){
      $sql = "UPDATE ".$table." SET achternaam = '".$achternaam."', voornaam = '".$voornaam."', telnr = '".$telnr."',
              gsmnr = '".$gsmnr."', email = '".$email."', bedrijf_id = '".$bedrijf_id."' WHERE contact_id = '".$contact_id."'";
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();
    }

  public function deleteDataById($table=null, $contact_id=null){
      $stmt = $this->conn->prepare("DELETE FROM ".$table." WHERE contact_id=".$contact_id);
      $stmt->execute();
    }
}
