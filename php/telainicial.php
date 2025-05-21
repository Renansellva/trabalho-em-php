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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Página Inicial</title>
  <link rel="stylesheet" href="telainicial.css" />
</head>
<body>

  <header>
    <h1>Boletim Fácil</h1>
    <div class="perfil"> 
      <a href="perfil.php">Meu Perfil</a>
      <img src="<?php echo $usuario['foto']; ?>" alt="Foto do usuário">
      <span><?php echo $usuario['nome']; ?></span>
    </div>
  </header>

  <div class="main-container">
    <nav class="sidebar">
      <ul>
        <li><a href="telainicial.php">Início</a></li>
        <li><a href="#">Notas</a></li>
        <li><a href="#">Boletim</a></li>
        <li><a href="#">Configurações</a></li>
        <li><a href="logout.php">Sair</a></li>
      </ul>
    </nav>

    <main>
      <h2>Bem-vindo, <?php echo $usuario['nome']; ?>!</h2>
      <p>Aqui você pode acompanhar suas notas, visualizar boletins e muito mais.</p>
    </main>
  </div>

</body>
</html>
