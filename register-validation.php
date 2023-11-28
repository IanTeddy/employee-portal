<?php
	// connection
	require './inc/database.php';
	// variables
	$isadmin = $_POST['isadmin'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm = $_POST['confirm'];
	$role = $_POST['role'];

	// validate inputs
	$ok = true;
		if (empty($first_name)) {
			echo '<p>First name required</p>';
			$ok = false;
		}
		if (empty($last_name)) {
			echo '<p>Last name required</p>';
			$ok = false;
		}
		if (empty($username)) {
			echo '<p>Username required</p>';
			$ok = false;
		}
		if ((empty($password)) || ($password != $confirm)) {
			echo '<p>Invalid passwords</p>';
			$ok = false;
		}
		if(empty($role)){
			echo '<p> Select Manager or Team </p>';
			$ok = false;
		}

	// decide if we are saving or not
	if ($ok){
		$password = hash('sha512', $password);
		// set up the sql
		$sql = "INSERT INTO users (isadmin, first_name, last_name, username, password, role) VALUES ('$isadmin','$first_name', '$last_name', '$username', '$password', '$role')";
		if ($conn->query($sql) === TRUE) {
			echo '<section class="success-row">';
			echo '<div>';
			echo '<h3>Registration successful</h3>';
			echo '</div>';
			echo '</section>';
			sleep(3);
			header("location: /portal/index.html");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
    	
		//disconnect
		$conn->close();
	}
	?>
	<section class="row success-back-row">
		<div>
			<p>All setup, click the button below to head to the login in page!</p>
			<a href="index.html" class="btn btn-primary">Go to Login In</a>
		</div>
	</section>

