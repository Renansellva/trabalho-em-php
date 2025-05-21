<?php
session_start();
include 'usuarios.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  foreach ($usuarios as $user) {
    if ($user['email'] === $email && $user['senha'] === $senha) {
      $_SESSION['usuario'] = $user;
      header("Location: telainicial.php");
      exit();
    }
  }

  $erro = "E-mail ou senha inválidos!";
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>
  <?php if ($erro): ?>
    <p style="color: red;"><?php echo $erro; ?></p>
  <?php endif; ?>

  <form method="POST" action="">
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Senha:</label><br>
    <input type="password" name="senha" required><br><br>

    <button type="submit">Entrar</button>
  </form>

  <!-- ✅ Adicione este link logo abaixo do formulário -->
  <p>Não tem conta? <a href="cadastro.php">Cadastre-se aqui</a></p>
</body>
</html>
