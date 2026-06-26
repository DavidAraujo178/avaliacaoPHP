<?php
include("conexao.php");

$id = $_POST['id'];
$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];
$quantidade = $_POST['quantidade'];

$sql = "UPDATE produtos 
        SET nome='$nome',
            descricao='$descricao',
            preco='$preco',
            quantidade='$quantidade'
        WHERE id=$id";

mysqli_query($conexao, $sql);

header("Location: admin.php");
exit;
