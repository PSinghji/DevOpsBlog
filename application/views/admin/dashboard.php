<?php $this->load->view('admin/templates/header'); ?>

<h2 class="text-2xl font-bold mb-4">Admin Dashboard</h2>

<a href="<?= site_url('admin/create'); ?>" class="bg-green-500 text-white px-4 py-2 rounded">Create New Blog</a>

<table class="w-full mt-4 border-collapse border border-gray-300">
    <thead>
        <tr class="bg-gray-200">
            <th class="border border-gray-300 px-4 py-2">ID</th>
            <th class="border border-gray-300 px-4 py-2">Title</th>
            <th class="border border-gray-300 px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($blogs as $blog): ?>
        <tr>
            <td class="border border-gray-300 px-4 py-2"><?= $blog['id']; ?></td>
            <td class="border border-gray-300 px-4 py-2"><?= $blog['title']; ?></td>
            <td class="border border-gray-300 px-4 py-2">
                <a href="<?= site_url('admin/edit/'.$blog['id']); ?>" class="bg-blue-500 text-white px-3 py-1 rounded">Edit</a>
                <a href="<?= site_url('admin/delete/'.$blog['id']); ?>" class="bg-red-500 text-white px-3 py-1 rounded" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php $this->load->view('admin/templates/footer'); ?>
