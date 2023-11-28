<?php require ('./inc/login-header.php'); ?>

    <!--Link CSS file--> 
<link rel="stylesheet" href="css/login.css"> 

    <!-- Main part -->
    <body>
        <main>
        <div class="company_logo">
            <img src="images/logo-demo3.png" class=logo>
        </div>
            <div class="container">
                <!-- Form section-->
                <div id="portal-form">
                    <div class='fieldset'>
                    <legend>Login</legend>
                        <form method="post" action="login-validation.php">
                            <!-- username -->
                            <div class='row'>
                                <label>Username : </label>   
                                <input type="text" placeholder="Username or Email" name="username" autofocus required>  <br/>
                            </div>
                            <!-- password -->
                            <div class='row'>
                                <label>Password : </label>   
                                <input type="password" placeholder="Password" name="password" required>  <br/>
                            </div>
                            
                            <!-- Submit button-->
                            <button type="submit" value="SEND" id="nextStep">Log in</button>
                            <!-- register account -->
                            <p class="message">Not registered? <a href="register.php">Create an account</a></p>
                        </form>
                </div>
            </div>
        </main>
    </body>



