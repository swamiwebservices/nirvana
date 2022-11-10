<?php
//require_once('../libphp-phpmailer/autoload.php');

    /*
     * Enable error reporting
     */
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
 
    /*
     * Setup email addresses and change it to your own
     */
    $from = "laxmannkaande@gmail.com";
    $to = "laxmankande@gmail.com";
    $subject = "Simple test for mail function";
    $message = "This is a test to check if php mail function sends out the email";
    $headers = "From:" . $from;
 
    /*
     * Test php mail function to see if it returns "true" or "false"
     * Remember that if mail returns true does not guarantee
     * that you will also receive the email
     */
	 echo mail($to,$subject,$message, $headers);
	 
    if(mail($to,$subject,$message, $headers))
    {
        echo "Test email send.";
    }  
    else 
    {
        echo "Failed to send.";
    }


//sendMail($to, "test", "testing");

function sendMail($to, $subject, $message)
{
       
        $returnArr = array();

        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 2;
        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;
        //Username to use for SMTP authentication - use full email address for gmail
        $mail->Username ="mailsendteam007@gmail.com";
        //Password to use for SMTP authentication
        $mail->Password = "India@1947.com";
        //Set who the message is to be sent from
        $mail->setFrom('mailsendteam007@gmail.com', 'Nirvana Digital');
        //Set an alternative reply-to address
        //$mail->addReplyTo('replyto@example.com', 'First Last');
        //Set who the message is to be sent to
        //$mail->addAddress($to);
		$mail->addAddress("laxmannkaande@gmail.com");
        //Set the subject line
        $mail->Subject = $subject;


        $mail->msgHTML($message);
        $mail->AltBody = 'This is a plain-text message body';


		 @unlink("polomail.txt");
		file_put_contents("polomail.txt", $mail->send());
		@chmod("polomail.txt",0777);	
 

        if (!$mail->send()) {
                $returnArr["errCode"]=8;
                $returnArr["errMsg"]="Mail was not sent.. Something went wrong";
        } else {
                $returnArr["errCode"]=-1;
                $returnArr["errMsg"]="Mail has been sent successfully";
        }

        return $returnArr;
}

echo phpinfo();
?>