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
                            <th>Participants</th>
                            <th>Tenants</th>
                            <th>Products</th>
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
                                    <td><?php echo $user->prov_name; ?></td>
                                    <td><?php echo $user->city_name; ?></td>
                                    <td>
                                        <button class="badge bg-primary text-white border-0" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#participantModal" 
                                                data-user-id="<?php echo $user->id; ?>" 
                                                data-user-name="<?php echo htmlspecialchars($user->nama_lengkap); ?>">
                                            <?php echo $user->participant_count; ?>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="badge bg-success text-white border-0" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#tenantModal" 
                                                data-user-id="<?php echo $user->id; ?>" 
                                                data-user-name="<?php echo htmlspecialchars($user->nama_lengkap); ?>">
                                            <?php echo $user->tenant_count; ?>
                                        </button>
                                    </td>
                                    <td>
                                        <button class="badge bg-info text-white border-0" 
                                                data-bs-toggle="modal" 
                                                data-bs-target="#productModal" 
                                                data-user-id="<?php echo $user->id; ?>" 
                                                data-user-name="<?php echo htmlspecialchars($user->nama_lengkap); ?>">
                                            <?php echo $user->product_count; ?>
                                        </button>
                                    </td>
                                    <td><?php echo date('d-m-Y H:i', strtotime($user->created_at)); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="10" class="text-center">Tidak ada data user</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Participant Modal -->
<div class="modal fade" id="participantModal" tabindex="-1" aria-labelledby="participantModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="participantModalLabel">Detail Participants</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="participantContent">
                    <div class="text-center">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tenant Modal -->
<div class="modal fade" id="tenantModal" tabindex="-1" aria-labelledby="tenantModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tenantModalLabel">Detail Tenants</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="tenantContent">
                    <div class="text-center">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Product Modal -->
<div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Detail Products</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="productContent">
                    <div class="text-center">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    // Handle participant modal
    $('#participantModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var userId = button.data('user-id');
        var userName = button.data('user-name');
        
        $('#participantModalLabel').text('Participants - ' + userName);
        
        $.ajax({
            url: '<?= base_url("admin-gttgn/pic/get_participants") ?>',
            type: 'POST',
            data: { user_id: userId },
            success: function(response) {
                $('#participantContent').html(response);
            },
            error: function() {
                $('#participantContent').html('<div class="alert alert-danger">Error loading data</div>');
            }
        });
    });
    
    // Handle tenant modal
    $('#tenantModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var userId = button.data('user-id');
        var userName = button.data('user-name');
        
        $('#tenantModalLabel').text('Tenants - ' + userName);
        
        $.ajax({
            url: '<?= base_url("admin-gttgn/pic/get_tenants") ?>',
            type: 'POST',
            data: { user_id: userId },
            success: function(response) {
                $('#tenantContent').html(response);
            },
            error: function() {
                $('#tenantContent').html('<div class="alert alert-danger">Error loading data</div>');
            }
        });
    });
    
    // Handle product modal
    $('#productModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var userId = button.data('user-id');
        var userName = button.data('user-name');
        
        $('#productModalLabel').text('Products - ' + userName);
        
        $.ajax({
            url: '<?= base_url("admin-gttgn/pic/get_products") ?>',
            type: 'POST',
            data: { user_id: userId },
            success: function(response) {
                $('#productContent').html(response);
            },
            error: function() {
                $('#productContent').html('<div class="alert alert-danger">Error loading data</div>');
            }
        });
    });
});
</script>
