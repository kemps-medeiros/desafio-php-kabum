<?php
include "../../../Helpers/connect.php";
include '../../../Controllers/AddressController.php';

session_start();

if (!isset($_SESSION["userLogged"])) {
  echo "<html><script type='text/javascript'>
  window.location.replace('../../../index.html')</script></html>";
}



if(isset($_GET['deleteaddressid'])) {
  $address = new Address;
  $address->setClientId($_GET['clientid']);
  
}

if(isset($_POST['submit'])) {
  $addressDeleted = new Address;
  $addressDeleted->setClientId($_GET['clientid']);
  $addressDeleted->deleteById($_GET['deleteaddressid']);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Deletar Cliente</title>
  <link rel="stylesheet" type="text/css" href="../../../public/css/bootstrap.css">
</head>
<body>
  <div class="container vh-100">
    <div class="row justify-content-center h-100">
      <div class="card shadow my-auto">
        <div class="card-body mt-10 text-center">
          <form method="post" class="my-10">
           
            <h2 class="mt-20">Você tem certeza que deseja excluir esse endereço?</h2>
            <button type="submit" class="btn btn-primary" name="submit">SIM</button>
            <button  class="btn btn-danger">
              <a href=<?php echo "client-address.php?clientid=$address->clientId"?> class="text-light">Cancelar</a>
            </button>
          </form> 
        </div>
        
      </div>
    </div>
  </div>
</body>
</html>