<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive mt-0">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th width="25px" style="text-align: center;">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal Dibuat</th>
                            <th width="150px" style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($users)): ?>
                            <?php $no = 1; foreach($users as $user): ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $no++; ?></td>
                                    <td><?php echo $user->name; ?></td>
                                    <td><?php echo $user->email; ?></td>
                                    <td><?php echo date('d-m-Y H:i', strtotime($user->created_at)); ?></td>
                                    <td style="text-align: center;">
                                        <div class="btn-group" role="group">
                                            <a href="<?php echo base_url('admin-gttgn/administrator/edit/'.$user->id); ?>" class="btn btn-sm btn-outline-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="<?php echo base_url('admin-gttgn/administrator/delete/'.$user->id); ?>" class="btn btn-sm btn-outline-danger delete-confirm">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
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
