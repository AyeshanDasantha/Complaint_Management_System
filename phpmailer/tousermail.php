<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = 1;                      // Enable verbose debug output
    require 'smtpconfig.php';
        $toqry=mysqli_query($con,"SELECT replyEmail FROM emailsetting");
        while($row=mysqli_fetch_array($toqry)) 
        {
            $tomail = $row['replyEmail'];
            $mail->addAddress($tomail);     // Add a recipient



            $bccqry=mysqli_query($con,"SELECT userEmail FROM users where usertype is null and status=1");
            while($row=mysqli_fetch_array($bccqry)) 
            {
                $mail->addBCC($row['userEmail']);
            }
                $listqry=mysqli_query($con,"SELECT subject,body FROM maillist WHERE id=( SELECT max(id) FROM maillist )");
                while($row=mysqli_fetch_array($listqry)) 
                {
                    $mailsubject = $row['subject'];
                    $mailbody = $row['body'];
                    $body=$mailbody;
                    // Content
                    $mail->isHTML(true);                                  // Set email format to HTML
                    $mail->Subject = $mailsubject;
                    $mail->Body    = $body;
                    $mail->AltBody = strip_tags($body);

                    $mail->send();
                    $successmsg="Send Email To Users !!";

                }
            
        }
} catch (Exception $e) {
    $errormsg="Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}