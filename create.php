<?php
	// connection
	require './inc/database.php';
	include('file-handing.php'); 

	$defaultImage='perfil-empty.png';

	$uploadedImage = handleImageUpload($defaultImage);	// call the function

	// other inputs
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$department = $_POST['department'];
	$join_date = $_POST['join_date'];
	$work_hour = $_POST['work_hour'];


	// validate inputs
	$ok = true;
	$errors = [];
		if ($uploadedImage == null) {
			$errors[] = 'Error uploading file. File size must be below 1MB and Only acceptable <jpg, jpeg, png>';
		 	$ok = false;
		}
		if (empty($first_name)) {
			$errors[] = 'First name required';
			$ok = false;
		}
		if (empty($last_name)) {
			$errors[] = 'Last name required';
			$ok = false;
		}
		if (empty($join_date)) {
			$errors[] = 'Join date is required';
			$ok = false;
		}
		if (empty($work_hour)) {
			$errors[] = 'Working hours is required';
			$ok = false;
		}

	// decide if we are saving or not
	if(!$ok){
		echo '<script>';
			foreach ($errors as $error) {
				echo "alert('$error');";
			}
			echo 'window.history.back();';
		echo '</script>';
	}else{
		// set up the sql
		$sql = "INSERT INTO `employees`(`image`, `first_name`, `last_name`,`department`, `join_date`, `work_hour`) 
		VALUES ('$uploadedImage','$first_name','$last_name','$department','$join_date','$work_hour')";
		
		// execute SQL code
		if ($conn->query($sql) === TRUE) {
			echo "Sccessfully added new employee!";
			header("Location: dashboard.php");
			exit();
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}

		// disconnect
		$conn->close();
	} 

	?>



