<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Initialize $conn as null
    $conn = null;

    // Check if it's a POST request
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (
            isset($_POST['hospname']) && !empty($_POST['hospname']) &&
            isset($_POST['emailname']) && !empty($_POST['emailname']) &&
            isset($_POST['addname']) && !empty($_POST['addname']) &&
            isset($_POST['stockname']) && !empty($_POST['stockname']) &&
            isset($_POST['phonename']) && !empty($_POST['phonename']) &&
            isset($_POST['passname']) && !empty($_POST['passname']) &&
            isset($_POST['passcname']) && !empty($_POST['passcname'])
        ) {
            $hospname = $_POST['hospname'];
            $emailname = $_POST['emailname'];
            $addname = $_POST['addname'];
            $stockname = $_POST['stockname'];
            $phonename = $_POST['phonename'];
            $passname = $_POST['passname'];
            $passcname = $_POST['passcname'];

            // Database connection
            $conn = new mysqli('localhost', 'Lakshya1509', 'La@150903', 'hospital_registration');
            if ($conn->connect_error) {
                echo "$conn->connect_error";
                die("Connection Failed : " . $conn->connect_error);
            } else {
                $stmt = $conn->prepare("INSERT INTO all_data2(hospname, emailname, addname, stockname, phonename, passname, passcname) VALUES (?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssiss", $hospname, $emailname, $addname, $stockname, $phonename, $passname, $passcname);
                $execval = $stmt->execute();
                if ($execval) {
                    echo "Registration successfully...";
                } else {
                    echo "Error: Registration failed";
                }
                $stmt->close();
                $conn->close();
            }
        }
    }
?>
