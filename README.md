# Phishing-with-spoofed-mail-id

## What is Phishing Simulation?

Phishing simulation guards your business against social-engineering threats by training your employees to identify and report them. Cybercriminals use phishing, the fraudulent attempt to obtain sensitive information such as credit card details and login credentials, by disguising as a trustworthy organization or reputable person in an email communication. Phishing emails are also used to distribute malware and spyware through links or attachments that can steal information and perform other malicious tasks.

## Different Phishing Scenarios

There may be multiple scenarios for performing Phishing campaign activity in any organization. Based on the mail sending source it can be broadly categorized into two different scenarios.

**1.	Mail from Valid mail id (from valid domain)**

Case1: Sending mail from mail server of a well-known mail service provider like Gmail, Yahoo, Proton mail etc.

Case2: Sending mail from a valid mail id of another organization

**2.	Mail from a Spoofed mail id (with spoofed domain name)**

It this scenario, phishing mail can be triggered with a mail id of attacker’s choice (with any name and any domain).

<code>**In case of sending mails from a valid mail id, we can establish the campaign using open source simulation tools like GoPhish, InfosecIQ etc. and also we can sometime leverage SET Toolkit also in case of any simple content. However, currently in this chapter we will be focusing on sending mails from a spoofed mail id.**</code>

## Requirements

Basic client requirement was to send the mail to a targeted list of users from a spoofed mail id (abc@clientdomain.com) which will be exactly same with the mail id of their HR and CradOperations team along with their standard signature format and mail body should contain a link which will be redirected to organization’s landing page (https://landingpage.clientdomain.com) only upon click.
Client was also interested to get the list of users clicked the link provided over the mail.

## Setting the Context...

After collating client’s requirement I thought of some customized script rather than using any standard tool. Because no tool was fulfilling the entire set of requirements.</br></br>
Then I developed two simple php scripts:</br>
•	One is for triggering the mail to the target user ids (mailer.php)</br>
•	Second one is to capture the user id from which the user is clicking the link shared over mail and write that user id in a text file (test.php)

## Steps for Execution

In order to make the campaign successful, I have followed the below steps:</br></br>
•	I set up two separate servers (s1 & s2) in 000webhost</br>
•	Put mailer.php and test.php in s1 and one log file (UserLog.txt) in s2</br>
•	Hit http://s1.000webhostapp.com/mailer.php in browser in order to trigger the mail to the target users</br>
•	Continuously checked logfile in s2 (http://s2.000webhostapp.com/UserLog.php) in an interval of 15 mins</br>

