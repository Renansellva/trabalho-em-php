<?php
session_start();
include 'usuarios.php';

$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];
  $foto = $_FILES['foto'];

  // Salvar imagem enviada
  $caminhoFoto = 'img/' . basename($foto['name']);
  move_uploaded_file($foto['tmp_name'], $caminhoFoto);

  // Criar novo usuário
  $novoUsuario = [
    'email' => $email,
    'senha' => $senha,
    'nome' => $nome,
    'foto' => $caminhoFoto
  ];

  // Simular salvamento (aqui adicionamos à sessão, pois não usamos banco)
  $_SESSION['usuario'] = $novoUsuario;

  // Redireciona para tela inicial
  header("Location: telainicial.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro</title>
</head>
<body>
  <h1>Cadastro de Usuário</h1>

  <form method="POST" enctype="multipart/form-data">
    <label>Nome:</label><br>
    <input type="text" name="nome" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Senha:</label><br>
    <input type="password" name="senha" required><br><br>

    <label>Foto:</label><br>
    <input type="file" name="foto" accept="image/*" required><br><br>

    <button type="submit">Cadastrar</button>
  </form>

  <p><a href="login.php">Voltar para Login</a></p>
</body>
</html>
