<?php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	
	
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		if (
			isset($_POST['name']) && !empty($_POST['name']) &&
			isset($_POST['bloodtype']) && !empty($_POST['bloodtype']) &&
			isset($_POST['address']) && !empty($_POST['address']) &&
			isset($_POST['phoneNumber']) && !empty($_POST['phoneNumber'])
		) {
			$name = $_POST['name'];
			$bloodtype = $_POST['bloodtype'];
			$address = $_POST['address'];
			$phoneNumber = $_POST['phoneNumber'];

			// Database connection
			$conn = new mysqli('localhost', 'Lakshya1509', 'La@150903', 'hospital_registration');
			if ($conn->connect_error) {
				echo "$conn->connect_error";
				die("Connection Failed : " . $conn->connect_error);
			} else {
				$stmt = $conn->prepare("INSERT INTO request_data(name, bloodtype, address, phoneNumber) VALUES (?, ?, ?, ?)");
				$stmt->bind_param("ssss", $name, $bloodtype, $address, $phoneNumber);
				$execval = $stmt->execute();
				if ($execval) {
					echo "Registration successfully... ";
				} else {
					echo "Error: Registration failed";
				}
				$stmt->close();
				$conn->close();
			}
		}
	}
?>
