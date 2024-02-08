<?php
	$hospname = $_POST['hospname'];
    $emailname = $_POST['emailname'];
    $addname = $_POST['addname'];
    $stockname = $_POST['stockname'];
    $phonename = $_POST['phonename'];
    $passname = $_POST['passname'];
    $passcname = $_POST['passcname'];
    
	// Database connection
	$conn = new mysqli('localhost','Lakshya1509','La@150903','hospital_registration');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("INSERT INTO All_data(hospname, emailname, addname, stockname, phonename, passname, passcname) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiss", $hospname, $emailname, $addname, $stockname, $phonename, $passname, $passcname);
        $execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
