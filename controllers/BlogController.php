<?php

namespace App\Controller;

use App\Model\User;
use Lil\Controller;
use App\Model\Blog;
use Lil\View;

class BlogController extends Controller
{
    // Show the form to create a new blog post
    public function create()
    {
        $users = (new User())->all();
        return view('admin/blog/create', ["users" => $users]);
    }

    // Handle the creation of a new blog post
    public function store()
    {
        $data = mustHave($_POST, ['user_id', 'title', 'content']);

        $upload_dir = 'uploads/';
        $allowed_types = ['image/jpg', 'image/png'];
        $max_size = 10048000; // 2MB

        $image = file_upload($upload_dir, 'image', $allowed_types, $max_size);

        if (!$data) {
            return redirect(route('admin.blog.create', ['error' => 'All fields are required.']));
        }

        $blog = new Blog();
        $blog->insert([
            'user_id' => $data['user_id'],
            'title' => $data['title'],
            'content' => $data['content'],
            'image' => $image
        ]);

        return redirect(route('admin.blog.index', ['success' => 'Blog created successfully.']));
    }

    // Show the list of blog posts
    public function index()
    {
        $blogs = (new Blog())->all();
        return view('admin/blog/index', ['blogs' => $blogs]);
    }

    // Show the form to edit a blog post
    public function edit($id)
    {
        $blog = (new Blog())->withId($id);
        return view('admin/blog/edit', ['blog' => $blog]);
    }

    // Handle the update of a blog post
    public function update($id)
    {
        $data = mustHave($_POST, ['title', 'content']);


        $upload_dir = 'uploads/';
        $allowed_types = ['image/jpg', 'image/png'];
        $max_size = 2048000; // 2MB

        $old_image = (new Blog())->withId($id)['image'];
        $image = file_update('image', $upload_dir, $allowed_types, $max_size, $old_image);

        if (!$data) {
            return redirect(route('admin.blog.edit', ['id' => $id, 'error' => 'All fields are required.']));
        }


        $blog = new Blog();
        $blog->update($id, [
            'user_id' => (new Blog())->withId($id)['user_id'],
            'title' => $data['title'],
            'content' => $data['content'],
            'image' => $image ?? (new Blog())->withId($id)['image']
        ]);

        return redirect(route('admin.blog.index', ['success' => 'Blog updated successfully.']));
    }

    // Handle the deletion of a blog post
    public function destroy($id)
    {
        $blog = new Blog();
        $blog_data = $blog->withId($id);

        if ($blog_data['image']) {
            file_delete('uploads/' . $blog_data['image']);
        }

        if ($blog->delete($id)) {
            return redirect(route('admin.blog.index', ['success' => 'Blog deleted successfully.']));
        }

        return redirect(route('admin.blog.index', ['error' => 'Failed to delete blog.']));
    }
}
