<?php
$curl = curl_init();
 
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_URL, 'https://api-3t.sandbox.paypal.com/nvp');
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array(
    'USER' => 'usuario_da_api',
    'PWD' => '123412432134',
    'SIGNATURE' => 'assinatura.da.api',
 
    'METHOD' => 'UpdateRecurringPaymentsProfile',
    'VERSION' => '108',
    'PROFILEID' => 'I-FYYMDB55ADSH',
 
    'NOTE' => 'Uma nota opcional, explicando o motivo da mudança',
    'AMT' => 120,
    'CURRENCYCODE' => 'BRL'
)));
 
$response =    curl_exec($curl);
 
curl_close($curl);
 
$nvp = array();
 
if (preg_match_all('/(?<name>[^\=]+)\=(?<value>[^&]+)&?/', $response, $matches)) {
    foreach ($matches['name'] as $offset => $name) {
        $nvp[$name] = urldecode($matches['value'][$offset]);
    }
}
 
print_r($nvp);
