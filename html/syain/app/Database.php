<?php
define('DSN', 'mysql:host=localhost;dbname=company;charset=utf8mb4');
define('USER', 'root');
define('PASS', 'root');

class Database
{
  private $pdo;

  private function connect()
  {
    if (!isset($this->pdo)) {
      try {
        $this->pdo = new PDO(
          DSN,
          USER,
          PASS,
          [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
          ]
        );
      } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        exit;
      }
    }
  }

  function getAllSyain()
  {
    try {
      $this->connect();
      $stmt = $this->pdo->query("SELECT id, name FROM syain ORDER BY id;");
      $members = $stmt->fetchAll();
      return $members;
    } catch (PDOException $e) {
      echo $e->getMessage() . '<br>';
      exit;
    }
  }

  function getSyain($id)
  {
    try {
      $this->connect();
      $stmt = $this->pdo->prepare("SELECT * FROM syain WHERE id = ?;");
      $stmt->bindParam(1, $id, PDO::PARAM_INT);
      $stmt->execute();
      $member = $stmt->fetchAll();
      if (count($member) == 0) {
        return null;
      }
      return $member[0];
    } catch (PDOException $e) {
      echo $e->getMessage() . '<br>';
      exit;
    }
  }

  function idExist($id)
  {
    if ($this->getSyain($id) != null) {
      return true;
    }
    return false;
  }

  function createSyain($id, $name, $age, $work)
  {
    try {
      $this->connect();
      $stmt = $this->pdo->prepare("INSERT INTO syain VALUES(?,?,?,?);");
      $stmt->bindParam(1, $id, PDO::PARAM_INT);
      $stmt->bindParam(2, $name, PDO::PARAM_STR);
      $stmt->bindParam(3, $age, PDO::PARAM_INT);
      $stmt->bindParam(4, $work, PDO::PARAM_STR);
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo $e->getMessage() . '<br>';
      exit;
    }
  }

  function updateSyain($id, $name, $age, $work, $old_id)
  {
    try {
      $this->connect();
      $stmt = $this->pdo->prepare("UPDATE syain SET id = ?, name = ?, age = ?, work = ? WHERE id = ?;");
      $stmt->bindParam(1, $id, PDO::PARAM_INT);
      $stmt->bindParam(2, $name, PDO::PARAM_STR);
      $stmt->bindParam(3, $age, PDO::PARAM_INT);
      $stmt->bindParam(4, $work, PDO::PARAM_STR);
      $stmt->bindParam(5, $old_id, PDO::PARAM_INT);
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo $e->getMessage() . '<br>';
      exit;
    }
  }

  function deleteSyain($id)
  {
    try {
      $this->connect();
      $stmt = $this->pdo->prepare("DELETE FROM syain WHERE id = ?;");
      $stmt->bindParam(1, $id, PDO::PARAM_INT);
      $stmt->execute();
      return true;
    } catch (PDOException $e) {
      echo $e->getMessage() . '<br>';
      exit;
    }
  }
}
?>
