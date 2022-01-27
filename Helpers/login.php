<?php
include "connect.php";
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

if (isset($password) && isset($email)) {
    try {
     
      if ($con->connect_error) {
        die("Failed to connect: " . $con->connect_error);
      } else {
        $stmt = $con->prepare("select * from users where email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt_result = $stmt->get_result();
        if ($stmt_result->num_rows > 0) {
          $data = $stmt_result->fetch_assoc();
          if ($data['password'] === $password) {
            $_SESSION['userLogged'] = "1";

            echo "<html><script type='text/javascript'>alert('Usuário Logado com Sucesso!')
              window.location.replace('../Views/Client/clients.php')</script></html>";
          } else {
            $_SESSION['userLogged'] = "0";
            echo "<html><script type='text/javascript'>alert('Email ou senha Inválidos')
              window.location.replace('../index.html')</script></html>";
          }
        } else {
          $_SESSION['userLogged'] = "0";
          echo "<html><script type='text/javascript'>alert('Email ou senha Inválidos')
              window.location.replace('../index.html')</script></html>";
        }
      }
    }
    catch(Exception $ex)
    {
        echo $e->getMessage();
    }  
 }
?>