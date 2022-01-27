<?php
include "../../Helpers/connect.php";


class Client {
 
  public $id;
  public $name;
  public $birthDate;
  public $cpf;
  public $rg;
  public $phone;

  public function setName($name) {
    try {
      $this->name = $name;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function setBirthDate($birthDate) {
    try {
      $this->birthDate = $birthDate;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function setCpf($cpf) {
    try {
      $this->cpf = $cpf;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function setRg($rg) {
    try {
      $this->rg = $rg;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function setPhone($phone) {
    try {
      $this->phone = $phone;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function getAll() {
    try {
      global $con;
      $sql = "Select * from `clients`";
      $result = mysqli_query($con, $sql);
      return $result;
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
        $stmt = $con->prepare("insert into clients(name, birthDate, CPF, RG, phone)
        values(?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $this->name, $this->birthDate, $this->cpf, $this->rg, $this->phone);
        $stmt->execute();
        $stmt->close();
        $con->close();
        echo "<html><script type='text/javascript'>alert('Cliente cadastrado com Sucesso!')
                window.location.replace('clients.php')</script></html>";
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function deleteById($id) {
    try {
      global $con;
      $sql = "delete from `clients` where id=$id";
      $result = mysqli_query($con, $sql);
      if($result) {
        echo "<html><script type='text/javascript'>alert('Cliente deletado com Sucesso!')
                window.location.replace('clients.php')</script></html>";
      } else {
        die("mysqli_error($con)");
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function updateById($id) {
    try {
      global $con;
      $sql = "update `clients` set id=$id,name='$this->name',birthDate='$this->birthDate',
      CPF='$this->cpf',RG='$this->rg',phone='$this->phone'
      where id=$id";
      $result = mysqli_query($con, $sql);
      if($result) {
        echo "<html><script type='text/javascript'>alert('Cliente atualizado com Sucesso!')
              window.location.replace('clients.php')</script></html>";
    } else {
        die("mysqli_error($con)");
    }
    } catch (Exception $e) {
    echo $e->getMessage();
    }
  }

  public function getById($id) {
    try {
      global $con;
      $sql = "Select * from `clients` where id=$id";
      $result = mysqli_query($con, $sql);
      $row = mysqli_fetch_assoc($result);
      $this->name = $row['name'];
      $this->birthDate = $row['birthDate'];
      $this->cpf = $row['CPF'];
      $this->rg = $row['RG'];
      $this->phone = $row['phone'];
      } catch (Exception $e) {
        echo $e->getMessage();
      }
  }
}


?>