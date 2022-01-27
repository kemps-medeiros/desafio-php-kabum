<?php
include "../../Helpers/connect.php";
include "../../Controllers/UserController.php";

if(isset($_POST['submit'])) {
  $userCreated = new User;
  $userCreated->setUsername($_POST['username']);
  $userCreated->setEmail($_POST['email']);
  $userCreated->setPassword($_POST['password']);
  $userCreated->save();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar Novo Usuário</title>
  <link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.css">
</head>

<body>
  <div class="container vh-100">
    <div class="row col-md-6 offset-md-3 h-100">
      <div class="card my-auto">
        <div class="card-header text-center bg-primary text-white">
          <h2>Registrar Usuário</h2>
        </div>
        <div class="card-body">
          <form method="post">
            <div class="form-group">
              <label for="username">Nome</label>
              <input type="text" id="username" class="form-control" name="username" required />
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" id="email" class="form-control" name="email" required />
            </div>
            <div class="form-group">
              <label for="password">Senha</label>
              <input type="password" id="password" class="form-control" name="password" required />
            </div>
            <button type="submit" class="btn btn-success mt-2" name="submit">Cadastrar</button>
            <a class="btn btn-danger mt-2" href="../../index.html">Cancelar</a>
          </form>
        </div>
        <div class="card-footer">

        </div>
      </div>

    </div>

  </div>

</body>

</html>