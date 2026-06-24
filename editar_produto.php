<?php
include("conexao.php");

$id = $_GET['id'];

$sql = "SELECT * FROM produtos WHERE id = $id";
$resultado = mysqli_query($conexao, $sql);
$produto = mysqli_fetch_assoc($resultado);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="admin-container">

        <h1>Editar Produto</h1>

        <form class="admin-form" action="update_produto.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">

            <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required>

            <input type="text" name="descricao" value="<?php echo $produto['descricao']; ?>" required>

            <input type="number" step="0.01" name="preco" value="<?php echo $produto['preco']; ?>" required>
            
            <input type="number" name="quantidade" value="<?php echo $produto['quantidade']; ?>" required>

            <button type="submit">Atualizar Produto</button>

        </form>

    </div>

</body>

</html>