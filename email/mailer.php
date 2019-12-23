<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Mailer{
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
    public $sender_name;
    public $subject;

    function sendMail(){

        require '../third_party/autoload.php';
        $mail = new PHPMailer(true);

        try {
            //Server settings
           // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'enroloenrolo@gmail.com';                     // SMTP username
            $mail->Password   = 'enrolo@123';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Body    = $this->createBody($this->mailTemplateType);
            $mail->Subject = $this->subject;

            // Attachments
            $mail->CharSet = "utf-8";

            //Recipients
            $mail->setFrom('support@boxigo.in', 'Boxigo');
            $mail->addAddress($this->toAddress, $this->sender_name);
            $mail->send();

            http_response_code(200);
            echo json_encode( array("meta" => array( "code" => 200, "status"=>"OK", "DetailedMessage"=> "Message has been sent"),));

        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode( array("meta" => array( "code" => 500, "status"=>"failed", "DetailedMessage"=> $mail->ErrorInfo),));
        }
    }

    function createBody($mailTemplateType){
        switch ($this->mailTemplateType) {
            case 'welcomeMailVendor':
                                        $message_content = file_get_contents('../email_templates/welcomeMailVendor.html');
                                        $message_content = str_replace('%vendor%', $this->vendor_name, $message_content);
                                        $this->subject = "Vendor Welcome Mail";
                                        return $message_content;
                                        break;

                case 'welcomeCustomer':
                                        $message_content = file_get_contents('../email_templates/welcomeMailVendor.html');
                                        $message_content = str_replace('%vendor%', $vendor_name, $message_content);
                                        $this->subject = "Vendor Welcome Mail";
                                        return $message_content;
                                        break;
            default:
                                        break;
        }
    }
}
?>