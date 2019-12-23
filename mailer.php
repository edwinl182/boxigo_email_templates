<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Mailer{
    

// Input Parameter(inputParameterObject)
    public $toAddress;
    public $mailTemplateType;
    public $customerName;
    public $vendorName;
    public $estimateId;
    public $moveDate;
    public $moveFrom;
    public $moveTo;
    public $otp;
    public $verficationLink;
    public $vendorId;
    public $vendorPassword;

    //global declaration
    public $sender_name;
    public $subject;

    function sendMail($inputParameterObject)
    {
        // Load Composer's autoloader
        require 'vendor/autoload.php';

        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'enroloenrolo@gmail.com';                     // SMTP username
            $mail->Password   = 'enrolo@123';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = createBody($inputParameterObject);
            // Attachments
            $mail->CharSet = "utf-8";

            //Recipients
            $mail->setFrom('support@boxigo.in', 'Boxigo');
            $mail->addAddress($toAddress, $sender_name);



            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    function createBody($inputParameterObject)
    {

        // Add Switch Case for Mail Type
        switch ($this->mailTemplateType) {
            case 'welcomeMailVendor':
                $message_content = file_get_contents('boxigo_email_templates/welcomeMailVendor.html');
                //send the parameter and create the content of the mail template
                $vendor_name = 'edwin';
                $message_content = str_replace('%vendor%', $vendor_name, $message_content);
                $sender_name = "vendorName";
                $subject = "";
                return $message_content;
                break;

                //TODO:create same for other template also
            case '':
                break;
            default:
                break;
        }
    }
}
?>