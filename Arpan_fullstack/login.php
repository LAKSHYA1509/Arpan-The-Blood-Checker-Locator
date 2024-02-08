<?php
session_start();

if(isset($_POST['emailname']) && isset($_POST['passname'])) {
    $emailname = $_POST['emailname'];
    $passname = $_POST['passname'];

    // Database connection
    $conn = new mysqli('localhost', 'Lakshya1509', 'La@150903', 'donor_db');
    if ($conn->connect_error) {
        echo "$conn->connect_error";
        die("Connection Failed : " . $conn->connect_error);
    } else {
        $stmt = $conn->prepare("SELECT * FROM All_data WHERE emailname = ?");
        $stmt->bind_param("s", $emailname);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($passname, $user['passname'])) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['emailname'];

            // Redirect to the page where you want to display the welcome popup
            header("Location: welcome.php");
            exit();
        } else {
            // Invalid credentials, redirect back to the login page with an error message
            header("Location: login.html?error=1");
            exit();
        }

        $stmt->close();
        $conn->close();
    }
} else {
    // Invalid request, redirect to the login page
    header("Location: login.html");
    exit();
}
?>
