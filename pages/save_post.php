<?php

include("../database.php");


if (isset($_POST["submit"])) {
    
    session_start();
    
    $user_id = $_SESSION["user_id"];


      $title = $_POST["title"];
      $content = $_POST["content"];

        $sql = "INSERT INTO posts (user_id, title, content)
                    VALUES ('$user_id', '$title', '$content')";

        mysqli_query($connection, $sql);

        mysqli_close($connection);
}

  
// Redirect back to home
header("Location: homepage.php");  
exit();



?>