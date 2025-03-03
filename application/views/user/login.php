<?php $this->load->view('templates/header'); ?>

<div class="max-w-md mx-auto bg-white p-6 rounded shadow-md mt-10">
    <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>

    <?php if ($this->session->flashdata('error')): ?>
        <p class="text-red-500 text-center"><?= $this->session->flashdata('error'); ?></p>
    <?php endif; ?>

    <?= form_open('user/login_process'); ?>
        <label class="block">Email</label>
        <input type="email" name="email" class="w-full border p-2 rounded mb-3" required>

        <label class="block">Password</label>
        <input type="password" name="password" class="w-full border p-2 rounded mb-3" required>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded w-full">Login</button>
    <?= form_close(); ?>

    <p class="text-center mt-4">Don't have an account? <a href="<?= site_url('user/register'); ?>" class="text-blue-500">Register here</a></p>
</div>

<?php $this->load->view('templates/footer'); ?>
