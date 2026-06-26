<?php
session_start();

if (!isset($_SESSION["id"])) {
  header("Location: login.html");
  exit;
}

include("conexao.php");

$id = intval($_POST["id"]);
$quantidade = intval($_POST["quantidade"]);

if ($quantidade <= 0) {
  header("Location: index.php");
  exit;
}

$sql = "SELECT quantidade FROM produtos WHERE id=$id";
$resultado = mysqli_query($conexao, $sql);
$produto = mysqli_fetch_assoc($resultado);

if (!$produto) {
  header("Location: index.php");
  exit;
}

if ($produto["quantidade"] >= $quantidade) {

  $novaQuantidade = $produto["quantidade"] - $quantidade;

  $sql = "UPDATE produtos 
          SET quantidade = $novaQuantidade 
          WHERE id=$id";

  mysqli_query($conexao, $sql);

  header("Location: index.php");
  exit;
} else {

  echo "<h2 style='color:red;text-align:center;margin-top:50px;'>
          Estoque insuficiente!
        </h2>";

  echo "<p style='text-align:center;'>
          <a href='index.php'>Voltar</a>
        </p>";

  exit;
}
