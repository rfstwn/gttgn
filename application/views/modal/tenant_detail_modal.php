<!-- Tenant Detail Modal -->
<div class="modal fade" id="tenantDetailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Tenant</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="tenantDetailContent">
                    <div class="text-center">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <p class="mt-2">Memuat data tenant...</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
function loadTenantDetail(tenantId) {
    // Show loading state
    document.getElementById('tenantDetailContent').innerHTML = `
        <div class="text-center">
            <div class="spinner-border" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
            <p class="mt-2">Memuat data tenant...</p>
        </div>
    `;
    
    // Fetch tenant details via AJAX
    fetch('<?= base_url('user/get_tenant_detail/') ?>' + tenantId)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                displayTenantDetail(data.tenant);
            } else {
                document.getElementById('tenantDetailContent').innerHTML = `
                    <div class="alert alert-danger">
                        <i class="fa fa-exclamation-triangle"></i> ${data.message || 'Gagal memuat data tenant'}
                    </div>
                `;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('tenantDetailContent').innerHTML = `
                <div class="alert alert-danger">
                    <i class="fa fa-exclamation-triangle"></i> Terjadi kesalahan saat memuat data
                </div>
            `;
        });
}

function displayTenantDetail(tenant) {
    const photoUrl = tenant.photo_profile ? 
        '<?= base_url('assets/image/tenant/') ?>' + tenant.photo_profile : 
        '<?= base_url('assets/image/default-tenant.jpg') ?>';
    
    const content = `
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="${photoUrl}" alt="Foto Tenant" class="img-fluid rounded mb-3" style="max-height: 200px; object-fit: cover;">
            </div>
            <div class="col-md-8">
                <table class="table table-borderless">
                    <tr>
                        <td><strong>Nama Tenant:</strong></td>
                        <td>${tenant.nama_tenant || '-'}</td>
                    </tr>
                    <tr>
                        <td><strong>Produk Utama:</strong></td>
                        <td>${tenant.produk_utama || '-'}</td>
                    </tr>
                    <tr>
                        <td><strong>No. Telepon:</strong></td>
                        <td>${tenant.no_telp || '-'}</td>
                    </tr>
                    <tr>
                        <td><strong>Email:</strong></td>
                        <td>${tenant.email ? `<a href="mailto:${tenant.email}">${tenant.email}</a>` : '-'}</td>
                    </tr>
                    <tr>
                        <td><strong>YouTube:</strong></td>
                        <td>${tenant.youtube ? `<a href="${tenant.youtube}" target="_blank">${tenant.youtube}</a>` : '-'}</td>
                    </tr>
                    <tr>
                        <td><strong>Alamat:</strong></td>
                        <td>${tenant.address || '-'}</td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Dibuat:</strong></td>
                        <td>${new Date(tenant.created_at).toLocaleDateString('id-ID', {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric',
                            hour: '2-digit',
                            minute: '2-digit'
                        })}</td>
                    </tr>
                </table>
            </div>
        </div>
        ${tenant.description ? `
            <div class="row mt-3">
                <div class="col-12">
                    <h6><strong>Deskripsi:</strong></h6>
                    <p class="text-muted">${tenant.description}</p>
                </div>
            </div>
        ` : ''}
    `;
    
    document.getElementById('tenantDetailContent').innerHTML = content;
}
</script>
