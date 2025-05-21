<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location: login.php");
  exit();
}

$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Perfil do Usuário</title>
</head>
<body>
  <h1>Perfil do Usuário</h1>
  <p>Nome: <?php echo $usuario['nome']; ?></p>
  <p>Email: <?php echo $usuario['email']; ?></p>
  <img src="<?php echo $usuario['foto']; ?>" alt="Foto de perfil" width="200">
  <br><a href="telainicial.php">Voltar</a>
</body>
</html>
