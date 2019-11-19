<?php
$text = "info@php-einfach.de";

$emailsuch[]="/([\s])([_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,}))/si";

$emailsuch[]="/^([_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,}))/si";
$emailreplace[]="\\1[EMAIL]\\2[/EMAIL]";
$emailreplace[]="[EMAIL]\\0[/EMAIL]";

if (strpos($text, "@")){
    $text = preg_replace($emailsuch, $emailreplace, $text);
}

//E-Mail Adressen werden zu links
$text = preg_replace("/\[EMAIL\](.*?)\[\/EMAIL\]/si", "<a href=\"mailto:\\1\">\\1</a>", $text);

$text = preg_replace("/\[EMAIL=(.*?)\](.*?)\[\/EMAIL\]/si", "<a href=\"mailto:\\1\">\\2</a>", $text);

echo $text;
?>