<div class="flex">
    <!-- Blog Posts in Selected Category -->
    <div class="w-3/4 max-w-4xl mx-auto bg-white p-6 rounded shadow-md mt-10">
        <h2 class="text-3xl font-bold mb-4"><?= $category['name']; ?> Blogs</h2>

        <?php if (!empty($posts)): ?>
            <?php foreach ($posts as $post): ?>
                <div class="mb-6 border-b pb-4">
                    <h3 class="text-xl font-bold">
                        <a href="<?= site_url('blog/view/'.$post['id']); ?>" class="text-blue-600"><?= $post['title']; ?></a>
                    </h3>
                    <p class="text-gray-600"><?= substr($post['content'], 0, 150); ?>...</p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-gray-500">No posts found in this category.</p>
        <?php endif; ?>
    </div>
</div>