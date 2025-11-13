<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

// ======= CONFIGURE SEU TOKEN AQUI =======
$MP_ACCESS_TOKEN = 'APP_USR-3634808131933352-111312-9cf346f21a917ef7c55ac5ae4a5df913-2988185200'; // seu token de teste aqui

// ======= PEGAR DADOS DO FORM =======
$planId = $_POST['plan_id'] ?? null;
$name = $_POST['name'] ?? 'Cliente';
$email = $_POST['email'] ?? 'no-reply@example.com';

// ======= PLANOS DISPONÍVEIS =======
$plans = [
  'start' => ['title' => 'OneFit Start', 'price' => 99.00],
  'power' => ['title' => 'OneFit Power', 'price' => 139.00],
  'master' => ['title' => 'OneFit Master', 'price' => 109.00],
];

if (!$planId || !isset($plans[$planId])) {
  echo json_encode(['error' => 'Plano inválido']);
  exit;
}

$plan = $plans[$planId];

// ======= CORPO DA REQUISIÇÃO =======
$body = [
  'items' => [[
    'title' => $plan['title'],
    'quantity' => 1,
    'currency_id' => 'BRL',
    'unit_price' => (float)$plan['price']
  ]],
  'payer' => [
    'name' => $name,
    'email' => $email
  ],
  'back_urls' => [
    'success' => 'http://localhost/onefit/success.php',
    'failure' => 'http://localhost/onefit/failure.php',
    'pending' => 'http://localhost/onefit/pending.php'
  ],
  'auto_return' => 'approved'
];

// ======= REQUISIÇÃO CURL =======
$ch = curl_init();
curl_setopt_array($ch, [
  CURLOPT_URL => "https://api.mercadopago.com/checkout/preferences",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode($body, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
  CURLOPT_HTTPHEADER => [
    "Authorization: Bearer $MP_ACCESS_TOKEN",
    "Content-Type: application/json"
  ],
  CURLOPT_SSL_VERIFYPEER => false // importante para localhost
]);

$response = curl_exec($ch);
$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

// ======= TRATAR RESPOSTA =======
if ($httpcode !== 201 && $httpcode !== 200) {
  header('Content-Type: text/plain; charset=utf-8');
  echo "Erro HTTP $httpcode\n\nResposta da API:\n$response";
  exit;
}


$data = json_decode($response, true);
$init = $data['init_point'] ?? $data['sandbox_init_point'] ?? null;

echo json_encode(['init_point' => $init, 'raw' => $data]);
