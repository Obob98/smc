<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    include('../config/conn.php');

    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $username = $_SESSION['user']['username'];

  if ($email) {
    try{
      $pdo = new PDO('mysql:host=localhost;dbname=smc', 'root', '');
  
      $sql = "INSERT INTO subscribers (email, username) VALUES (:email, :username)";
  
      $stmt = $pdo->prepare($sql);
  
      $stmt->execute(['email' => $email, 'username' => $username]);
      
      echo json_encode(["message" => "Thank you, $username, for subscribing with email: $email"]);
    }
    catch(Exception $error){
      echo json_encode(["message" => "some server error"]);
    }
  } else {
    echo json_encode(["message" => "Invalid email address. Please try again."]);
  }
} else {
  header("Location: index.html");
  exit();
}
?>