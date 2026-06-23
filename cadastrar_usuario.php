<?php
include("conexao.php");

$usuario = $_POST['usuario'];
$senha = $_POST['senha'];

// verifica se usuário já existe
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
$resultado = mysqli_query($conexao, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo "<script>
        alert('Usuário já existe!');
        window.location.href = 'cadastrar_usuario.html';
    </script>";
    exit;
}

// salva no banco
$sql = "INSERT INTO usuarios (usuario, senha) VALUES ('$usuario', '$senha')";

if (mysqli_query($conexao, $sql)) {
    echo "<script>
        alert('Usuário cadastrado com sucesso!');
        window.location.href = 'login.html';
    </script>";
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}
?>