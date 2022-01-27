<?php
include '../../../Helpers/connect.php';
include '../../../Controllers/AddressController.php';
session_start();

if (!isset($_SESSION["userLogged"])) {
  echo "<html><script type='text/javascript'>
  window.location.replace('../../../index.html')</script></html>";
}

if(isset($_GET['clientid'])) {
  $clientid = $_GET['clientid'];
}



if(isset($_POST['submit'])) {
  $addressSent = new Address;
  $addressSent->setRua($_POST['rua']);
  $addressSent->setNumero($_POST['numero']);
  $addressSent->setBairro($_POST['bairro']);
  $addressSent->setComplemento($_POST['complemento']);
  $addressSent->setCidade($_POST['cidade']);
  $addressSent->setEstado($_POST['estado']);
  $addressSent->setCep($_POST['cep']);
  $addressSent->setClientId($_GET['clientid']);
  $addressSent->save();

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Adicionar Endereço</title>
  <link rel="stylesheet" type="text/css" href="../../../public/css/bootstrap.css">
</head>
<body>
  <div class="container">
    <h1 class="mt-5">Adicionar novo Endereço</h1>
  <form method="post">
  <div class="mb-3">
    <label for="rua" class="form-label">Rua</label>
    <input type="text" class="form-control" id="rua" 
    autocomplete="off"  name="rua" required/>
  </div>
  <div class="mb-3">
    <label for="numero" class="form-label">Número</label>
    <input type="text" class="form-control" id="numero" name="numero" required/>
  </div>
  <div class="mb-3">
    <label for="bairro" class="form-label">Bairro</label>
    <input type="text" class="form-control" id="bairro" name="bairro" required/>
  </div>
  <div class="mb-3">
    <label for="complemento" class="form-label">Complemento</label>
    <input type="text" class="form-control" id="complemento" name="complemento"
     required/>
  </div>
  <div class="mb-3">
    <label for="cidade" class="form-label">Cidade</label>
    <input type="text" class="form-control" id="cidade" name="cidade" required/>
  </div>
  <div class="mb-3">
    <label for="estado" class="form-label">Estado</label>
    <input type="text" class="form-control" id="estado" name="estado" required/>
  </div>
  <div class="mb-3">
    <label for="cep" class="form-label">CEP</label>
    <input type="text" class="form-control" id="cep" name="cep" required/>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Adicionar</button>
  <button class="btn btn-danger" name="submit">
  <a class="text-light" href=<?php echo "client-address.php?clientid=$clientid"?>>  
  Cancelar
  <a>
  </button>
</form>
  </div>
</body>
</html>