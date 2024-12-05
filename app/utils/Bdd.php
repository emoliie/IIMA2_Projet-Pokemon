<?php

// Connexion avec la BDD
abstract class Bdd
{
  protected ?PDO $db = null;

  protected function __construct()
  {
    if ($this->db == null) {
      $this->connect();
    }
  }

  private function connect(): void
  {
    try {
      $this->db = new PDO(
        'mysql:host=' . $_ENV['db_host'] . ';dbname=' . $_ENV['db_name'],
        $_ENV['db_user'],
        $_ENV['db_pwd']
      );
      $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
      // Affichage de l'erreur
      echo $e->getCode() . ' : ' . $e->getMessage();
    }
  }

  public function prepareExecute(string $sql, ?array $params = []): PDOStatement
  {
    $requete = $this->db->prepare($sql);
    $requete->execute($params);
 
    return $requete;
  }
}
