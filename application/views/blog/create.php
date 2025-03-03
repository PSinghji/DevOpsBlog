<?php $this->load->view('templates/header'); ?>

<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow-md mt-10">
    <h2 class="text-2xl font-bold mb-4 text-center">Create Blog Post</h2>

    <?php if ($this->session->flashdata('error')): ?>
        <p class="text-red-500 text-center"><?= $this->session->flashdata('error'); ?></p>
    <?php endif; ?>

    <?= form_open_multipart('blog/create'); ?> 
        <label class="block font-semibold">Title</label>
        <input type="text" name="title" class="w-full border p-2 rounded mb-3" required>

        <label class="block font-semibold">Content</label>
        <textarea name="content" id="editor" class="w-full border p-2 rounded mb-3" rows="5" required></textarea>

        <label class="block font-semibold">Upload Image</label>
        <input type="file" name="blog_image" class="w-full border p-2 rounded mb-3">

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded w-full">Post</button>
    <?= form_close(); ?>
</div>

<!-- Include CKEditor -->
<script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor', {
        height: 400,
        filebrowserUploadUrl: "<?= site_url('blog/upload_image'); ?>",
        filebrowserUploadMethod: 'form'
    });
</script>

<?php $this->load->view('templates/footer'); ?>
