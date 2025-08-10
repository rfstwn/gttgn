<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <form action="<?= base_url('admin-gttgn/whatsapp/send_blast') ?>" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="subject" class="form-label">
                                Subject <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="subject" name="subject" 
                                    placeholder="Masukkan subject pesan..." required>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="message" class="form-label">
                                Pesan <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control" id="message" name="message" rows="8" 
                                        placeholder="Masukkan pesan yang akan dikirim..." required></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-secondary me-md-2" onclick="clearForm()">
                                <i class="fas fa-eraser"></i> Clear
                            </button>
                            <button type="submit" class="btn btn-success">
                                <i class="fab fa-whatsapp"></i> Kirim Blast
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function clearForm() {
    document.getElementById('subject').value = '';
    document.getElementById('message').value = '';
}
</script>
