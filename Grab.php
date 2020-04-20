<?php
header ('Location: https://landingpage.clientdomain.com');
$myfile = fopen("UserLog.txt", "a");
$content = $_GET["name"] . PHP_EOL;
fwrite($myfile, $content);
fclose($myfile);
echo 'User Clicked: ' . htmlspecialchars($_GET["name"]);
?>
