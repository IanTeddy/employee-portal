<?php
	//access the existing session created automatically by the server
	session_start();
	//connect to db
	require 'inc/database.php';

	//store the user inputs in variables and hash the password
	$username = $_POST['username'];
	$password = hash('sha512', $_POST['password']);

	
	//set up and run the query
	$sql = "SELECT manager_id, isadmin FROM users WHERE username = '$username' AND password = '$password'";
	$result = $conn->query($sql);

	// store the number of results in a variable
    $count = $result->num_rows;

	//check if any matches found
	if ($count == 1){
		echo 'Logged in Successfully.';
		while ($row = $result->fetch_assoc()) {
			//take the user's id from the database and store it in a session variable
			$_SESSION['manager_id'] = $row['manager_id'];
			// check if the user is admin
			$_SESSION['isadmin'] = $row['isadmin'];
			
			header("Location: dashboard.php");
			exit();
			
		} 
	}
	else {
		echo '<script>';
		echo 'alert("Incorrect username or password");';
		echo 'window.history.back();';
		echo '</script>';
	}

	//disconnect
	$conn->close();
?>
