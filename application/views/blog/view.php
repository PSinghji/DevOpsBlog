<?php $this->load->view('templates/header'); ?>
<div class="flex">    

    <!-- Blog Post Content -->
    <div class="w-3/4 max-w-4xl mx-auto bg-white p-6 rounded shadow-md mt-10">
        <h2 class="text-3xl font-bold mb-4"><?= $blog['title']; ?></h2>
        <p class="text-gray-600 text-sm">Published on: <?= date('F j, Y', strtotime($blog['created_at'])); ?></p>

        <div class="mt-4 text-gray-800">
            <?php if (!empty($blog['image'])): ?>
                <img src="<?= base_url($blog['image']); ?>" alt="Blog Image" class="w-full max-w-lg rounded-lg shadow-md mb-4">
            <?php endif; ?>
            <?= nl2br($blog['content']); ?>
        </div>    
    </div>
</div>


<?php $this->load->view('templates/footer'); ?>
