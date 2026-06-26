<?php
session_start();

if (!isset($_SESSION["id"]) || $_SESSION["tipo"] != "administrador") {
    header("Location: login.html");
    exit;
}

include("conexao.php");

$sql = "SELECT * FROM produtos";
$resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Admin - Floras</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="admin-container">

        <h1 class="admin-title">Área Administrativa</h1>

        <a href="logout.php" class="btn-sair-admin">Sair</a>

        <h2>Cadastrar Produto</h2>

        <form class="admin-form" action="salvar_produto.php" method="POST" enctype="multipart/form-data">

            <input type="text" name="nome" placeholder="Nome do produto" required>

            <input type="text" name="descricao" placeholder="Descrição" required>

            <input type="number" step="0.01" name="preco" placeholder="Preço" required>

            <input type="number" name="quantidade" placeholder="Quantidade em estoque" min="0" required>

            <input type="file" name="imagem" accept="image/*" required>

            <button type="submit">Salvar Produto</button>

        </form>

        <h2>Produtos Cadastrados</h2>

        <div class="admin-lista">

            <?php while ($produto = mysqli_fetch_assoc($resultado)) { ?>

                <div class="admin-card">

                    <p><strong><?php echo $produto['nome']; ?></strong></p>
                    <p><?php echo $produto['descricao']; ?></p>
                    <p>R$ <?php echo $produto['preco']; ?></p>
                    <p>Estoque: <?php echo $produto['quantidade']; ?></p>

                    <img src="uploads/<?php echo $produto['imagem']; ?>" width="80">

                    <div class="admin-actions">

                        <a class="btn-excluir" href="excluir_produto.php?id=<?php echo $produto['id']; ?>">
                            Excluir
                        </a>

                        <a class="btn-editar" href="editar_produto.php?id=<?php echo $produto['id']; ?>">
                            Editar
                        </a>

                    </div>

                </div>

            <?php } ?>

        </div>

    </div>
    <footer>
        <p><b>Estudantes:David de Araújo Santos e Flora Aguiar</b></p>
        <p>Turma: <b> INF261</b></p>
        <p>&copy; 2026 Floras - Todos os direitos reservados.</p>
    </footer>
</body>

</html>