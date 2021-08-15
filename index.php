<!DOCTYPE html>
<html>
<head>
<style>
    
    #heading{
        text-align:center;
    }
    
body{
    background-color:aqua;
}
    
</style>
</head>
<body>

<form action="#" method="post">
    <textarea placeholder="Type a test message" cols="100" rows="10" id="feedback" name="msg"></textarea>
    <input type="submit" value="submit" name="submit"><br>   
</form> 
</body>
</html>
    <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;    
require 'vendor/autoload.php';

if (isset($_POST['submit'])){
    if(isset($_POST['msg'])){
        $email = "solalpont@gmail.com";
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->SMTPDebug = false;//SMTP::DEBUG_SERVER;                   // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'youremail@gmail.com';                     // SMTP username
            $mail->Password   = 'yourpassword';                               // SMTP password
            $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                          // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
            //Recipients
            $mail->setFrom('youremail@gmail.com', 'Test');
            $mail->addAddress($email);     // Add a recipient
    
            $body = $_POST['msg'];
    
            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Test | Test';
            $mail->Body    = $body;
            $mail->AltBody = strip_tags($body);

            if ($mail->send()){
                echo"Yay";
            }
            else{
                echo"Nay";
            }
        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {
                $mail->ErrorInfo
            }";
            }
    }
     
}
    
?>







