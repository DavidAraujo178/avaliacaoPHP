<?php
include("conexao.php");

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$preco = $_POST['preco'];

// imagem
$imagem_nome = $_FILES['imagem']['name'];
$imagem_tmp = $_FILES['imagem']['tmp_name'];

$pasta = "uploads/";
$caminho = $pasta . $imagem_nome;

// move arquivo
move_uploaded_file($imagem_tmp, $caminho);

$sql = "INSERT INTO produtos (nome, descricao, preco, imagem)
VALUES ('$nome', '$descricao', '$preco', '$imagem_nome')";

mysqli_query($conexao, $sql);

header("Location: admin.php");
exit;
?>