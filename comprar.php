<?php
session_start();

if (!isset($_SESSION["id"])) {
  header("Location: login.html");
  exit;
}

include("conexao.php");

if (!isset($_GET["id"])) {
  header("Location: index.php");
  exit;
}

$id = intval($_GET["id"]);

$sql = "SELECT * FROM produtos WHERE id=$id";
$resultado = mysqli_query($conexao, $sql);

$produto = mysqli_fetch_assoc($resultado);

if (!$produto) {
  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <title>Comprar Produto</title>
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

  <header>
    <div class="logo">
      <h1>🌸 Floras</h1>
    </div>
  </header>

  <main>

    <section class="produtos">

      <h2>Finalizar Compra</h2>

      <div class="grid-produtos">

        <div class="produto">

          <img src="uploads/<?php echo $produto["imagem"]; ?>" alt="<?php echo $produto["nome"]; ?>">

          <h3><?php echo $produto["nome"]; ?></h3>

          <p><?php echo $produto["descricao"]; ?></p>

          <span>
            R$ <?php echo number_format($produto["preco"], 2, ",", "."); ?>
          </span>

          <p>Estoque: <?php echo $produto["quantidade"]; ?> unidades</p>

          <?php if ($produto["quantidade"] > 0) { ?>

            <form action="finalizar_compra.php" method="POST">

              <input type="hidden" name="id" value="<?php echo $produto["id"]; ?>">

              <input type="number"
                name="quantidade"
                min="1"
                max="<?php echo $produto["quantidade"]; ?>"
                value="1"
                required>

              <button type="submit">Confirmar Compra</button> <br>
              <button href="index.php">Voltar</button>

            </form>

          <?php } else { ?>

            <button disabled>Esgotado</button>

          <?php } ?>

        </div>

      </div>

    </section>

  </main>
  <footer>
    <p><b>Estudantes:David de Araújo Santos e Flora Aguiar</b></p>
    <p>Turma: <b> INF261</b></p>
    <p>&copy; 2026 Floras - Todos os direitos reservados.</p>
  </footer>
</body>

</html>