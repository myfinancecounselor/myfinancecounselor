<?php 
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $subject = $_POST["subject"];

    if($name == '' or $phone == '' or $email == '' or $message == '' or $subject == ''){
        header('location:index?error');
        exit();
    }
 
    $ToEmail = 'contact@myfinancecounselor.com';
    $EmailSubject = $subject; 
    $mailheader = "From: ".$_POST["email"]."\r\n"; 
    $mailheader .= "Reply-To: ".$_POST["email"]."\r\n"; 
    $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	
	
	
    $MESSAGE_BODY = '';
    $MESSAGE_BODY .= "Client Name: ".$name."<br>"; 
    $MESSAGE_BODY .= "Email: ".$email."<br>"; 
    $MESSAGE_BODY .= "Message: ".nl2br($message)."<br>"; 
    
    mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure"); 

    header('location:index?name='.$name.'');
}
?> 