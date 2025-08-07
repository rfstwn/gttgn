<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Dashboard PIC</h2>
        <span class="me-3">Selamat datang, <strong><?= $user->nama_lengkap ?></strong></span>
    </div>

    <div class="row">
        <!-- User Participants Section -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Paserta</h5>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addParticipantModal">
                        <i class="fas fa-plus"></i> Tambah Participant
                    </button>
                </div>
                <div class="card-body">
                    <?php if(empty($participants)): ?>
                        <p class="text-muted">Belum ada participant yang ditambahkan.</p>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <th>No. WhatsApp</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($participants as $participant): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($participant->nama_lengkap) ?></td>
                                            <td><?= htmlspecialchars($participant->no_whatsapp) ?></td>
                                            <td><?= htmlspecialchars($participant->jabatan) ?></td>
                                            <td>
                                                <span class="badge <?= $participant->is_present ? 'bg-success' : 'bg-secondary' ?>">
                                                    <?= $participant->is_present ? 'Hadir' : 'Tidak Hadir' ?>
                                                </span>
                                            </td>
                                            <td><?= date('d/m/Y H:i', strtotime($participant->created_at)) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <!-- Tenants Section -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">List Tenant</h5>
                    <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#addTenantModal">
                        <i class="fas fa-plus"></i> Tambah Tenant
                    </button>
                </div>
                <div class="card-body">
                    <?php if(empty($tenants)): ?>
                        <p class="text-muted">Belum ada tenant yang ditambahkan.</p>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Nama Tenant</th>
                                        <th>Tanggal Dibuat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($tenants as $tenant): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($tenant->nama_tenant) ?></td>
                                            <td><?= date('d/m/Y H:i', strtotime($tenant->created_at)) ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Participant Modal -->
<div class="modal fade" id="addParticipantModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Participant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('user/add_participant') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="participant_nama_lengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="participant_nama_lengkap" name="nama_lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label for="participant_no_whatsapp" class="form-label">No. WhatsApp</label>
                        <input type="number" class="form-control" id="participant_no_whatsapp" name="no_whatsapp" required>
                    </div>
                    <div class="mb-3">
                        <label for="participant_jabatan" class="form-label">Jabatan</label>
                        <input type="text" class="form-control" id="participant_jabatan" name="jabatan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Participant</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Tenant Modal -->
<div class="modal fade" id="addTenantModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Tenant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('user/add_tenant') ?>" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="tenant_nama_tenant" class="form-label">Nama Tenant</label>
                        <input type="text" class="form-control" id="tenant_nama_tenant" name="nama_tenant" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan Tenant</button>
                </div>
            </form>
        </div>
    </div>
</div>
