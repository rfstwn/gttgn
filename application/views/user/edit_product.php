<?php 
    ci()->load->view('templates/header', ['title' => 'Edit Produk']); 
    ci()->load->view('templates/nav'); 
?>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Edit Produk</h2>
        <a href="<?= base_url('user/dashboard') ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('user/update_product/' . $product->id) ?>" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tenant_id" class="form-label">Pilih Tenant <span class="text-danger">*</span></label>
                        <select class="form-select" id="tenant_id" name="tenant_id" required>
                            <option value="">-- Pilih Tenant --</option>
                            <?php if(!empty($tenants)): ?>
                                <?php foreach($tenants as $tenant): ?>
                                    <option value="<?= $tenant->id ?>" <?= $tenant->id == $product->tenant_id ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($tenant->nama_tenant) ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Nama Produk <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($product->name) ?>" required>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Produk</label>
                    <textarea class="form-control" id="description" name="description" rows="3"><?= htmlspecialchars($product->description) ?></textarea>
                </div>
                
                <div class="mb-3">
                    <label for="video" class="form-label">Video URL (YouTube/Vimeo)</label>
                    <input type="url" class="form-control" id="video" name="video" value="<?= htmlspecialchars($product->video) ?>" placeholder="https://www.youtube.com/watch?v=...">
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="image_1" class="form-label">Gambar Utama</label>
                        <input type="file" class="form-control" id="image_1" name="image_1" accept="image/*">
                        <div class="form-text">Format: JPG, PNG, GIF. Max: 2MB. Kosongkan jika tidak ingin mengubah.</div>
                        <?php if($product->image_1): ?>
                            <div class="mt-2">
                                <img src="<?= base_url('assets/image/produk/' . $product->image_1) ?>" 
                                     alt="Current Image 1" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                                <small class="text-muted d-block">Gambar saat ini</small>
                            </div>
                        <?php endif; ?>
                        <div id="preview_1" class="mt-2"></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="image_2" class="form-label">Gambar 2</label>
                        <input type="file" class="form-control" id="image_2" name="image_2" accept="image/*">
                        <?php if($product->image_2): ?>
                            <div class="mt-2">
                                <img src="<?= base_url('assets/image/produk/' . $product->image_2) ?>" 
                                     alt="Current Image 2" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                                <small class="text-muted d-block">Gambar saat ini</small>
                            </div>
                        <?php endif; ?>
                        <div id="preview_2" class="mt-2"></div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="image_3" class="form-label">Gambar 3</label>
                        <input type="file" class="form-control" id="image_3" name="image_3" accept="image/*">
                        <?php if($product->image_3): ?>
                            <div class="mt-2">
                                <img src="<?= base_url('assets/image/produk/' . $product->image_3) ?>" 
                                     alt="Current Image 3" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                                <small class="text-muted d-block">Gambar saat ini</small>
                            </div>
                        <?php endif; ?>
                        <div id="preview_3" class="mt-2"></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="image_4" class="form-label">Gambar 4</label>
                        <input type="file" class="form-control" id="image_4" name="image_4" accept="image/*">
                        <?php if($product->image_4): ?>
                            <div class="mt-2">
                                <img src="<?= base_url('assets/image/produk/' . $product->image_4) ?>" 
                                     alt="Current Image 4" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                                <small class="text-muted d-block">Gambar saat ini</small>
                            </div>
                        <?php endif; ?>
                        <div id="preview_4" class="mt-2"></div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="image_5" class="form-label">Gambar 5</label>
                        <input type="file" class="form-control" id="image_5" name="image_5" accept="image/*">
                        <?php if($product->image_5): ?>
                            <div class="mt-2">
                                <img src="<?= base_url('assets/image/produk/' . $product->image_5) ?>" 
                                     alt="Current Image 5" class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                                <small class="text-muted d-block">Gambar saat ini</small>
                            </div>
                        <?php endif; ?>
                        <div id="preview_5" class="mt-2"></div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="katalog" class="form-label">Katalog (PDF/DOC)</label>
                        <input type="file" class="form-control" id="katalog" name="katalog" accept=".pdf,.doc,.docx">
                        <div class="form-text">Format: PDF, DOC, DOCX. Max: 2MB. Kosongkan jika tidak ingin mengubah.</div>
                        <?php if($product->katalog): ?>
                            <div class="mt-2">
                                <a href="<?= base_url('assets/image/produk/' . $product->katalog) ?>" target="_blank" class="btn btn-sm btn-outline-success">
                                    <i class="fas fa-file-pdf"></i> Lihat Katalog Saat Ini
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="d-flex justify-content-end gap-2">
                    <a href="<?= base_url('user/dashboard') ?>" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Update Produk</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php ci()->load->view('templates/footer'); ?>

<script>
// Image preview functionality
for (let i = 1; i <= 5; i++) {
    document.getElementById('image_' + i).addEventListener('change', function(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('preview_' + i);
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = '<img src="' + e.target.result + '" class="img-thumbnail" style="max-width: 100px; max-height: 100px;"><small class="text-muted d-block">Preview gambar baru</small>';
            };
            reader.readAsDataURL(file);
        } else {
            preview.innerHTML = '';
        }
    });
}
</script>
