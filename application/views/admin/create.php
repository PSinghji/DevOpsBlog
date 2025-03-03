<?php $this->load->view('admin/templates/header'); ?>

<h2 class="text-xl font-bold mb-4">Create New Blog Post</h2>

<form action="<?= site_url('admin/create'); ?>" method="post" enctype="multipart/form-data">
    <label class="block text-gray-700 font-bold mb-2">Title:</label>
    <input type="text" name="title" class="w-full p-2 border border-gray-300 rounded-lg" required>

    <label class="block text-gray-700 font-bold mt-4 mb-2">Content:</label>
    <textarea name="content" id="editor" class="w-full p-2 border border-gray-300 rounded-lg"></textarea>

    <label class="block text-gray-700 font-bold mt-4 mb-2">Upload Image:</label>
    <input type="file" name="blog_image" class="w-full p-2 border border-gray-300 rounded-lg">

    <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg">Publish Post</button>
</form>

<!-- CKEditor Script -->
<script src="https://cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor', {
        height: 400,
        filebrowserUploadUrl: "<?= site_url('admin/upload_image'); ?>",
        filebrowserUploadMethod: 'form'
    });
</script>


<?php $this->load->view('admin/templates/footer'); ?>
