<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $conn = mysqli_connect('localhost', 'root', '', 'smc');

    $searchInput = $_POST['searchInput'];

  if ($searchInput) {
    try{
      $sql = "SELECT * FROM users WHERE username LIKE '%$searchInput%'";

      $res = mysqli_query($conn, $sql);

        $result = mysqli_fetch_all($res, MYSQLI_ASSOC);

        echo json_encode($result);
  
    }
    catch(Exception $error){
      echo json_encode(["message" => "some server error" . $error]);
    }
  } else {
    echo json_encode(["message" => "Invalid email address. Please try again."]);
  }
} else {
  header("Location: index.html");
  exit();
}
?>