<?php
$servidor = "localhost:3307";
$usuario = "root";
$senha = "";
$banco = "floras";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conexao) {
  die("Conexão falhou: " . mysqli_connect_error());
}

mysqli_set_charset($conexao, "utf8");
