<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class Mailer{
    public $toAddress;
    public $mailTemplateType;
    /* public $customerName;
    public $vendorName;
    public $estimateId;
    public $moveDate;
    public $moveFrom;
    public $moveTo;
    public $otp;
    public $verfication_Link;
    public $verfication_number;
    public $vendorId;
    public $vendorPassword; */
    public $sender_name;
    public $subject;

    #------------------------------
    public $dummy_value;
    public $orginal_value;

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
                                        $message_content = str_replace('%Vendor%', $this->vendor_name, $message_content);
                                        $this->subject = "Vendor Welcome Mail";
                                        return $message_content;
                                        break;

                case 'customerEmailVerification':
                                        $message_content = file_get_contents('../email_templates/customerEmailVerification.html');
                                        $message_content = str_replace($this->dummy_value, $this->orginal_value, $message_content);
                                        $this->subject = "Thank you for registering with Boxigo";
                                        return $message_content;
                                        break;

                case 'customerOrderConfirmation':
                                        $message_content = file_get_contents('../email_templates/customerOrderConfirmation.html');
                                        $message_content = str_replace($this->dummy_value, $this->orginal_value, $message_content);
                                        $this->subject = "Customer Order Confirmation";
                                        return $message_content;
                                        break;
                case 'followupEmail':
                                        $message_content = file_get_contents('../email_templates/followupEmail.html');
                                        $message_content = str_replace($this->dummy_value, $this->orginal_value, $message_content);
                                        $this->subject = "Welcome to Boxigo";
                                        return $message_content;
                                        break;
                case 'moveBookingConfirmation':
                                        $message_content = file_get_contents('../email_templates/moveBookingConfirmation.html');
                                        $message_content = str_replace($this->dummy_value, $this->orginal_value, $message_content);
                                        $this->subject = "Welcome to Boxigo";
                                        return $message_content;
                                        break;
                
                case 'moveDateChangeNotification':
                                            $message_content = file_get_contents('../email_templates/moveDateChangeNotification.html');
                                            $message_content = str_replace($this->dummy_value, $this->orginal_value, $message_content);
                                            $this->subject = "move Date Change Notification";
                                            return $message_content;
                                            break;

            default:
                                        break;
        }
    }
}
?>