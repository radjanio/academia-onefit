<?php
// Exemplo simples de conteúdo dinâmico opcional
$aberta = (date('H') >= 6 && date('H') < 22);
$status = $aberta ? 'Aberta agora 🟢' : 'Fechada no momento 🔴';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>OneFit - Academia do Bem</title>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
</head>

<body>
  <!-- Cabeçalho -->
  <header class="header">
    <div class="container">
      <div class="logo">
        <img src="img/OneFit-logo.png" alt="Logo OneFit">
        <h1>OneFit <span>– Amigos do Bem</span></h1>
      </div>
      <nav class="nav">
        <ul>
            <li><a href="index.php#home">Início</a></li>
            <li><a href="index.php#sobre">Sobre</a></li>
            <li><a href="index.php#servicos">Serviços</a></li>
            <li><a href="index.php#profissionais">Profissionais</a></li>
            <li><a href="plans.php" class="ativo">Planos</a></li>
            <li><a href="produtos.php" class="ativo">Produtos</a></li>
        </ul>
      </nav>
      <button class="menu-btn" onclick="menuShow()">
        <img class="icon" src="img/on-menu.png" alt="Menu">
      </button>
    </div>
    <div class="menu-mobile">
      <ul>
            <li><a href="index.php#home">Início</a></li>
            <li><a href="index.php#sobre">Sobre</a></li>
            <li><a href="index.php#servicos">Serviços</a></li>
            <li><a href="index.php#profissionais">Profissionais</a></li>
            <li><a href="plans.php" class="ativo">Planos</a></li>
            <li><a href="produtos.php" class="ativo">Produtos</a></li>
      </ul>
    </div>
  </header>

  <!-- Hero -->
  <section class="hero" id="home">
    <div class="carousel">
      <div class="slide active" style="background-image: url('https://i.pinimg.com/1200x/2a/53/27/2a532769676a19bc89c353e5dfafc74d.jpg');"></div>
      <div class="slide" style="background-image: url('https://i.pinimg.com/736x/80/a3/c6/80a3c66926be07d221d77b20bc0d0662.jpg');"></div>
      <div class="slide" style="background-image: url('https://i.pinimg.com/1200x/76/c7/6a/76c76a7a19d36104ad013fe959f5f8ef.jpg');"></div>
    </div>
    <div class="hero-content">
      <h2>Transforme seu corpo. Inspire sua mente.</h2>
      <p>Bem-vindo à <strong>OneFit – Academia do Bem</strong>.<br>
      Treine com qualidade, propósito e apoio profissional.</p>
      <a href="#sobre" class="btn">Saiba Mais</a>
    </div>
  </section>

  <!-- Sobre -->
  <section class="sobre" id="sobre">
    <div class="container">
      <div class="texto">
        <h3>Sobre a OneFit</h3>
        <p>
          A <strong>OneFit</strong> nasceu com o propósito de unir saúde, bem-estar e solidariedade.  
          Somos uma academia completa, com programas personalizados para todos os públicos —  
          do iniciante ao atleta, promovendo inclusão e qualidade de vida.
        </p>
      </div>
      
      <div class="imagem">
        <img src="img/OneFit-logo.png" alt="Academia OneFit">
      </div>
      <strong>OneFit - Academia do Bem</strong>
    </div>
  </section>

  <!-- Status de funcionamento -->
  <section id="status-academia">
    <p><?php echo $status; ?></p>
  </section>

  <!-- Serviços -->
  <section class="servicos" id="servicos">
    <h3>Nossos Serviços</h3>
    <div class="grid">
      <div class="card"><img src="https://i.pinimg.com/736x/96/3e/c7/963ec7595a319f128982d4bd87a7ac6a.jpg"><h4>Personal Masculino</h4></div>
      <div class="card"><img src="https://i.pinimg.com/736x/f8/aa/62/f8aa629d61b8005d2c323c2d4a056c38.jpg"><h4>Personal Feminino</h4></div>
      <div class="card"><img src="https://i.pinimg.com/1200x/55/bc/98/55bc98de44c56053851f2cb5193f74dd.jpg"><h4>Personal Inclusivo</h4></div>
      <div class="card"><img src="https://i.pinimg.com/736x/58/4d/1a/584d1ab91ddfd29bab9d673483cbfed6.jpg"><h4>Fisioterapeuta</h4></div>
      <div class="card"><img src="https://i.pinimg.com/736x/4c/1a/30/4c1a30f5ab6f9a7e437128aceee3f503.jpg"><h4>Nutricionista</h4></div>
      <div class="card"><img src="https://i.pinimg.com/1200x/85/fe/5b/85fe5b8645c58c22ceb514c3de438f5b.jpg"><h4>CrossFit</h4></div>
      <div class="card"><img src="https://i.pinimg.com/736x/8a/08/52/8a08529e011255812887ced44a380cb2.jpg"><h4>Artes Marciais</h4></div>
    </div>
  </section>

  <!-- Profissionais -->
  <section class="profissionais" id="profissionais">
    <h3>Equipe OneFit</h3>
    <div class="grid">
      <div class="pro-card">
        <img src="img/radjanio-1.jpg" alt="Personal Trainer">
        <h4>João Silva</h4>
        <p>Personal Trainer</p>
      </div>
      <div class="pro-card">
        <img src="img/radjanio-2.jpeg" alt="Nutricionista">
        <h4>Maria Souza</h4>
        <p>Nutricionista Esportiva</p>
      </div>
      <div class="pro-card">
        <img src="img/radjanio-3.jpg" alt="Fisioterapeuta">
        <h4>Lucas Santos</h4>
        <p>Fisioterapeuta</p>
      </div>
    </div>
  </section>

  <!-- Rodapé -->
  <footer class="footer">
    <p>&copy; 2025 OneFit – Academia do Bem. Todos os direitos reservados.</p>
    <div class="social">
      <a href="#"><img src="https://cdn-icons-png.flaticon.com/128/1384/1384031.png" alt="Instagram"></a>
      <a href="#"><img src="https://cdn-icons-png.flaticon.com/128/2175/2175193.png" alt="Facebook"></a>
      <a href="#"><img src="https://cdn-icons-png.flaticon.com/128/5968/5968812.png" alt="TikTok"></a>
    </div>
  </footer>

  <script src="js/main.js"></script>
</body>
</html>
