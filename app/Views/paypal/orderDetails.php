<?php
if (!empty($_GET['token']) && !empty($_GET['paymentID']) && !empty($_GET['key'])) {
    $token  = $_GET['token'];
    $key    = $_GET['key']; //Comprador
    
    $clientID = "Ae3XsknBv94tS0aHMUMztNLOMfd4VY-0IPpsLNSdNBxdVp6mh2QQ4GcrLpGPzi_Q_DPov0njvj6eqIPZ";
    $secret   = "EMn5RNj9o8msTMLeM4Odu97tHoSEtR0dxPWZCU4fXwP70uqxVMKmpQ3ad5cDi-L137KA0cDze3d5_7sB";

    $login = curl_init("https://api-m.sandbox.paypal.com/v1/oauth2/token");
    curl_setopt($login, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($login, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($login, CURLOPT_USERPWD, $clientID.":".$secret);
    curl_setopt($login, CURLOPT_POSTFIELDS, "grant_type=client_credentials");
    $request_login = curl_exec($login);
    //$errl = curl_error($login);    
    //print_r($errl);
    $obj_login = json_decode($request_login);   
    $accessToken = $obj_login->access_token;

    $sale = curl_init("https://api-m.sandbox.paypal.com/v1/payments/payment/".$_GET['paymentID']);
    curl_setopt($sale, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer ".$accessToken));
    curl_setopt($sale, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($sale, CURLOPT_RETURNTRANSFER, true);
    $request_sale = curl_exec($sale);
    //$errs = curl_error($sale);    
    //print_r($errs);
    $obj_sale = json_decode($request_sale);
    $state = $obj_sale->state;

    //Update User
    if(strtoupper($state) == "APPROVED" ) {
?>
    <script type="text/javascript">
        alert("Your payment has been processed successfully.\nSu pago ha sido procesado correctamente.");
        window.location = "../eventos";
    </script>  
<?php
    }
}
else {
    ?>
    <script type="text/javascript">
        alert("Your payment has been declined.\nSu pago ha sido rechazado.");
        window.location = "../eventos";
    </script>  
<?php
}
?>