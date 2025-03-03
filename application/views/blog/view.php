<?php $this->load->view('templates/header'); ?>

<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow-md mt-10">
    <h2 class="text-3xl font-bold mb-4"><?= $blog['title']; ?></h2>
    <p class="text-gray-600 text-sm">Published on: <?= date('F j, Y', strtotime($blog['created_at'])); ?></p>
    <div class="mt-4 text-gray-800">
        <?= nl2br($blog['content']); ?>
    </div>
</div>

<?php $this->load->view('templates/footer'); ?>
