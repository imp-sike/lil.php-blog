<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <header class="bg-primary text-white text-center py-3">
        <h1>Create Blog Post</h1>
        <a href="<?= route('admin.blog.index') ?>" class="btn btn-light">Back to Blog List</a>
    </header>
    <main class="container mt-4">
        <?php if (isset($data['error'])): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($data['error']) ?>
            </div>
        <?php endif; ?>
        <form action="<?= route('admin.blog.store') ?>" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="user_id">Author:</label>
                <select name="user_id" id="user_id" class="form-control" required>
                    <option value="">Select Author</option>
                    <?php foreach ($data["users"] as $user): ?>
                        <option value="<?= $user['id'] ?>">
                            <?= htmlspecialchars($user['username']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control-file">
            </div>

            <button type="submit" class="btn btn-primary">Create Post</button>
        </form>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
