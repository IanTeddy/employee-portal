<!-- install login-header.php -->
<?php require ('./inc/login-header.php'); ?>


 <!--Link CSS file--> 
 <link rel="stylesheet" href="./css/register.css"> 

 <div class="container">
    <!-- container left side -->
    <div class="container-left">
        <img src="images/Login-rafiki.png" alt="register">
    </div>
    
    <!-- container right side -->
    <div class="container-right">
        <div class="title">
                <h1>User Signup</h1>
                <p>Create an account</p>
        </div>
        <!-- form that stores to save-manager.php -->
        <form action="register-validation.php" method="post">
        
            <!-- select admin or not -->
            <div class="admin-check">
                <label for="isadmin">
                    <input type="radio" name="isadmin" value="1" <?php echo (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] == true) ? 'checked' : ''; ?>>
                    Yes, I am an admin
                </label>
                <label for="isadmin">
                    <input type="radio" name="isadmin" value="0" <?php echo (isset($_SESSION['isadmin']) && $_SESSION['isadmin'] != true) ? 'checked' : ''; ?>>
                    No, I am not an admin
                </label>
            </div>
            <!-- name section -->
            <div class="full_name">
                <div class="name">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div class="name">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
            </div>
            <div class="user-info">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Username" required>
        
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm" required>

                <!-- Role: Drop down -->
                <label for="role">Select Role:</label>
                <select id="role" name="role" required>
                    <option value="Manager">Manager</option>
                    <option value="Team">Team</option>
                </select>
            </div>
        
            <div class="register">
                <button type="submit" class="register-btn">Register</button>
            </div>
        </form>
    </div>
</div>


