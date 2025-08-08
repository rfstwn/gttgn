
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
