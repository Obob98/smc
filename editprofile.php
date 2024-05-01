<?php 
    include('./config/conn.php');

    if(isset($_POST['submit'])){
        // Assuming you already have established the database connection ($conn) and session ($_SESSION) 

        // Check if the image file is uploaded
        print_r($_FILES['image']);
        if($_FILES['image']['name']){
            $image_name = $_FILES['image']['name'];
            // $ext = end(explode('.', $image_name));
            $filename_parts = explode('.', $_FILES['image']['name']);
            $ext = end($filename_parts);
            $image_name = 'profpic' . rand(0000000, 9999999) . '.' . $ext; 
            
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = './images/profiles/'.$image_name;
            
            // Move the uploaded file to the destination directory
            $upload = move_uploaded_file($source_path, $destination_path);

            if($upload === false){
                $_SESSION['upload'] = 'failed to upload';
                // Redirect or handle error
                // header('Location: ./profile.php');
                die();
            } else {
                // Image upload successful, proceed to update username, email, and profile image in the database

                // Extract username and email from the form data
                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);

                // Update SQL query to include username, email, and profile_img
                $sql = "UPDATE users 
                        SET username = '$username',
                            email = '$email',
                            profile_img = '$image_name'
                        WHERE username = '{$_SESSION['user']['username']}'";

                // Execute the SQL query
                $res = mysqli_query($conn, $sql);

                if($res === true){
                    // Update session data with new username, email, and profile image
                    $_SESSION['user']['username'] = $username;
                    $_SESSION['user']['email'] = $email;
                    $_SESSION['user']['profile_img'] = $image_name;

                    // Set flag for profile update success
                    $_SESSION['profile-updated'] = true;

                    // Redirect or handle success
                    header(('Location: ./profile.php'));
                } else {
                    // Handle database error
                    echo 'Failed to update profile';
                    echo json_encode(["message" => "some databse error"]);
                }
            }
        }
    } else {
        // No image uploaded
        $image_name = '';
    }
?>