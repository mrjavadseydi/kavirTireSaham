<?php

use App\Models\Account as Account;

if (!function_exists('randomAlpha')) {
    function randomAlpha()
    {
        $str = "ضصثقفعهخحجچگکمنتالبیسشظطزرذدپ";
        $array = mb_str_split($str);
        $str = '';
        for ($i = 0; $i < 3; $i++) {
            $str .= $array[rand(0, count($array) - 1)];
        }
        return $str;
    }
}
if (!function_exists('randomName')) {
    function randomName()
    {
        $person = Account::inRandomOrder()->first();
        return $person->first_name . " " . $person->last_name;
    }
}
if (!function_exists('randomFatherName')) {

    function randomFatherName()
    {
        $person = Account::inRandomOrder()->first();
        return $person->father_name;
    }

}
if (!function_exists('generateAuthenticationEnvelope')) {

    function generateAuthenticationEnvelope($pub_key, $terminalID, $password, $amount)
    {
        $data = $terminalID . $password . str_pad($amount, 12, '0', STR_PAD_LEFT) . '00';
        $data = hex2bin($data);
        $AESSecretKey = openssl_random_pseudo_bytes(16);
        $ivlen = openssl_cipher_iv_length($cipher = "AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($data, $cipher, $AESSecretKey, $options = OPENSSL_RAW_DATA, $iv);
        $hmac = hash('sha256', $ciphertext_raw, true);
        $crypttext = '';
        openssl_public_encrypt($AESSecretKey . $hmac, $crypttext, $pub_key);
        return array(
            "data" => bin2hex($crypttext),
            "iv" => bin2hex($iv),
        );
    }
}

if (!function_exists('getIranKishToken')) {
    function getIranKishToken($Amount,$orderId,$factor_number)
    {
        $pubKey = config('IranKish.public_key');
        $terminalID = config('IranKish.terminalId');
        $password = config('IranKish.password');
        $acceptorId = config('IranKish.acceptor');
        $token =generateAuthenticationEnvelope($pubKey, $terminalID, $password, $Amount);
        $data =[];
        $data["request"] = array(
            "acceptorId" => $acceptorId,
            "amount" => (int)$Amount,
            "requestId" => $factor_number,
            "paymentId" => (string)$orderId,
            "requestTimestamp" => time(),
            "revertUri" => config('IranKish.callback'),
            "terminalId" => $terminalID,
            "transactionType" => "Purchase",
            "billInfo"=>null,

        );
        $data['authenticationEnvelope'] = $token;
        $data_string = json_encode($data);
        $ch = curl_init('https://ikc.shaparak.ir/api/v3/tokenization/make');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));

        $result = curl_exec($ch);

        return json_decode($result, JSON_OBJECT_AS_ARRAY);


    }
}

if(!function_exists('verifyPayment')){
    function verifyPayment($verifySaleReferenceId,$systemTraceAuditNumber,$token){
        $terminalID = config('IranKish.terminalId');
        $data = array(
            "terminalId" => $terminalID,
            "retrievalReferenceNumber" => $verifySaleReferenceId,
            "systemTraceAuditNumber" => $systemTraceAuditNumber,
            "tokenIdentity" => $token,
        );
        $data_string = json_encode($data);
        $ch = curl_init('https://ikc.shaparak.ir/api/v3/confirmation/purchase');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string)
        ));
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, JSON_OBJECT_AS_ARRAY);
    }
}
