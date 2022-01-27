<?php
include "../../../Helpers/connect.php";


class Address {
 
  public $id;
  public $rua;
  public $numero;
  public $bairro;
  public $complemento;
  public $cidade;
  public $estado;
  public $cep;
  public $clientId;

  public function setRua($rua) {
    try {
      $this->rua = $rua;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function setNumero($numero) {
    try {
      $this->numero = $numero;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }

  public function setBairro($bairro) {
    try {
      $this->bairro = $bairro;
    } catch (Exception $e) {
      echo $e->getMessage();
    }    
  }

  public function setComplemento($complemento) {
    try {
      $this->complemento = $complemento;
    } catch (Exception $e) {
      echo $e->getMessage();
    }       
  }

  public function setCidade($cidade) {
    try {
      $this->cidade = $cidade;
    } catch (Exception $e) {
      echo $e->getMessage();
    }    
  }

  public function setEstado($estado) {
    try {
      $this->estado = $estado;
    } catch (Exception $e) {
      echo $e->getMessage();
    }        
  }

  public function setCep($cep) {
    try {
      $this->cep = $cep;
    } catch (Exception $e) {
      echo $e->getMessage();
    }     
  }

  public function setClientId($clientId) {
    try {
      $this->clientId = $clientId;
    } catch (Exception $e) {
      echo $e->getMessage();
    }     
  }

  public function getAllAddressesFromClient($clientId) {
    try {
      global $con;
      $sql = "Select * from `addresses` where clientid=$clientId";
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
      $stmt = $con->prepare("insert into addresses(rua, numero, bairro, complemento, cidade,
      estado, cep, clientid)
      values(?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sssssssi", $this->rua, $this->numero, $this->bairro,
      $this->complemento, $this->cidade, $this->estado, $this->cep, $this->clientId);
      $stmt->execute();
      $stmt->close();
      $con->close();
      echo "<html><script type='text/javascript'>alert('Endereço cadastrado com Sucesso!')
              window.location.replace('client-address.php?clientid=".$this->clientId."')</script></html>";

    }
    } catch (Exception $e) {
      echo $e->getMessage();
    }     
  }

  public function deleteById($id) {
    try {
      global $con;
      $sql = "delete from `addresses` where id=$id";
      $result = mysqli_query($con, $sql);
      if($result) {
        echo "<html><script type='text/javascript'>alert('Cliente deletado com Sucesso!')
              window.location.replace('client-address.php?clientid=".$this->clientId."')</script></html>";
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
      $sql = "update `addresses` set id=$id,rua='$this->rua',numero='$this->numero',
      bairro='$this->bairro',complemento='$this->complemento',cidade='$this->cidade',
      estado='$this->estado',cep='$this->cep',clientid=$this->clientId
      where id=$id";
      $result = mysqli_query($con, $sql);
      if($result) {
      echo "<html><script type='text/javascript'>alert('Endereço atualizado com Sucesso!')
      window.location.replace('client-address.php?clientid=".$this->clientId."')</script></html>";
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
      $sql = "Select * from `addresses` where id=$id";
      $result = mysqli_query($con, $sql);
      $row = mysqli_fetch_assoc($result);
      $this->rua = $row['rua'];
      $this->numero = $row['numero'];
      $this->bairro = $row['bairro'];
      $this->complemento = $row['complemento'];
      $this->cidade = $row['cidade'];
      $this->estado = $row['estado'];
      $this->cep = $row['cep'];
      } catch (Exception $e) {
      echo $e->getMessage();
      }     
  }

}

?>