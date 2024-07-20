<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <header class="bg-primary text-white text-center py-3">
        <h1>Blog Posts</h1>
        <a href="<?= route('auth.logout') ?>" class="btn btn-light">Logout</a>
        <a href="<?= route('admin.blog.create') ?>" class="btn btn-light">Create New Post</a>
    </header>
    <main class="container mt-4">
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
            <div class="blog-post mb-4 border p-3 rounded">
                <h2><?= htmlspecialchars($blog['title']) ?></h2>
                <p><?= htmlspecialchars($blog['content']) ?></p>
                <?php if ($blog['image']): ?>
                    <img src="../<?php echo $blog['image'];?>" alt="Blog Image" class="img-thumbnail" width="100">
                <?php endif; ?>
                <a href="<?= route('admin.blog.edit', ['id' => $blog['id']]) ?>" class="btn btn-primary mt-2">Edit</a>
                <form action="<?= route('admin.blog.destroy', ['id' => $blog['id']]) ?>" method="POST" style="display:inline;">
                    <button type="submit" class="btn btn-danger mt-2">Delete</button>
                </form>
            </div>
        <?php endforeach; ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
