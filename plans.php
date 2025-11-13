<?php
// plans.php
$plans = [
  'start' => [
    'id'=>'start','title'=>'OneFit Start','age'=>'Adolescentes (13–17 anos)',
    'price'=>99.00,'details'=>'R$ 270 trimestral • R$ 960 anual',
    'description'=>['Acesso total à musculação e aulas em grupo','Orientação com instrutor de sala','Treino personalizado trimestral','Avaliação física semestral','10% de desconto em suplementos']
  ],
  'power' => [
    'id'=>'power','title'=>'OneFit Power','age'=>'Adultos (18–59 anos)',
    'price'=>139.00,'details'=>'R$ 390 trimestral • R$ 1.380 anual',
    'description'=>['Acesso completo à academia','Musculação + CrossFit básico + artes marciais','Avaliação física bimestral','Orientação de treino com personal de sala','15% de desconto em suplementos']
  ],
  'master' => [
    'id'=>'master','title'=>'OneFit Master','age'=>'Idosos (60+ anos)',
    'price'=>109.00,'details'=>'R$ 300 trimestral • R$ 1.080 anual',
    'description'=>['Treinos adaptados para mobilidade e equilíbrio','Acompanhamento fisioterápico mensal','Aulas de alongamento e funcional leve','Avaliação postural trimestral','20% de desconto em suplementos']
  ],
  // ... adicione os demais planos conforme necessário
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Planos OneFit - Academia do Bem</title>
  <link rel="stylesheet" href="css/planos.css"/>
</head>
<body>
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
          <li><a href="produtos.php">Produtos</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <section class="planos" id="planos">
    <h2>Planos OneFit</h2>
    <p class="subtitulo">Escolha o plano que mais combina com você</p>

    <div class="grid-planos">
      <?php foreach($plans as $plan): ?>
        <div class="plano-card <?php echo ($plan['id']=='power') ? 'destaque' : ''; ?>">
          <h4><?php echo htmlspecialchars($plan['title']); ?></h4>
          <p class="etaria"><?php echo htmlspecialchars($plan['age']); ?></p>
          <p class="preco">R$ <?php echo number_format($plan['price'],2,',','.'); ?> / mês</p>
          <p class="detalhes"><?php echo htmlspecialchars($plan['details']); ?></p>
          <ul>
            <?php foreach($plan['description'] as $li): ?>
              <li><?php echo htmlspecialchars($li); ?></li>
            <?php endforeach; ?>
          </ul>
          <!-- botão dinâmico: passa id do plano por GET -->
          <a href="checkout.php?plan=<?php echo urlencode($plan['id']); ?>" class="btn-plano">Assinar Agora</a>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <footer class="footer">
    <p>&copy; <?php echo date("Y"); ?> OneFit – Academia do Bem. Todos os direitos reservados.</p>
  </footer>
</body>
</html>
