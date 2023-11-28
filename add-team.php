<?php require ('./inc/header.php'); ?>
         <!--Link CSS file--> 
        <link rel="stylesheet" href="css/edit.css"> 

        <main>

        <!-- Form section-->
        <form action="/portal/create.php" method="post" autocomplete="off" enctype="multipart/form-data">
        <h1 style="margin-bottom: 0.3em">Add New Employee</h1>
        <legend>Enter Your information</legend>

        <div class="grid-container">
            <!-- grid side 1 -->
            <div class="grid-right">
                <!-- profile picture -->
                <label for="image">Profile Picture : </label>
                <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png" value="" onchange="previewImage()"> <br> <br>
                <!-- Image preview -->
                <img id="image-preview" alt="Image Preview" style="max-width: 30vw; max-height: 25vw; display: none">
            </div>
            <!-- grid side 2 -->
            <div class="grid-left">
                <!-- First name -->
                <div class='row'>
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" id="first_name" data-required="true"><br/>
                </div>
                <!-- Last name -->
                <div class='row'>
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" id="last_name" data-required="true"><br/>
                </div>


                <!-- Department: Drop down -->
                <div class='row'>
                    <label for="department">Department</label>
                        <select name="department" id="department">
                            <option value="HR">Human resources</option>
                            <option value="Marketing">Marketing</option>
                            <option value="IT">IT</option>
                            <option value="Sales">Sales</option>
                            <option value="Account">Accounting</option>
                        </select>
                </div>
                <!-- Join date -->
                <div class='row'>
                    <label for="join_date">Join Date</label>
                    <input type="date" name="join_date" id="join_date"><br/>
                </div>
                <!-- Working Hour -->
                <div class='row'>
                    <label for="work_hour">Working Hours</label>
                    <input type="text" name="work_hour" id="work_hour" placeholder="Total hours/week"><br/>
                </div>
            </div>
        </div>

        <!-- Submit button-->
        <div class="update">
            <button type="submit" value="SEND" class="update_btn">SUBMIT</button>
        </div>

        </form>
                
            
        </div>
        </main>
        
        <script>
            function previewImage() {
                var input = document.getElementById('image');
                var preview = document.getElementById('image-preview');

                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        preview.src = e.target.result;
                    };

                    reader.readAsDataURL(input.files[0]);
                    preview.style.display = 'block';
                } else {
                    // Hide the image preview if no file is selected
                    preview.style.display = 'none';
                }
            }

            function showAlert(){
                alert("Successfully Added New Member!")
            }
        </script>
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



