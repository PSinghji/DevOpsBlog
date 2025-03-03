<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 p-4 text-white shadow-md">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-xl font-bold">Admin Panel</h1>
            <a href="<?= site_url('admin/logout'); ?>" class="text-white">Logout</a>
        </div>
    </nav>
    <div class="container mx-auto mt-4">
