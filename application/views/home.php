<?php $this->load->view('templates/header'); ?>

<div class="max-w-4xl mx-auto bg-white p-6 rounded shadow-md mt-10">
    <h2 class="text-3xl font-bold mb-4 text-center">Welcome to DevOps Learning Blog</h2>
    <p class="text-gray-700 text-center mb-6">Explore and learn about the latest DevOps practices, tools, and trends.</p>

    <?php if (empty($blogs)): ?>
        <p class="text-gray-500 text-center">No blog posts available.</p>
    <?php else: ?>
        <?php foreach ($blogs as $blog): ?>
            <div class="mb-6 p-4 border border-gray-300 rounded shadow-md">
                <h3 class="text-xl font-semibold"><?= $blog['title']; ?></h3>
                <p class="text-gray-600 text-sm">Published on: <?= date('F j, Y', strtotime($blog['created_at'])); ?></p>
                <p class="mt-2 text-gray-800"><?= word_limiter($blog['content'], 40); ?></p>
                <a href="<?= site_url('blog/view/'.$blog['id']); ?>" class="text-blue-500 mt-2 inline-block">Read More</a>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<?php $this->load->view('templates/footer'); ?>
