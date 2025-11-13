<?php
// webhook.php
// Configure na sua conta Mercado Pago a URL deste arquivo para receber notificações.
// Não esqueça de validar a origem (ex: token secreto, IPs, ou usando a API do MP para checar)
$input = file_get_contents('php://input');
file_put_contents(__DIR__.'/mp_webhook_log.txt', date('c') . " - " . $input . PHP_EOL, FILE_APPEND);

// Retornar 200
http_response_code(200);
echo 'OK';
