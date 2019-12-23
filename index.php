<?php
include_once  'mailer.php';
$mailer = new Mailer();
$mailer->toAddress = 'jeevanjeenu007@gmail.com';
$mailer->vendor_name = 'Jeevan'; 
$mailer->createBody;

$Type_of_mail = "welcomeMailVendor";

switch ($Type_of_mail) {
    case "welcomeMailVendor":
        
        break;
    case "":
        
        $_SESSION[$Type_of_mail] = 'blue';
        break;
    case "green":
        
        $_SESSION[$Type_of_mail] = 'green';
        break;
    default:
        echo "Your in DEFAULT!";
}
?>