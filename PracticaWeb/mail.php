<?
$from = “From: You <you@yourdomain.com>”;
$to = “you@yourdomain.com”;
$subject = “Hi! “;
$body = “TEST”;

if(mail($to,$subject,$body,$from))
echo “MAIL – OK”;
else
echo “MAIL FAILED”;
?>