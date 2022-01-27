<?php
include "../../../Helpers/connect.php";
include '../../../Controllers/AddressController.php';

session_start();

if (!isset($_SESSION["userLogged"])) {
  echo "<html><script type='text/javascript'>
  window.location.replace('../../../index.html')</script></html>";
}

$currentAddress = new Address;
$currentAddress->getById($_GET['updateaddressid']);



if(isset($_GET['clientid'])) {
  $clientid = $_GET['clientid'];
}



if(isset($_POST['submit'])) {
  $addressUpdated = new Address;
  $addressUpdated->setRua($_POST['rua']);
  $addressUpdated->setNumero($_POST['numero']);
  $addressUpdated->setBairro($_POST['bairro']);
  $addressUpdated->setComplemento($_POST['complemento']);
  $addressUpdated->setCidade($_POST['cidade']);
  $addressUpdated->setEstado($_POST['estado']);
  $addressUpdated->setCep($_POST['cep']);
  $addressUpdated->setClientId($_GET['clientid']);

  $addressUpdated->updateById($_GET['updateaddressid']);
    
};

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atualizar Endereço</title>
  <link rel="stylesheet" type="text/css" href="../../../public/css/bootstrap.css">
</head>
<body>
  <div class="container">
    <h1 class="mt-5">Atualizar Endereço</h1>
  <form method="post">
  <div class="mb-3">
    <label for="rua" class="form-label">Rua</label>
    <input type="text" class="form-control" id="rua" 
    autocomplete="off" value=<?php echo $currentAddress->rua;?> name="rua" required/>
  </div>
  <div class="mb-3">
    <label for="numero" class="form-label">Número</label>
    <input type="text" class="form-control" 
    value=<?php echo $currentAddress->numero;?> id="numero" name="numero" required/>
  </div>
  <div class="mb-3">
    <label for="bairro" class="form-label">Bairro</label>
    <input type="text" class="form-control" 
    value=<?php echo $currentAddress->bairro;?> id="bairro" name="bairro" required/>
  </div>
  <div class="mb-3">
    <label for="complemento" class="form-label">Complemento</label>
    <input type="text" class="form-control" id="complemento" 
    value=<?php echo $currentAddress->complemento;?> name="complemento" required/>
  </div>
  <div class="mb-3">
    <label for="cidade" class="form-label">Cidade</label>
    <input type="text" class="form-control" id="cidade" 
    value=<?php echo $currentAddress->cidade;?> name="cidade" required/>
  </div>
  <div class="mb-3">
    <label for="estado" class="form-label">Estado</label>
    <input type="text" class="form-control" id="estado" 
    value=<?php echo $currentAddress->estado;?> name="estado" required/>
  </div>
  <div class="mb-3">
    <label for="cep" class="form-label">CEP</label>
    <input type="text" class="form-control" id="cep" 
    value=<?php echo $currentAddress->cep;?> name="cep" required/>
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Atualizar</button>
  <button class="btn btn-danger" name="submit">
  <a class="text-light" href=<?php echo "client-address.php?clientid=$clientid"?>>  
  Cancelar
  <a>
  </button>
</form>
  </div>
</body>
</html>