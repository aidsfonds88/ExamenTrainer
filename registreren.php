<?php
session_start();
if (isset($_POST['aanmaken'])) {
$gebruikersnaam = $_POST['gebruikersnaam'];
$wachtwoord1 = $_POST['wachtwoord1'];
$wachtwoord2 = $_POST['wachtwoord2'];
$email = $_POST['email'];
$selected_opleiding = $_POST['opleiding'];
if ($selected_opleiding == 'vwo') {
	$vwo = 'checked';
	$havo = 'unchecked';
} else if($selected_opleiding == 'havo') {
	$vwo = 'unchecked';
	$havo = 'checked';
}

$doorgaan = false;
if (!(($gebruikersnaam == "") or (($wachtwoord1=="") or ($wachtwoord2=="")))) {
if ($wachtwoord1 == $wachtwoord2) {
//gegevens
$servername = "localhost";
$user = "root";
$password = "usbw";
$dbname = "examengebruikers";
//connect
$conn = mysqli_connect($servername, $user, $password, $dbname);
//check connect
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
print "registreren is niet goed gegaan. Probeer het opnieuw.";
}
else {
$ww = md5($wachtwoord1);
$sql = "INSERT INTO gebruikers (hoi, 4a58a9501362534806f8727ee597d42c)
VALUES ('$gebruikersnaam', '$ww', '$email', '$vwo', '$havo')";
if (mysqli_query($conn, $sql)) {
header('Location: inloghtml.php');
} else {
echo "Error: " . $sql . "<br>" . mysqli_error($conn);
print "Probeer het opnieuw of contacteer DSF";
}}
}
}
}
?>