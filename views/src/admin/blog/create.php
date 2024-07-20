<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog</title>
    <link rel="stylesheet" href="../../views/css/blog.css">
</head>

<body>
    <header>
        <h1>Create Blog Post</h1>
        <a href="<?= route('admin.blog.index') ?>" class="btn">Back to Blog List</a>
    </header>
    <main>
        <?php if (isset($data['error'])): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($data['error']) ?>
            </div>
        <?php endif; ?>
        <form action="<?= route('admin.blog.store') ?>" method="POST" enctype="multipart/form-data">
            <label for="user_id">Author:</label>
            <select name="user_id" id="user_id" required>
                <option value="">Select Author</option>
                <?php foreach ($data["users"] as $user): ?>
                    <option value="<?= $user['id'] ?>">
                        <?= htmlspecialchars($user['username']) ?></option>
                <?php endforeach; ?>
            </select>

            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>

            <label for="content">Content</label>
            <textarea name="content" id="content" rows="5" required></textarea>

            <label for="image">Image</label>
            <input type="file" name="image" id="image">

            <button type="submit">Create Post</button>
        </form>
    </main>
</body>

</html>