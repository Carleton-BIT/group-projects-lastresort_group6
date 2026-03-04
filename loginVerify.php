<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email=htmlspecialchars($_POST["email"]);
    $password=htmlspecialchars($_POST["password"]);

    $conn = new mysqli("localhost", "root", "LastResort6?","AccInfo");

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    if ($conn->query($sql) === TRUE) {
        $check= "SELECT pass FROM accinfo WHERE email = $email";
        $check->store_result();
        if ($check->num_rows>0){
            $check->bind_result($dbPass);
            $check->fetch();
            if (password_verify($password,$dbPass)){
                echo "Login Successful";
                exit();
            }
            else (){
                echo "Incorrect password";
            }
        }
    }
    else{
        echo "Email not found";
    }
}
?>