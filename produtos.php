<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Produtos - OneFit</title>
  <link rel="stylesheet" href="css/produtos.css" />
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
        <li><a href="index.php">Início</a></li>
        <li><a href="index.php#sobre">Sobre</a></li>
        <li><a href="index.php#servicos">Serviços</a></li>
        <li><a href="index.php#profissionais">Profissionais</a></li>
        <li><a href="plans.php" class="ativo">Planos</a></li>
        <li><a href="produtos.php">Produtos</a></li>
      </ul>
    </div>
  </header>

  <!-- Seção de Produtos -->
  <section class="produtos" id="produtos">
    <div class="container">
      <h3>Produtos OneFit</h3>
      <p class="subtitulo">Suplementos e vitaminas para potencializar seus resultados com saúde e segurança.</p>

      <!-- Barra de controle -->
      <div class="controle-produtos">
        <input type="text" id="busca" placeholder="Buscar produto..." />
        <select id="filtro">
          <option value="todos">Todos os públicos</option>
          <option value="adultos">Adultos</option>
          <option value="atletas">Atletas</option>
          <option value="adolescentes">Adolescentes</option>
          <option value="idosos">Idosos</option>
          <option value="pcd">PCD</option>
        </select>
        <button id="ordenar">Ordenar por preço ↑↓</button>
      </div>

      <!-- Tabela -->
      <div class="tabela-produtos">
        <table id="tabela">
          <thead>
            <tr>
              <th>Produto</th>
              <th>Descrição</th>
              <th>Público</th>
              <th>Preço (R$)</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Whey Protein Isolado (1kg)</td>
              <td>Suplemento proteico de alta pureza, ideal para ganho e recuperação muscular.</td>
              <td>Adultos / Atletas</td>
              <td>189,90</td>
            </tr>
            <tr>
              <td>Creatina Monohidratada (300g)</td>
              <td>Aumenta força e resistência nos treinos intensos.</td>
              <td>Adultos / Atletas</td>
              <td>129,90</td>
            </tr>
            <tr>
              <td>BCAA (120 cápsulas)</td>
              <td>Aminoácidos essenciais para evitar catabolismo e melhorar recuperação.</td>
              <td>Adultos / Adolescentes</td>
              <td>99,90</td>
            </tr>
            <tr>
              <td>Pré-Treino (250g)</td>
              <td>Estimulante para mais energia e foco durante o treino.</td>
              <td>Adultos</td>
              <td>119,90</td>
            </tr>
            <tr>
              <td>Hipercalórico (3kg)</td>
              <td>Ideal para ganho de massa muscular e reposição calórica.</td>
              <td>Adolescentes / Adultos</td>
              <td>159,90</td>
            </tr>
            <tr>
              <td>Colágeno Hidrolisado (300g)</td>
              <td>Fortalece articulações e melhora elasticidade da pele.</td>
              <td>Idosos / PCD</td>
              <td>89,90</td>
            </tr>
            <tr>
              <td>Multivitamínico OneFit (60 cápsulas)</td>
              <td>Combinação de vitaminas e minerais essenciais.</td>
              <td>Todos</td>
              <td>69,90</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>

  <!-- Rodapé -->
  <footer class="footer">
    <p>&copy; <?php echo date("Y"); ?> OneFit – Academia do Bem. Todos os direitos reservados.</p>
    <div class="social">
      <a href="#"><img src="https://cdn-icons-png.flaticon.com/128/1384/1384031.png" alt="Instagram"></a>
      <a href="#"><img src="https://cdn-icons-png.flaticon.com/128/2175/2175193.png" alt="Facebook"></a>
      <a href="#"><img src="https://cdn-icons-png.flaticon.com/128/5968/5968812.png" alt="TikTok"></a>
    </div>
  </footer>

  <script src="js/main.js"></script>
  <script src="js/produtos.js"></script>
</body>
</html>
