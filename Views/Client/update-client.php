<?php
include '../../Helpers/connect.php';
include '../../Controllers/ClientController.php';
session_start();

if (!isset($_SESSION["userLogged"])) {
  echo "<html><script type='text/javascript'>
  window.location.replace('../../index.html')</script></html>";
}

$id = $_GET['updateid'];
$currentClient = new Client;
$currentClient->getById($id);

if(isset($_POST['submit'])) {
  $clientUpdated = new Client;
  $clientUpdated->setName($_POST['name']);
  $clientUpdated->setBirthDate($_POST['birthDate']);
  $clientUpdated->setCpf($_POST['cpf']);
  $clientUpdated->setRg($_POST['rg']);
  $clientUpdated->setPhone($_POST['phone']);
  $clientUpdated->updateById($id);

};

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Cliente</title>
  <link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.css">
</head>
<body>
  <div class="container">
    <h1 class="mt-5">Editar Cliente</h1>
  <form method="post">
  <div class="mb-3">
    <label for="name" class="form-label">Nome</label>
    <input type="text" class="form-control" id="name" 
    autocomplete="off" name="name" value=<?php echo $currentClient->name;?> required/>
  </div>
  <div class="mb-3">
    <label for="birthDate" class="form-label">Data de Aniversário</label>
    <input type="date" class="form-control" id="birthDate" 
    name="birthDate" value=<?php echo $currentClient->birthDate;?> required/>
  </div>
  <div class="mb-3">
    <label for="cpf" class="form-label">CPF</label>
    <input type="text" class="form-control" 
    id="cpf" name="cpf" value=<?php echo $currentClient->cpf;?> required/>
  </div>
  <div class="mb-3">
    <label for="rg" class="form-label">RG</label>
    <input type="text" class="form-control" 
    id="rg" name="rg" value=<?php echo $currentClient->rg;?> required/>
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Telefone</label>
    <input type="text" class="form-control" id="phone" 
    value=<?php echo $currentClient->phone;?> name="phone" required/>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Atualizar</button>
  <button class="btn btn-danger">
    <a href="clients.php" class="text-light">Cancelar</a>
  </button>
</form>
  </div>
</body>
</html>