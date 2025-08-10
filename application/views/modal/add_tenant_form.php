
<!-- Add Tenant Modal -->
<div class="modal fade" id="addTenantModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Tenant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="<?= base_url('user/add_tenant') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tenant_nama_tenant" class="form-label">Nama Tenant <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="tenant_nama_tenant" name="nama_tenant" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tenant_produk_utama" class="form-label">Produk Utama</label>
                                <input type="text" class="form-control" id="tenant_produk_utama" name="produk_utama" placeholder="Contoh: Pertanian, Industri">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tenant_no_telp" class="form-label">No. Telepon</label>
                                <input type="text" class="form-control" id="tenant_no_telp" name="no_telp">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tenant_email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="tenant_email" name="email">
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="tenant_youtube" class="form-label">YouTube URL</label>
                        <input type="url" class="form-control" id="tenant_youtube" name="youtube" placeholder="https://youtube.com/...">
                    </div>
                    
                    <div class="mb-3">
                        <label for="tenant_address" class="form-label">Alamat</label>
                        <textarea class="form-control" id="tenant_address" name="address" rows="3"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label for="tenant_photo_profile" class="form-label">Foto Profile</label>
                        <input type="file" class="form-control" id="tenant_photo_profile" name="photo_profile" accept="image/*">
                        <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal 2MB</small>
                        <div id="tenant_photo_preview" class="mt-2" style="display: none;">
                            <img id="tenant_preview_img" src="" alt="Preview" style="max-width: 200px; max-height: 200px; object-fit: cover;" class="img-thumbnail">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="tenant_description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="tenant_description" name="description" rows="4"></textarea>
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

<script>
// Image preview for tenant photo
document.getElementById('tenant_photo_profile').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('tenant_preview_img').src = e.target.result;
            document.getElementById('tenant_photo_preview').style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        document.getElementById('tenant_photo_preview').style.display = 'none';
    }
});
</script>
