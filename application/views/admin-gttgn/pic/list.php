<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th width="15px" style="text-align: center;">No</th>
                            <th>Tipe Registrasi</th>
                            <th>Nama Lengkap</th>
                            <th>No Whatsapp</th>
                            <th>Provinsi</th>
                            <th>Kota/Kabupaten</th>
                            <th>Tanggal Registrasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($users)): ?>
                            <?php $no = 1; foreach($users as $user): ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $no++; ?></td>
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
                                    <td><?php echo $user->prov_id->prov_name; ?></td>
                                    <td><?php echo $user->city_id->city_name; ?></td>
                                    <td><?php echo date('d-m-Y H:i', strtotime($user->created_at)); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data user</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
