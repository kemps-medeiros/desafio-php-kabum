<?php
include "../../Helpers/connect.php";

class User {
 
  public $email;
  public $password;
  public $username;

  public function setUsername($username) {
    try {
    $this->username = $username;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
    
  }

  public function setEmail($email) {
    try {
      $this->email = $email;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
    
  }

  public function setPassword($password) {
    try {
      $this->password = $password;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
    
  }

  public function save() {
    try {
      global $con;
      if ($con->connect_error) {
        die('Connection Failed: ' . $con->connect_error);
      } else {
        $stmt = $con->prepare("insert into users(username, email, password)
        values(?, ?, ?)");
        $stmt->bind_param("sss", $this->username, $this->email, $this->password);
        $stmt->execute();
        
        echo "<html><script type='text/javascript'>alert('Usuário cadastrado com Sucesso!')
              window.location.replace('../../index.html')</script></html>";
        $stmt->close();
        $con->close();
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }

  }

}

?>