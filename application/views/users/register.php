<?php $this->load->view('templates/header'); ?>

<div class="container mt-5">
    <h2>Register</h2>
    <?php echo validation_errors(); ?>
    <?php echo form_open('users/register'); ?>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
    <?php echo form_close(); ?>
</div>

<?php $this->load->view('templates/footer'); ?>