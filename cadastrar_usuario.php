<?php
include("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email = '$email'";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<script>
        alert('Email já cadastrado!');
        window.location.href = 'cadastrar_usuario.html';
    </script>";
    exit;
}

$sql = "INSERT INTO usuarios (nome, email, senha, tipo)
        VALUES ('$nome', '$email', '$senha', 'usuario')";

if (mysqli_query($conexao, $sql)) {
    echo "<script>
        alert('Usuário cadastrado com sucesso!');
        window.location.href = 'login.html';
    </script>";
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}
