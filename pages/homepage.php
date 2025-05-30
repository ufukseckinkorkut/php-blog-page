<?php
    include("../database.php");

    session_start();

    $username = $_SESSION["username"];
    $user_id = $_SESSION["user_id"];


    $sql = "SELECT posts.*, users.username FROM posts
        JOIN users ON posts.user_id = users.id
        ORDER BY posts.created_at DESC";

    $result = mysqli_query($connection, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/home.css">
</head>
<body>
    <header>
    <h1>usk blog</h1>
    <p>Sharing thoughts and ideas</p>
  </header>


<div class="container">
  <?php if (mysqli_num_rows($result) > 0): ?>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <div class="post">
        <h2><?= $row['title'] ?></h2>
        <div class="meta">By <?= $row['username'] ?> | <?= date("F j, Y", strtotime($row['created_at'])) ?></div>
        <p><?= substr($row['content'], 0, 100) ?>...</p>
        <a href="post.php?id=<?= $row['id'] ?>" class="read-more">Read more →</a>
      </div>
    <?php endwhile; ?>
  <?php else: ?>
    <p>No posts yet.</p>
  <?php endif; ?>
</div>

<?php mysqli_close($connection); ?>
    
    <!-- Add more posts dynamically -->


    <form action="create_post.php" method="POST" class="create-btn-container">
            <button type="submit" name="create" class="create-btn">Create a post</button>
    </form>


  <a href="../index.php" class="logout-btn">Log out</a>
</body>
</html>