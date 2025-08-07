<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <?php echo form_open('admin-gttgn/administrator/add_process'); ?>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name" class="form-control" value="<?php echo set_value('name'); ?>" required>
                    <?php echo form_error('name', '<small class="text-danger">', '</small>'); ?>
                </div>
                
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?php echo set_value('email'); ?>" required>
                    <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                    <?php echo form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>
                
                <div class="form-group">
                    <label for="confirm_password">Konfirmasi Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                    <?php echo form_error('confirm_password', '<small class="text-danger">', '</small>'); ?>
                </div>
                
                <div class="d-flex justify-content-between align-items-center">
                    <a href="<?php echo base_url('admin-gttgn/administrator'); ?>" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
