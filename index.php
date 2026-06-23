<?php
session_start();

if (!isset($_SESSION["id"])) {
    header("Location: login.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Floras</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header>
        <div class="logo">
            <h1>🌸 Floras</h1>
        </div>

        <nav>
            <ul>
                <li><a href="#inicio">Início</a></li>
                <li><a href="#produtos">Produtos</a></li>
                <li><a href="#categorias">Categorias</a></li>
                <li><a href="#contato">Contato</a></li>
                <li class="sair"><a href="logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>

    <main>

        <section class="banner" id="inicio">
            <div class="banner-texto">
                <h2>Super Ofertas da Semana</h2>
                <p>Até 50% de desconto em flores e buquês selecionados.</p>
                <a href="#produtos" class="btn">Ver Produtos</a>
            </div>
        </section>

        <section class="categorias" id="categorias">
            <h2>Categorias</h2>

            <div class="grid-categorias">
                <div class="categoria">🌹 Rosas</div>
                <div class="categoria">🌻 Girassóis</div>
                <div class="categoria">🌺 Orquídeas</div>
                <div class="categoria">💐 Flores do Campo</div>
            </div>
        </section>

        <section class="produtos" id="produtos">
            <h2>Produtos em Destaque</h2>

            <div class="grid-produtos">

                <div class="produto">
                    <img src="img/buquerosa.png" alt="Buquê de Rosas">
                    <h3>Buquê de Rosas</h3>
                    <p>20 unidades disponíveis</p>
                    <span>R$ 89,90</span>
                    <button>Comprar</button>
                </div>

                <div class="produto">
                    <img src="img/buquegirassol.png" alt="Buquê de Girassóis">
                    <h3>Buquê Girassóis</h3>
                    <p>15 unidades disponíveis</p>
                    <span>R$ 69,90</span>
                    <button>Comprar</button>
                </div>

                <div class="produto">
                    <img src="img/buqueilirio.png" alt="Buquê de Lírios">
                    <h3>Buquê Lírio</h3>
                    <p>8 unidades disponíveis</p>
                    <span>R$ 119,90</span>
                    <button>Comprar</button>
                </div>

            </div>
        </section>

    </main>

    <footer>
        <p>&copy; 2026 Floras - Todos os direitos reservados.</p>
    </footer>

</body>

</html>