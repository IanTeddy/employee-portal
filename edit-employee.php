<?php require ('./inc/header.php'); ?>

<link rel="stylesheet" href="css/edit.css"> 

<body>     
        <form method="POST" action="update.php" enctype="multipart/form-data">
        <h1>Change Employee Details</h1>
        <div class="grid-container">
            <?php
            include('./inc/database.php');  

            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["employee_id"])) {
                $employee_id = $_GET["employee_id"];

                $sql = "SELECT * FROM employees WHERE employee_id = $employee_id";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc(); 
                    echo '<div class="grid-right">';
                        $currentImg= '' . $row["image"] . '';
                        echo '<input type="hidden" name="current_image" value="' . $currentImg . '">';
                        echo 'Profile Picture :<br><img id="current-image" src="./upload_img/' . $currentImg . '" alt="Current Image"><br>';
                        echo 'Upload new picture: <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value="' . $currentImg . '"> <br>';
                    echo '</div>';
                    echo '<div class="grid-left">';
                        echo '<input type="hidden" name="employee_id" value="' . $row["employee_id"] . '">';
                        echo '<div class="name_row row">';
                            echo '<div> First Name:<br> <input type="text" name="first_name" value="' . $row["first_name"] . '"><br></div>';
                            echo '<div> Last Name:<br> <input type="text" name="last_name" value="' . $row["last_name"] . '"><br></div>';
                        echo '</div>';
                        echo '<div class="row">Department: <br>';
                        echo '<select name="department">';
                        $departments = array("HR", "Marketing", "IT", "Sales", "Accounting"); //Contains all department names
                        $currentDepartment = $row["department"];    // Retrieves the current department value from the database 
                        foreach ($departments as $department) {
                            $selected = ($department == $currentDepartment) ? 'selected' : '';  // Sets the $selected variable to 'selected,' which will make that option the selected option in the dropdown
                            echo '<option value="' . $department . '" ' . $selected . '>' . $department . '</option>';
                        }
                        echo '</select><br> </div>';
                        echo '<div class="row">Join Date:<br> <input type="date" name="join_date" value="' . $row["join_date"] . '"><br/></div>';
                        echo '<div class="row">Working Hours: <br><input type="text" name="work_hour" value="' . $row["work_hour"] . '"><br/></div>';
                    echo '</div>';
        echo '</div>';
                    // Update button
                    echo '<div class="update">';
                        echo '<button type="submit" class="update_btn">Update</button>';
                    echo '</div>';
                } else {
                    echo "Employee not found.";
                }
            } else {
                echo "Invalid request.";
            }

            $conn->close();
            ?>
        </form>
        
        <footer>
        <div class="footer-content">
            <p>MAY Inc.</p>
            <div class="footer-info">
                <p>&copy; 2023 Employee Portal by Mei Hirata</p>
            </div>
        </div>
    </footer>       
</body>
</html>