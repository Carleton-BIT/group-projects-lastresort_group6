<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email=htmlspecialchars($_POST["email"]);
    $password=htmlspecialchars($_POST["password"]);

    $conn = new mysqli("localhost", "root", "LR6?","accinfo");

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $check= $conn->prepare("SELECT pass FROM info WHERE email=?");
    $check-> bind_param("s",$email);
    $check->execute();
    $check->store_result();
    if ($check->num_rows()>0) {
        $check->bind_result($dbPass);
        $check->fetch();
        if (password_verify($password,$dbPass)){
            header("Location: check.html");
        }
        else {
            header("Location: login.html");
        }
    }
    else{
        echo "Email not found";
    }
    $check->close();
    $conn->close();
}
?>