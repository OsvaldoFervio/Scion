<?php
define ('ProPayPal', 0); //Producción - 1 , Pruebas - 0

if(ProPayPal)
{
    define("PayPalClientId", "*********************");
    define("PayPalSecret", "*********************");
    define("PayPalBaseUrl", "https://api.paypal.com/v1/");
    define("PayPalENV", "production");
} 
else {
    define("PayPalClientId", "Ae3XsknBv94tS0aHMUMztNLOMfd4VY-0IPpsLNSdNBxdVp6mh2QQ4GcrLpGPzi_Q_DPov0njvj6eqIPZ");
    define("PayPalSecret", "EMn5RNj9o8msTMLeM4Odu97tHoSEtR0dxPWZCU4fXwP70uqxVMKmpQ3ad5cDi-L137KA0cDze3d5_7sB");
    define("PayPalBaseUrl", "https://api.sandbox.paypal.com/v1/");
    define("PayPalENV", "sandbox");
}

?>