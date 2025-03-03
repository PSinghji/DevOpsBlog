<?php $this->load->view('admin/templates/header'); ?>

<div class="max-w-md mx-auto bg-white p-6 rounded shadow-md mt-10">
    <h2 class="text-2xl font-bold mb-4 text-center">Admin Login</h2>

    <?php if ($this->session->flashdata('error')): ?>
        <p class="text-red-500 text-center"><?= $this->session->flashdata('error'); ?></p>
    <?php endif; ?>

    <form action="<?= site_url('admin/login_process'); ?>" method="post">
        <div class="mb-4">
            <label class="block text-gray-700">Username</label>
            <input type="text" name="username" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Password</label>
            <input type="password" name="password" class="w-full border border-gray-300 p-2 rounded" required>
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Login</button>
    </form>
</div>

<?php $this->load->view('admin/templates/footer'); ?>
