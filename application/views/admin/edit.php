<?php $this->load->view('admin/templates/header'); ?>

<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md mt-10">
    <h2 class="text-2xl font-bold mb-4 text-center">Edit Blog Post</h2>

    <?php if (validation_errors()): ?>
        <div class="text-red-500 mb-4"><?= validation_errors(); ?></div>
    <?php endif; ?>

    <form action="<?= site_url('admin/edit/'.$blog['id']); ?>" method="post">
        <div class="mb-4">
            <label class="block text-gray-700">Title</label>
            <input type="text" name="title" class="w-full border border-gray-300 p-2 rounded" value="<?= $blog['title']; ?>" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Content</label>
            <textarea name="content" class="w-full border border-gray-300 p-2 rounded h-40" required><?= $blog['content']; ?></textarea>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Update Blog</button>
    </form>
</div>

<?php $this->load->view('admin/templates/footer'); ?>
