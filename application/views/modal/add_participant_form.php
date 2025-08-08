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
                        <select name="jabatan" id="participant_jabatan" class="form-select" required>
                            <option value="">-- Pilih Jabatan --</option>
                            <?php foreach($jabatan as $jabatan): ?>
                                <option value="<?= $jabatan ?>"><?= $jabatan ?></option>
                            <?php endforeach; ?>
                        </select>
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