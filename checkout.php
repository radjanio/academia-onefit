<?php
// checkout.php
// copia o mesmo array de planos (ou carregue de um include/config)
$plans = [
  'start' => ['id'=>'start','title'=>'OneFit Start','price'=>99.00],
  'power' => ['id'=>'power','title'=>'OneFit Power','price'=>139.00],
  'master'=> ['id'=>'master','title'=>'OneFit Master','price'=>109.00],
  // ... outros
];

// pega o plano solicitado
$planId = isset($_GET['plan']) ? $_GET['plan'] : null;
if (!$planId || !isset($plans[$planId])) {
  // redireciona para planos caso inválido
  header("Location: plans.php");
  exit;
}
$plan = $plans[$planId];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Checkout - <?php echo htmlspecialchars($plan['title']); ?></title>
  <link rel="stylesheet" href="css/checkout.css" />
</head>
<body>
  <header class="header">
    <div class="container">
      <h1>Finalizar Assinatura</h1>
    </div>
  </header>

  <main class="container">
    <section class="checkout-box">
      <h2><?php echo htmlspecialchars($plan['title']); ?></h2>
      <p>Valor: <strong>R$ <?php echo number_format($plan['price'],2,',','.'); ?> / mês</strong></p>

      <form id="checkout-form">
        <input type="hidden" name="plan_id" value="<?php echo htmlspecialchars($plan['id']); ?>">

        <label>Nome completo
          <input type="text" name="name" required>
        </label>

        <label>E-mail
          <input type="email" name="email" required>
        </label>

        <label>Método de pagamento
          <select name="payment_method" id="payment_method" required>
            <option value="mercadopago_pix">Pix (Mercado Pago)</option>
            <option value="mercadopago_card">Cartão (Mercado Pago)</option>
            <!-- caso queira adicionar PayPal/Stripe, acrescentar opções -->
          </select>
        </label>

        <div id="card-fields" style="display:none;">
          <!-- NOTA: para cartão, ideal usar tokenização/SDK na produção -->
          <label>Número do cartão<input type="text" name="card_number" placeholder="0000 0000 0000 0000"></label>
          <label>MM/AA<input type="text" name="card_exp" placeholder="MM/AA"></label>
          <label>CVV<input type="text" name="card_cvv" placeholder="123"></label>
        </div>

        <button type="submit" id="pay-btn">Pagar</button>
      </form>

      <div id="payment-result" style="margin-top:16px;"></div>
    </section>
  </main>

  <script>
  // JS mínimo para envio ao backend e tratar resposta
  const form = document.getElementById('checkout-form');
  const paymentMethod = document.getElementById('payment_method');
  const cardFields = document.getElementById('card-fields');
  const result = document.getElementById('payment-result');

  paymentMethod.addEventListener('change', () => {
    cardFields.style.display = paymentMethod.value === 'mercadopago_card' ? 'block' : 'none';
  });

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    result.innerHTML = 'Aguarde...';

    const formData = new FormData(form);
    const resp = await fetch('create_payment.php', {
      method: 'POST',
      body: formData
    });

    if (!resp.ok) {
      result.innerHTML = 'Erro no servidor.';
      return;
    }
    const data = await resp.json();

    if (data.error) {
      result.innerHTML = '<b>Erro:</b> ' + data.error;
      return;
    }

    // 1) Se retornar init_point -> redirecionar (Mercado Pago checkout)
    if (data.init_point) {
      // Preferência criada: redireciona para checkout do Mercado Pago (cartão/pix)
      window.location.href = data.init_point;
      return;
    }

    // 2) Se retornar qr_code (pix) -> mostrar QR e instruções
    if (data.qr_code) {
      result.innerHTML = '<p>Pagamento via PIX gerado. Escaneie o QR ou copie o código:</p>' +
                         '<div><img src="' + data.qr_image + '" alt="QR Code"></div>' +
                         '<pre style="background:#f5f5f5;padding:8px;">' + data.qr_code + '</pre>';
      return;
    }

    // fallback
    result.innerHTML = 'Recebido: ' + JSON.stringify(data);
  });
  </script>
</body>
</html>
