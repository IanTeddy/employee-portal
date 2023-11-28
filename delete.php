<?php
    // connection
    include './inc/database.php';


    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["employee_id"])) {
        $id = $_GET["employee_id"];

        // Delete a row that matches the employee ID from GET method
        $sql = "DELETE FROM employees WHERE employee_id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "The account was successuflly deleted.";
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" ;
        }
    } else {
        echo "Invalid request.";    
    }

    //disconnect
	$conn->close();
?>
