<?php $this->load->view('templates/header'); ?>

<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md mt-10">
    <h2 class="text-2xl font-bold mb-4 text-center">Create Blog Post</h2>

    <?php if ($this->session->flashdata('error')): ?>
        <p class="text-red-500 text-center"><?= $this->session->flashdata('error'); ?></p>
    <?php endif; ?>

    <?= form_open('blog/create'); ?>
        <label class="block">Title</label>
        <input type="text" name="title" class="w-full border p-2 rounded mb-3" required>

        <label class="block">Content</label>
        <textarea name="content" class="w-full border p-2 rounded mb-3" rows="5" required></textarea>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded w-full">Post</button>
    <?= form_close(); ?>
</div>

<?php $this->load->view('templates/footer'); ?>
