<?php foreach ($posts as $post) : ?>
    <div class="bg-white p-4 rounded shadow-md mb-4">
        <h2 class="text-xl font-bold">
            <a href="<?php echo site_url('blog/view/'.$post['slug']); ?>" class="text-blue-600 hover:underline">
                <?php echo $post['title']; ?>
            </a>
        </h2>
        <p class="text-gray-700 mt-2">
            <?php echo word_limiter(strip_tags($post['content']), 30); ?>...
        </p>
        <a href="<?php echo site_url('blog/view/'.$post['slug']); ?>" class="text-blue-500 hover:underline mt-2 inline-block">Read More</a>
    </div>
<?php endforeach; ?>

<!-- Pagination -->
<div class="mt-4">
    <?= $this->pagination->create_links(); ?>
</div>
