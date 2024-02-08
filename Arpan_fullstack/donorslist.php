<?php
    error_reporting(0);
    include("connect.php");

    // Check if $conn is not null before using it
    if ($conn !== null) {
        $query = "SELECT * FROM all_data2";
        $data = mysqli_query($conn, $query);
        $total = mysqli_num_rows($data);
        $result = mysqli_fetch_assoc($data);

        echo $result['hospname'] . ', ' . $result['emailname'] . ', ' . $result['addname'] . ', ' . $result['stockname'] . ', ' . $result['phonename'] . ', ' . $result['passname'] . ', ' . $result['passcname'];

        if ($total != 0) {
            echo "Table has records";
        } else {
            echo "No records found";
        }
    } else {
        echo "Connection failed. Please check your database connection.";
    }
?>
