<?php
// success.php
// Mercado Pago redireciona com parâmetros ?collection_id=... etc
$collection_id = $_GET['collection_id'] ?? null;
$status = $_GET['status'] ?? null;
?>
<!doctype html>
<html><head><meta charset="utf-8"><title>Pagamento Aprovado</title></head><body>
  <h1>Pagamento Aprovado</h1>
  <p>Obrigado! Seu pagamento foi processado.</p>
  <p><strong>collection_id:</strong> <?php echo htmlspecialchars($collection_id); ?></p>
  <p><strong>status:</strong> <?php echo htmlspecialchars($status); ?></p>
  <a href="index.php">Voltar ao site</a>
</body></html>
