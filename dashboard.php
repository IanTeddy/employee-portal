<?php 
    require ('./inc/header.php'); 
    session_start();
    //check for authentication before we show any data
    if (!isset($_SESSION["manager_id"])) {
        header("location: index.html"); // Redirect to login page if not logged in
        exit;
    }
?>
        <!--Link CSS file--> 
    <link rel="stylesheet" href="css/dashboard.css"> 
    <!-- Javascript for Add NEW button -->
    <script>
        function redirectToAddPage() {
            window.location.href = 'add-team.php';
        }
    </script>

    <h1>Dashboard</h1>
    <?php
        // Check if the user is an admin
        if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == true) {
            // Display the button only if the user is an admin
            echo '<div class="add">';
            echo '<button class="add-button" onclick="redirectToAddPage()">ADD NEW+</button>';
            echo '</div>';
        }
    ?>
    <div class="container">
    <?php   
        
            //connect to db
            include './inc/database.php';
            //set up query
            $sql = "SELECT * FROM employees";  
            //run the query and store the results
            $result = $conn->query($sql);
            //start our table
            if ($result->num_rows > 0) {
                echo "<div class='grid-container'>";
                while ($row = $result->fetch_assoc()) { //fetch_assoc():keep looping as long as there are more rows in the result set
                    $uniqueFormId = "deleteForm_" . $row["employee_id"]; // Unique form ID for each row
                    
                    echo "<div class='prof'>";
                        echo "<div class='prof-header'>";
                            echo "<img src='./upload_img/" . $row['image'] . "' class='profile' title='" . $row['image'] . "'>";
                            echo "<p>".$row['first_name']."  ".$row['last_name']."</p>";
                        echo "</div>";
                        echo "
                        <table class='info-table'>
                            <tr>
                                <th class='label'>ID</th><td>". $row['employee_id'] ."</td>
                            </tr>    
                            <tr>
                                <th class='label'>Department</th><td>".$row['department'] ."</td>
                            </tr>
                            <tr>
                                <th class='label'>Join Date</th><td>". $row['join_date'] ."</td>
                            </tr>
                            <tr>
                                <th class='label'>Work Hour</th><td>".$row['work_hour']."</td>
                            </tr>";
                            
                                
                            if (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == true) {
                                echo 
                                "<tr>
                                    <td colspan='2' class='button-column'>
                                        <div class='button-container'>
                                            <form id='" . $uniqueFormId . "' method='GET' action='edit-employee.php'>
                                                <input type='hidden' name='employee_id' value='" . $row["employee_id"] . "'>
                                                <button type='submit' class='button edit-btn'>Edit</button>
                                            </form>
                                            <form id='" . $uniqueFormId . "' method='GET' action='delete.php'>
                                                <input type='hidden' name='employee_id' value='" . $row["employee_id"] . "'>
                                                <button class='button delete-btn' type='button' onclick='confirmDelete(\"" . $uniqueFormId . "\")'>Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>";
                            }
                             
                        echo "</table>";
                    echo "</div>";
                
                }
                echo "</div>";              
            }else {
                echo "No records found";
            }

            //disconnect
            $conn->close();
    ?>
    </div>
    <script>
        function confirmDelete(formId) {
            if (confirm("Are you sure you want to delete this record?")) {
                // Set the form action to delete.php
                document.getElementById(formId).action = 'delete.php';
                // Submit the form
                document.getElementById(formId).submit();
            }
        }
    </script>
    


    <?php require ('./inc/footer.php'); ?>
    