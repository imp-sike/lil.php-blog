<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Blog</title>
    <link rel="stylesheet" href="../../../views/css/blog.css">
</head>

<body>
    <header>
        <h1>Edit Blog Post</h1>
        <a href="<?= route('admin.blog.index') ?>" class="btn">Back to Blog List</a>
    </header>
    <main>
        <?php if (isset($data['errors'])): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($data['errors']) ?>
            </div>
        <?php endif; ?>
        <form action="<?= route('admin.blog.update', ['id' => $data['blog']['id']]) ?>" method="POST"
            enctype="multipart/form-data">

            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?= htmlspecialchars($data['blog']['title']) ?>" required>

            <label for="content">Content</label>
            <textarea name="content" id="content" rows="5"
                required><?= htmlspecialchars($data['blog']['content']) ?></textarea>

            <label for="image">Image</label>
            <input type="file" name="image" id="image">
            <?php if ($data['blog']['image']): ?>
                <img src="<?= "../../../". htmlspecialchars($data['blog']['image']) ?>" alt="Blog Image"
                    width="100">
            <?php endif; ?>

            <button type="submit">Update Post</button>
        </form>
    </main>
</body>

</html>