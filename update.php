<?php
include('./inc/database.php');
include('file-handing.php'); 


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["employee_id"])) {
    $currentImg = $_POST["current_image"];
    $uploadedImage = handleImageUpload($currentImg);
    
    $employee_id = $_POST["employee_id"];
    $first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$department = $_POST['department'];
	$join_date = $_POST['join_date'];
	$work_hour = $_POST['work_hour'];

    // validate inputs
	$ok = true;
	$errors = [];
		if ($uploadedImage == null) {
			$errors[] = 'Error uploading file. A file size must be below 1MB and only acceptable <jpg, jpeg, png>';
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

    if(!$ok){
        echo '<script>';
            foreach ($errors as $error) {
                echo "alert('$error');";
            }
            echo 'window.history.back();';
        echo '</script>';
    }else{
        // update employee who matches ID
        $sql = "UPDATE employees SET 
                    `image` = '$uploadedImage',
                    first_name = '$first_name',
                    last_name = '$last_name',
                    department ='$department',
                    join_date ='$join_date',
                    work_hour ='$work_hour' 
                    WHERE employee_id = $employee_id";

        if ($conn->query($sql) === TRUE) {
            echo "Your changes have been successfully saved!";
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error ;
        } 
    }

} else {
    echo "Invalid request.";
}
    // disconnect
    $conn->close();
?>