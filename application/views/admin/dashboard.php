<?php $this->load->view('admin/templates/header'); ?>

<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow-md mt-10">
    <h2 class="text-2xl font-bold mb-4 text-center">Admin Dashboard</h2>

    <div class="flex justify-between mb-4">
        <h3 class="text-lg font-semibold">All Blog Posts</h3>
        <a href="<?= site_url('admin/create'); ?>" class="bg-green-500 text-white px-4 py-2 rounded">Add New Blog</a>
    </div>

    <?php if (empty($blogs)): ?>
        <p class="text-gray-500 text-center">No blogs found.</p>
    <?php else: ?>
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-2">Title</th>
                    <th class="border border-gray-300 p-2">Created At</th>
                    <th class="border border-gray-300 p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($blogs as $blog): ?>
                    <tr class="text-center">
                        <td class="border border-gray-300 p-2"><?= $blog['title']; ?></td>
                        <td class="border border-gray-300 p-2"><?= $blog['created_at']; ?></td>
                        <td class="border border-gray-300 p-2">
                            <a href="<?= site_url('admin/edit/'.$blog['id']); ?>" class="text-blue-500">Edit</a> |
                            <a href="<?= site_url('admin/delete/'.$blog['id']); ?>" class="text-red-500" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php $this->load->view('admin/templates/footer'); ?>

