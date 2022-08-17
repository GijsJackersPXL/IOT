<?php

$naam = $_POST["username"];
$wachtwoord = $_POST["password"];

if($naam == "Gijs" && $wachtwoord == "admin")
{
	header("Location: HandmatigIngeven.html");
	exit();
}
else
{
	echo "Error, Naam of wachtwoord is niet correct";
    exit();
}

exit();
?>