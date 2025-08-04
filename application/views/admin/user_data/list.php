<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Data Registrasi User</h5>
                    <a href="<?php echo base_url('admin/user-data/export'); ?>" class="btn btn-light btn-sm">
                        <i class="fas fa-file-excel"></i> Export Excel
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Tipe Registrasi</th>
                                    <th>Nama Lengkap</th>
                                    <th>No Whatsapp</th>
                                    <th>Asal Daerah</th>
                                    <th>Tanggal Registrasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($users)): ?>
                                    <?php $no = 1; foreach($users as $user): ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td>
                                                <?php 
                                                    if($user->registration_type == 1) {
                                                        echo 'Pemerintah';
                                                    } else {
                                                        echo 'Non-Pemerintah';
                                                    }
                                                ?>
                                            </td>
                                            <td><?php echo $user->nama_lengkap; ?></td>
                                            <td><?php echo $user->no_whatsapp; ?></td>
                                            <td><?php echo $user->asal_daerah; ?></td>
                                            <td><?php echo date('d-m-Y H:i', strtotime($user->created_at)); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Tidak ada data user</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
