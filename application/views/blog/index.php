<?php foreach ($posts as $post) : ?>
    <h2><a href="<?php echo site_url('blog/view/'.$post['slug']); ?>"><?php echo $post['title']; ?></a></h2>
    <p><?php echo substr($post['content'], 0, 100); ?>...</p>
    <hr>
<?php endforeach; ?>
