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

  <?php
/*****This first method of PHP did not work for me so I took your advice Solal and tried installing PHPMailer instead


if (isset($_POST['submit'])){
    $to = "goanswerowen@gmail.com";
    $subject = "4thtest";
    $testmsg = $_POST['msg'];
  mail($to,$subject,$testmsg);
   
}
 *********/
  ?>

<form action="index.php" method="post">
<textarea placeholder="Type a test message" cols="100" rows="10" id="feedback" name="msg"></textarea>
    <input type="submit" value="submit" name="submit"><br>   
    </form> 
     <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;    
    require 'C:\xampp\composer\vendor\autoload.php';    
    if (isset($_POST['submit'])){
        $mail = new PHPMailer(true); 
        try {
            $mail->SMTPDebug = false;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'myself@gmail.com';
            $mail->Password = 'mypassword';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
        $mail->setFrom('goanswerowen@gmail.com','myself');
        $mail->addAddress('1888goanswerowen@gmail.com','recipient');
        $mail->Subject = 'Test';
        $mail->Body = 'This is the body of the e-mail';
        $mail->send();
            }
        catch (Exception $e)
        {
            echo $e->errorMessage();
        }
        catch (\Exception $e)
        {
            echo $e->getMessage();
        }
     }
    ?>
    </body>

</html>







