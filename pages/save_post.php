<?php

include("../database.php");


if (isset($_POST["submit"])) {



      $title = $_POST["title"];
      $content = $_POST["content"];

        $sql = "INSERT INTO posts (title, content)
                    VALUES ('$title', '$content')";

        mysqli_query($connection, $sql);

        mysqli_close($connection);
}

  
// Redirect back to home
header("Location: homepage.php");  
exit();



?>