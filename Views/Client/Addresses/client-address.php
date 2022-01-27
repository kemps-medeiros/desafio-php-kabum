<?php
include "../../../Helpers/connect.php";
include '../../../Controllers/AddressController.php';
session_start();

if (!isset($_SESSION["userLogged"])) {
  echo "<html><script type='text/javascript'>
  window.location.replace('../../../index.html')</script></html>";
}

if(isset($_GET['clientid'])) {
  $clientId = $_GET['clientid'];
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Endereços</title>
  <link rel="stylesheet" type="text/css" href="../../../public/css/bootstrap.css">
</head>
<body>
  <div class="container">
  <div class="row text-center my-5">
    <h1>Endereços cadastrados para o cliente: </h1>
  </div>
  <button class="btn btn-success my-2">
    <a href=<?php echo "add-address.php?clientid=$clientId" ?> class="text-light">CADASTRAR NOVO ENDEREÇO</a>
  </button>
  <table class="table my-4">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Rua</th>
      <th scope="col">Numero</th>
      <th scope="col">Bairro</th>
      <th scope="col">Complemento</th>
      <th scope="col">CEP</th>
      <th scope="col">Cidade</th>
      <th scope="col">Estado</th>
      <th scope="col">Operações</th>
    </tr>
  </thead>
  <tbody>

<?php


$allAddresses = new Address;
$result = $allAddresses->getAllAddressesFromClient($clientId);
if($result) {
  while($row = mysqli_fetch_assoc($result)) {
    $id = $row['id'];
    $rua = $row['rua'];
    $numero = $row['numero'];
    $bairro = $row['bairro'];
    $complemento = $row['complemento'];
    $cep = $row['cep'];
    $cidade = $row['cidade'];
    $estado = $row['estado'];
    echo '<tr>
    <th scope="row">'.$id.'</th>
    <td>'.$rua.'</td>
    <td>'.$numero.'</td>
    <td>'.$bairro.'</td>
    <td>'.$complemento.'</td>
    <td>'.$cep.'</td>
    <td>'.$cidade.'</td>
    <td>'.$estado.'</td>
    
    <td>
    <button class="btn btn-primary" >
      <a href="update-address.php?updateaddressid='.$id.'&clientid='.$clientId.'" class="text-light">
        Editar
      </a>
    </button>
    <button class="btn btn-danger">
      <a href="delete-address.php?deleteaddressid='.$id.'&clientid='.$clientId.'" class="text-light">
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
  <button class="btn btn-warning my-2">
    <a href="../clients.php" class="text-dark">RETORNAR PARA CLIENTES</a>
  </button>

  </div>
 
</body>
</html>