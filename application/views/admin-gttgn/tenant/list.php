
<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-end align-items-center mb-3 gap-2">
                <a href="<?= base_url('admin-gttgn/tenant/export_excel') ?>" class="btn btn-success">
                    <i class="fas fa-file-excel"></i> Export Excel
                </a>
                <a href="<?= base_url('admin-gttgn/tenant/export_pdf') ?>" class="btn btn-danger">
                    <i class="fas fa-file-pdf"></i> Export PDF
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Tenant</th>
                            <th>Produk Utama</th>
                            <th>No. Telepon</th>
                            <th>Email</th>
                            <th>Nama PIC</th>
                            <th>Lokasi</th>
                            <th>Tanggal Dibuat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach($tenants as $tenant): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <strong><?= htmlspecialchars($tenant->nama_tenant) ?></strong>
                                    <?php if($tenant->photo_profile): ?>
                                        <br><small class="text-muted"><i class="fas fa-image"></i> Ada foto</small>
                                    <?php endif; ?>
                                </td>
                                <td><?= htmlspecialchars($tenant->produk_utama ?: '-') ?></td>
                                <td><?= htmlspecialchars($tenant->no_telp ?: '-') ?></td>
                                <td>
                                    <?php if($tenant->email): ?>
                                        <a href="mailto:<?= $tenant->email ?>"><?= htmlspecialchars($tenant->email) ?></a>
                                    <?php else: ?>
                                        -
                                        <?php endif; ?>
                                </td>
                                <td>
                                    <strong><?= htmlspecialchars($tenant->user_name) ?></strong>
                                    <br><small class="text-muted"><?= htmlspecialchars($tenant->user_whatsapp) ?></small>
                                </td>
                                <td>
                                    <?php if($tenant->city_name && $tenant->prov_name): ?>
                                        <?= htmlspecialchars($tenant->city_name) ?>, <?= htmlspecialchars($tenant->prov_name) ?>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                                <td><?= date('d/m/Y H:i', strtotime($tenant->created_at)) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>  
    </div>
</div> 
