<?php

    include("../database.php");


    if (isset($_GET['id'])) {
        $post_id = (int)$_GET['id'];  // Cast to integer for safety

        $sql = "SELECT * FROM posts WHERE id = $post_id";


        $result = mysqli_query($connection, $sql);

        if ($row = mysqli_fetch_assoc($result)) {
            $title = $row['title'];
            $content = $row['content'];
            $created_at = date("F j, Y", strtotime($row['created_at']));
        } else {
            // post not found
            header("Location: homepage.php");
            exit();
        }

        mysqli_close($connection);
    } else {
        // no ID
        header("Location: homepage.php");
        exit();
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $title ?> | usk blog</title>
    <link rel="stylesheet" href="../css/post.css" />
</head>
<body>
    <header>
        <h1><?= $title ?></h1>
        <div class="meta">By <?= $author ?> | <?= $created_at ?></div>
    </header>

    <div class="container">
        <p><?= nl2br($content) ?></p>
        <a href="homepage.php" class="back-btn">← Back to homepage</a>

        <form action="delete.php" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');" style="display:inline;">
            <input type="hidden" name="id" value="<?= $post_id ?>">
            <button type="submit" class="delete-btn" name="delete">Delete Post</button>
         </form>
    </div>



</body>
</html>