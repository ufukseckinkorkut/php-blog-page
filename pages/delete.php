<?php

    include("../database.php");

    if(isset($_POST["delete"])) {

        $post_id = $_POST['id']; 

        $sql = "DELETE FROM posts where id = $post_id"; 

        mysqli_query($connection, $sql);

        mysqli_close($connection);

        header("Location: homepage.php");
        exit();

    }


?>