<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conn = new mysqli("localhost", "root", "LR6?","reservation");

    $email = $_POST['email'];
    $date = $_POST['date'];
    $startT = $_POST['time'];
    $endT = strtotime($start_date) + 3600;

    $check= $conn->prepare("SELECT email FROM registration WHERE email=?");
    $check-> bind_param("s",$email);
    $check->execute();
    $check->store_result();
    if ($check->num_rows()<=2) {
        $stmt = $db->prepare("INSERT INTO events (email, date, startT, endT) VALUES (?, ?, ?)");
        $stmt->execute([$email, $date, $startT, $endT]);
        echo "Session scheduled successfully!";
    }
    else {
        echo "Daily schedule limit reached!"
    }
}
?>