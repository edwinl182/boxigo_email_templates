<?php

include_once  'mailer.php';

$mailer = new Mailer();
$mailer->toAddress = 'jeevanjeenu007@gmail.com';

/* ---------------------------------  welcome Mail Vendor    ----------------------------------------------- */

/* 
$mailer->vendor_name = 'Jeevan'; 
$mailer->mailTemplateType = 'welcomeMailVendor';
 */

 /* ----------------------------   welcomeMailVendor END    ------------------------------------------------ */


/* -----------------------------  customerEmailVerification  ----------------------------------------------- */

/* 
$mailer ->dummy_value = array('%customerName%','%verification_Link%','%verification_number%');
$mailer->orginal_value = array('Jeevan','http://boxigo.in/','99887766');
$mailer->mailTemplateType = 'customerEmailVerification';
 */

/* --------------------------  customerEmailVerification END   --------------------------------------------- */

/* ---------------------------------  customer Order Confirmation    --------------------------------------- */

/*  
$mailer ->dummy_value = array('%Customer_name%','%Order_id%','%Source%','%Destination%','%Date%','%Order_placed%');
$mailer->orginal_value = array('Jeevan','12345678','Chennai','mysore','16/16/2016','20/20/2020');
$mailer->mailTemplateType = 'customerOrderConfirmation';
 */

/* ---------------------------------  customer Order Confirmation  end  ------------------------------------ */

/* ---------------------------------  followupEmail   ------------------------------------------------------ */

/* 
$mailer ->dummy_value = array('%Customer_name%');
$mailer->orginal_value = array('Jeevan');
$mailer->mailTemplateType = 'followupEmail'; 
*/

/* ---------------------------------  followupEmail End  --------------------------------------------------- */

/* ---------------------------------  move Booking Confirmation   ------------------------------------------ */
/* 
$mailer ->dummy_value = array('%Vendor%','%enquiry number%');
$mailer->orginal_value = array('Jeevan','eq123');
$mailer->mailTemplateType = 'moveBookingConfirmation'; 
 */

/* ---------------------------------  move Booking Confirmation End   -------------------------------------- */

/* --------------------------------- move Date Change Notification    -------------------------------------- */
/* 
$mailer ->dummy_value = array('%Vendor%','%Order_id%','%from%','%to%');
$mailer->orginal_value = array('Jeevan','eq123','16/16/2016','20/20/2020');
$mailer->mailTemplateType = 'moveDateChangeNotification';
 */
/* ---------------------------------  move Date Change Notification End   -------------------------------------- */

$mailer->sendMail();

?>