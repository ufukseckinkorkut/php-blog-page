<?php

include("../database.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create Post</title>
    <link rel="stylesheet" href="../css/create_post.css"/>
</head>
<body>
<header>
    <h1>Create New Post</h1>
</header>

<div class="container">
    <form action="save_post.php" method="POST">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" required maxlength="255" />

        <label for="content">Content</label>
        <textarea id="content" name="content" rows="10" required></textarea>

        <button type="submit" name="submit">Publish Post</button>
    </form>
    <a href="homepage.php" class="back-btn">← Back to Dashboard</a>
</div>

</body>
</html>
