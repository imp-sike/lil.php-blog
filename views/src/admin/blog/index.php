<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog List</title>
    <link rel="stylesheet" href="../views/css/blog.css">
</head>
<body>
    <header>
        <h1>Blog Posts</h1>
        <a href="<?= route('admin.blog.create') ?>" class="btn">Create New Post</a>
    </header>
    <main>
        <?php if (isset($data['success'])): ?>
            <div class="alert alert-success">
                <?= htmlspecialchars($data['success']) ?>
            </div>
        <?php endif; ?>

        <?php if (isset($data['errors'])): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($data['errors']) ?>
            </div>
        <?php endif; ?>

        <?php foreach ($data['blogs'] as $blog): ?>
            <div class="blog-post">
                <h2><?= htmlspecialchars($blog['title']) ?></h2>
                <p><?= htmlspecialchars($blog['content']) ?></p>
                <?php if ($blog['image']): ?>
                    <img src="../<?php echo $blog['image'];?>" alt="Blog Image" width="100">
                <?php endif; ?>
                <a href="<?= route('admin.blog.edit', ['id' => $blog['id']]) ?>" class="btn">Edit</a>
                <form action="<?= route('admin.blog.destroy', ['id' => $blog['id']]) ?>" method="POST" style="display:inline;">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        <?php endforeach; ?>
    </main>
</body>
</html>
