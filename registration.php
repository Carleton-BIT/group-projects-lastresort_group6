<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email=htmlspecialchars($_POST["email"]);
  $password=htmlspecialchars($_POST["password"]);
  $hashedPass=password_hash($password, PASSWORD_DEFAULT);

 $conn = new mysqli("localhost", "root", "LR6?","accinfo");
 echo "email: $email password: $password";

 $sql = $conn->prepare("INSERT INTO info (email, pass) VALUES (?,?)");

 $sql -> bind_param("ss",$email,$hashedPass);

 if ($sql->execute()) {
    echo "Account Created";
 }
 mysqli_close($conn);
}
?>

