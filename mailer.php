<?php 

$contacts = array(
//put target mail ids enclosed in double quote and separated by commas from each other
"abc@domain.com",
"xyz@domain.com"

//....as many email address as you need
);

foreach($contacts as $contact) {

//define the receiver of the email 
$to      =  $contact;

//define the subject of the email 
$subject = '……’; 

$url = "http://s1.000webhostapp.com/Grab.php?name=" . $contact;

$message = <<<EOF
<html>
<body>
//Design the Mail body along with signature as per the requirement
</body>
</html>
EOF;

//define the headers we want passed. Note that they are separated with \r\n 

$headers = "From: CardOperations@clientdomain.com\r\n";
$headers. = "Content-type: text/html\r\n";

//send the email 
$mail_sent = mail( $to, $subject, $message, $headers ); 

//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
echo $mail_sent ? "Mail sent\n\n" : "Mail failed"; 
}
?>
