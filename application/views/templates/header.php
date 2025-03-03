<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogging Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4 text-white shadow-md">
        <div class="container mx-auto flex justify-between">
            <a href="<?= site_url(); ?>" class="text-xl font-bold">DevOps Blog</a>
            
            <div>
                <?php if ($this->session->userdata('user_id')): ?>
                    <span class="mr-4">Welcome, <?= $this->session->userdata('user_name'); ?>!</span>
                    <a href="<?= site_url('blog/create'); ?>" class="mr-4">New Post</a>
                    <a href="<?= site_url('user/logout'); ?>" class="text-white">Logout</a>
                <?php else: ?>
                    <a href="<?= site_url('user/login'); ?>" class="mr-4">Login</a>
                    <a href="<?= site_url('user/register'); ?>" class="text-white">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    
    <div class="container mx-auto mt-4 flex">
        <!-- Left-side navigation bar -->
        <aside class="w-1/4 bg-gray-200 p-4 h-screen">
            <h2 class="text-lg font-semibold mb-2">Categories</h2>
            <ul>
                <?php if (!empty($categories)) : ?>
                    <?php foreach ($categories as $category): ?>
                            <li class="mb-1">
                                <a href="<?= site_url('blog/category/'.$category['id']); ?>" 
                                class="text-blue-600"><?= $category['name']; ?>
                                </a>
                            </li>
            <?php endforeach; ?>
                <?php else : ?>
                    <li>No categories available</li>
                <?php endif; ?>
            </ul>
        </aside>
       
        <!-- Main content area -->
        <main class="w-3/4 ml-4">
