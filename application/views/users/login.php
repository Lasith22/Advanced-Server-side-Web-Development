<?php $this->load->view('templates/header'); ?>

<div class="container mt-5">
    <h2>Login</h2>
    <?php if ($this->session->flashdata('login_failed')) : ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('login_failed'); ?>
        </div>
    <?php endif; ?>
    <?php echo validation_errors(); ?>
    <?php echo form_open('users/login'); ?>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
    <a href="<?php echo site_url('users/register'); ?>" class="btn btn-link">Register here</a>
    <?php echo form_close(); ?>
</div>

<?php $this->load->view('templates/footer'); ?>