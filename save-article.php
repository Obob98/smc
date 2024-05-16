<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if(isset($_POST['id']) && isset($_POST['username'])) {
      $conn = mysqli_connect('localhost', 'root', '', 'smc');
      $article_id = $_POST['id'];
      $username = $_POST['username'];

      if ($article_id && $username) {
          try {
              $sql = "INSERT INTO saved_articles (article_id, username) VALUES ($article_id, '$username')";
              $res = mysqli_query($conn, $sql);

              if($res === true) {
                  echo json_encode(["success" => true]);
              } else {
                  echo json_encode(["success" => false]);
              }  
          } catch(Exception $error) {
              echo json_encode(["message" => "some server error" . $error]);
          }
      } else {
          echo json_encode(["message" => "Invalid data sent. Please try again."]);
      }
  } else {
      echo json_encode(["message" => "Invalid data format. Please try again."]);
  }
} else {
  header("Location: index.html");
  exit();
}

?>