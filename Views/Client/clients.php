<?php
include '../../Helpers/connect.php';
include '../../Controllers/ClientController.php';

session_start();

if (!isset($_SESSION["userLogged"])) {
  echo "<html><script type='text/javascript'>
  window.location.replace('../../index.html')</script></html>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Clientes</title>
  <link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.css">
</head>
<body>
  <div class="container">
  <div class="row text-center my-5">
    <h1>Gerenciador de Clientes</h1>
  </div>
  <button class="btn btn-success my-2">
    <a href="add-client.php" class="text-light">CADASTRAR CLIENTE</a>
  </button>
  <button class="btn btn-danger my-2">
    <a href="../../Helpers/logout.php" class="text-light">Logout</a>
  </button>
  <table class="table my-4">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">Data de Nascimento</th>
      <th scope="col">CPF</th>
      <th scope="col">RG</th>
      <th scope="col">Telefone</th>
      <th scope="col">Endereços</th>
      <th scope="col">Operações</th>
    </tr>
  </thead>
  <tbody>

<?php

$clientFound = new Client;
$result = $clientFound->getAll();

if($result) {
  while($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $name = $row['name'];
    $birthDate = $row['birthDate'];
    $cpf = $row['CPF'];
    $rg = $row['RG'];
    $phone = $row['phone'];
    echo '<tr>
    <th scope="row">'.$id.'</th>
    <td>'.$name.'</td>
    <td>'.$birthDate.'</td>
    <td>'.$cpf.'</td>
    <td>'.$rg.'</td>
    <td>'.$phone.'</td>
    <td>
    <button class="btn btn-secondary" >
      <a href="Addresses/client-address.php?clientid='.$id.'" class="text-light">
        Endereços
      </a>
    </button>
    </td>
    <td>
    <button class="btn btn-primary" >
      <a href="update-client.php?updateid='.$id.'" class="text-light">
        Editar
      </a>
    </button>
    <button class="btn btn-danger">
      <a href="delete-client.php?deleteid='.$id.'" class="text-light">
        Deletar
      </a>
    </button>
  </td>
  </tr>
  <tr>';
  }
}
?>
  

  </tbody>
</table>
  </div>
</body>
</html>