<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email=htmlspecialchars($_POST["email"]);
  $password=htmlspecialchars($_POST["password"]);
  $hashedPass=password_hash($password, PASSWORD_DEFAULT);

  //$conn = new mysqli("localhost", "root", "LR6?","accinfo");
  echo "email: $email \n password: $password";
 // $sql = "INSERT INTO info (email, pass) VALUES ($email, $hashedPass)";

 //if ($conn->query($sql) == TRUE) {
 //   echo "Account Created";
 // }
}
?>

