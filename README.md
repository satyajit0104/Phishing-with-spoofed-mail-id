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

