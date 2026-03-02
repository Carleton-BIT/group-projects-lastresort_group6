<?php
$email=htmlspecialchars($_POST["email"]);
$password=htmlspecialchars($_POST["password"]);

$conn = new mysqli("DelfinZ", "root", "LastResort6?","AccInfo");

$sql = "INSERT INTO AccInfo (email, pass) VALUES ($email, $pass)";
?>

