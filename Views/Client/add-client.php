<?php
include '../../Helpers/connect.php';
include '../../Controllers/ClientController.php';
session_start();

if (!isset($_SESSION["userLogged"])) {
  echo "<html><script type='text/javascript'>
  window.location.replace('../../index.html')</script></html>";
}

if(isset($_POST['submit'])) {

  $client = new Client;
  $client->setName($_POST['name']);
  $client->setBirthDate($_POST['birthDate']);
  $client->setCpf($_POST['cpf']);
  $client->setRg($_POST['rg']);
  $client->setPhone($_POST['phone']);
  $client->save();

};
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
    <h1 class="mt-5">Adicionar novo Cliente</h1>
  <form method="post">
  <div class="mb-3">
    <label for="name" class="form-label">Nome</label>
    <input type="text" class="form-control" id="name" 
    autocomplete="off" placeholder="Digite seu nome" name="name" required/>
  </div>
  <div class="mb-3">
    <label for="birthDate" class="form-label">Data de Aniversário</label>
    <input type="date" class="form-control" id="birthDate" name="birthDate" required/>
  </div>
  <div class="mb-3">
    <label for="cpf" class="form-label">CPF</label>
    <input type="text" class="form-control" id="cpf" name="cpf" required/>
  </div>
  <div class="mb-3">
    <label for="rg" class="form-label">RG</label>
    <input type="text" class="form-control" id="rg" name="rg" required/>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Telefone</label>
    <input type="text" class="form-control" id="phone" name="phone" required/>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Adicionar</button>
  <button  class="btn btn-danger">
    <a href="clients.php" class="text-light">Cancelar</a>
  </button>
</form>
  </div>
</body>
</html>