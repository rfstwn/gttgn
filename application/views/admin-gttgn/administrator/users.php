<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Daftar User Admin</h5>
                    <a href="<?php echo base_url('admin-gttgn/administrator/add'); ?>" class="btn btn-light btn-sm">
                        <i class="fas fa-plus"></i> Tambah User
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($users)): ?>
                                    <?php $no = 1; foreach($users as $user): ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $user->name; ?></td>
                                            <td><?php echo $user->email; ?></td>
                                            <td><?php echo date('d-m-Y H:i', strtotime($user->created_at)); ?></td>
                                            <td>
                                                <a href="<?php echo base_url('admin-gttgn/administrator/edit/'.$user->id); ?>" class="btn btn-sm btn-info btn-action">
                                                    <i class="fas fa-edit"></i> Edit
                                                </a>
                                                <a href="<?php echo base_url('admin-gttgn/administrator/delete/'.$user->id); ?>" class="btn btn-sm btn-danger btn-action delete-confirm">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Tidak ada data user</td>
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
