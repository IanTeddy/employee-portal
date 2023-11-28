<?php
// function for handle files which return new unique name of file
    function handleImageUpload($defaultImage) {

    if ($_FILES["image"]["error"] == UPLOAD_ERR_NO_FILE || $_FILES["image"]["error"] == 4){
        return $defaultImage;
    } 
    else {
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        
        $validImageExtensions = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));

        // Check the type of uploaded image
        if (!in_array($imageExtension, $validImageExtensions)) {
            // echo "<p>Invalid Image Extension</p>";
            return null; 
        } else if ($fileSize > 2000000) { // Check the file size (2 MB)
            // echo "<p>Image Size is Too Large</p>";
            return null; 
        } else {
            // Generate a unique file name with random number, current timestamp, and the extension
            $newImageName = uniqid() . '_' . rand(1000, 9999) . '_' . time() . '.' . $imageExtension;
            $uploadDirectory = 'upload_img/';

            // UPLOAD_ERR_OK (0): No error, the file was uploaded successfully
            if ($_FILES["image"]["error"] == 0) {
                move_uploaded_file($tmpName, $uploadDirectory . $newImageName);
            } 
            return $newImageName; 
        }
    }
    }
?>