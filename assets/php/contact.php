<?php
    header('Content-Type: application/json');

    $to = "phuocthanhngurentran@gmail.com";
    $subject = $_POST['subject'];
    $message = "From, ".$_POST['name']."\n\n"."Email, ".$_POST['email']."\n\n".$_POST['message'];
    $messageheader = "From, ".$_POST['email'];
    $headers = 'From: '.$_POST['email']."\r\n".			 
			'Reply-To: '.$_POST['email']."\r\n" .			 
			'X-Mailer: PHP/' . phpversion();

    //$responseArray = array('class' => 'alert alert-success', 'message' => 'first');
    ini_set("SMTP","ssl://smtp.gmail.com");
    ini_set("smtp_port","465");
    ini_set("sendmail_from", $_POST['email']);
    ini_set("sendmail_path", "C:\wamp\bin\sendmail.exe -t");
    
    if (mail($to, $subject, $message, $headers)){
        $responseArray = array('class' => 'alert alert-success', 'message' => 'Message sent successfully. Thank you, will get back to you soon!');
    }else{
        $responseArray = array('class' => 'alert alert-danger', 'message' => 'There was an error while submitting the form. Please try again later.');
    }

    $encoded = json_encode($responseArray);

    echo $encoded;

 ?>