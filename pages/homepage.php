<?php
    include("../database.php");

    $sql = "SELECT * FROM posts ORDER BY created_at DESC";
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
    <!-- Example post (you’ll loop this part with PHP) -->
    <div class="post">
      <h2>Post Title</h2>
      <div class="meta">By Ufuk | May 13, 2025</div>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent convallis...</p>
      <a href="post.php?id=1" class="read-more">Read more →</a>
    </div>

<div class="container">
  <?php if (mysqli_num_rows($result) > 0): ?>
    <?php while ($row = mysqli_fetch_assoc($result)): ?>
      <div class="post">
        <h2><?= $row['title'] ?></h2>
        <div class="meta">By USER | <?= date("F j, Y", strtotime($row['created_at'])) ?></div>
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

  </div>

    <form action="create_post.php" method="POST">
            <button type="submit" name="create" class="create-btn">Create a post</button>
    </form>


  <a href="../index.php" class="logout-btn">Log out</a>
</body>
</html>