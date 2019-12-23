<?php

include_once  'mailer.php';

$mailer = new Mailer();
$mailer->toAddress = 'edwinl182@gmail.com';
$mailer->sender_name = 'Edwin';
$mailer->vendor_name = 'Jeevan'; 
$mailer->mailTemplateType = 'welcomeMailVendor';

$mailer->sendMail();

?>