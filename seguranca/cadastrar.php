<?php

$email = $_POST['inputEmail'];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
    "secret"=> "6LefepckAAAAANZq37Sc9lurCM9ZF4_txqs1-HXC",
    "response" => $_POST["g-recaptcha-response"],
    "remoteip" => $_SERVER["REMOTE_ADDR"]
)));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$recapcha = json_decode(curl_exec($ch), true);

curl_close($ch);

if($recapcha["success"]){
    echo "OK: ". $email;
}
else{
    header("Location: exemplo1.php");
}

?>