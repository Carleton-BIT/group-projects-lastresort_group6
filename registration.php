<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email=htmlspecialchars($_POST["email"]);
  $password=htmlspecialchars($_POST["password"]);
  $hashedPass=password_hash($password, PASSWORD_DEFAULT);

  $conn = new mysqli("localhost", "root", "LastResort6?","AccInfo");

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "INSERT INTO AccInfo (email, pass) VALUES ($email, $pass)";

  if ($conn->query($sql) === TRUE) {
    echo "Account Created";
  }
}
?>

