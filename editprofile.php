<?php 
    include('./config/conn.php');

    if(isset($_POST['submit'])){

        print_r($_FILES['image']);
        if($_FILES['image']['name']){
            $image_name = $_FILES['image']['name'];
            $filename_parts = explode('.', $_FILES['image']['name']);
            $ext = end($filename_parts);
            $image_name = 'profpic' . rand(0000000, 9999999) . '.' . $ext; 
            
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = './images/profiles/'.$image_name;
            
            $upload = move_uploaded_file($source_path, $destination_path);

            if($upload === false){
                echo 'upload false';
                $_SESSION['upload'] = 'failed to upload';
                die();
            } else {

                $username = mysqli_real_escape_string($conn, $_POST['username']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);

                $sql = "UPDATE users 
                        SET username = '$username',
                            email = '$email',
                            profile_img = '$image_name'
                        WHERE username = '{$_SESSION['user']['username']}'";

                $res = mysqli_query($conn, $sql);

                if($res === true){
                    $_SESSION['user']['username'] = $username;
                    $_SESSION['user']['email'] = $email;
                    $_SESSION['user']['profile_img'] = $image_name;

                    $_SESSION['profile-updated'] = true;

                    header(('Location: ./profile.php'));
                } else {
                    echo 'Failed to update profile';
                    echo json_encode(["message" => "some databse error"]);
                }
            }
        }else {

            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $email = mysqli_real_escape_string($conn, $_POST['email']);

            $sql = "UPDATE users 
                    SET username = '$username',
                        email = '$email'
                    WHERE username = '{$_SESSION['user']['username']}'";

            $res = mysqli_query($conn, $sql);

            if($res === true){
                $_SESSION['user']['username'] = $username;
                $_SESSION['user']['email'] = $email;

                $_SESSION['profile-updated'] = true;

                header(('Location: ./profile.php'));
            } else {
                echo 'Failed to update profile';
                echo json_encode(["message" => "some databse error"]);
            }
        }
    } else {
        $image_name = '';
    }
?>