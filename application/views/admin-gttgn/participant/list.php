

<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end align-items-center mb-3 gap-2">
                <a href="<?= base_url('admin-gttgn/participant/export_excel') ?>" class="btn btn-success">
                    <i class="fas fa-file-excel"></i> Export Excel
                </a>
                <a href="<?= base_url('admin-gttgn/participant/export_pdf') ?>" class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th style="text-align: center; width: 50px;">No</th>
                            <th>Nama Participant</th>
                            <th>No. WhatsApp</th>
                            <th>Jabatan</th>
                            <th>Status Kehadiran</th>
                            <th>Nama User</th>
                            <th>Lokasi</th>
                            <th>Tanggal Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($participants as $participant): ?>
                            <tr>
                                <td style="text-align: center; width: 50px;" ><?= $no++ ?></td>
                                <td><strong><?= htmlspecialchars($participant->nama_lengkap) ?></strong></td>
                                <td><?= htmlspecialchars($participant->no_whatsapp) ?></td>
                                <td><?= htmlspecialchars($participant->jabatan) ?></td>
                                <td>
                                    <span class="badge <?= $participant->is_present ? 'bg-success' : 'bg-secondary' ?>">
                                        <?= $participant->is_present ? 'Hadir' : 'Tidak Hadir' ?>
                                    </span>
                                </td>
                                <td>
                                    <strong><?= htmlspecialchars($participant->user_name) ?></strong>
                                    <br><small class="text-muted"><?= htmlspecialchars($participant->user_whatsapp) ?></small>
                                </td>
                                <td>
                                    <?php if($participant->city_name && $participant->prov_name): ?>
                                        <?= htmlspecialchars($participant->city_name) ?>, <?= htmlspecialchars($participant->prov_name) ?>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                <td><?= date('d/m/Y H:i', strtotime($participant->created_at)) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>  
