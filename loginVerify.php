<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email=htmlspecialchars($_POST["email"]);
    $password=htmlspecialchars($_POST["password"]);

    $conn = new mysqli("localhost", "root", "LastResort6?","AccInfo");

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
            /*session_start();
            $_SESSION["email"] = $email;
            header("Location: homepage.html");
            die(); */
            echo "Correct Password";
        }
        else {
            echo "Incorrect Password";
        }
    }
    else{
        echo "Email not found";
    }
    $check->close();
    $conn->close();
}
?>