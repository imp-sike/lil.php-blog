<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e9ecef;
            color: #495057;
        }
        header {
            background-color: #343a40;
            color: #fff;
            padding: 15px 20px;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid #ced4da;
        }
        .container {
            max-width: 960px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            margin: 0;
            font-size: 24px;
            font-weight: 600;
        }
        a {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }
        a:hover {
            text-decoration: underline;
        }
        .logout-button {
            display: inline-block;
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }
        .logout-button:hover {
            background-color: #c82333;
        }
        .admin-link {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }
        .admin-link:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <header>
        <h1>BLOG</h1>
    </header>
    <div class="container">
        <a href="<?= route('auth.logout') ?>" class="logout-button">Logout</a>
        <hr>
        <p><a href="<?= route('admin.blog.index') ?>" class="admin-link">Go to Blog Admin Panel Control</a></p>
    </div>
</body>
</html>
