<!-- Registration Sliding Panel -->
<div class="registration-panel" id="registrationPanel">
    <div class="registration-body">
        <h3 class="title page-sub-title text-green mb-2">Registrasi</h3>
        <p class="text-grey mb-4"><small>Lengkapi data diri Anda untuk mendaftar</small></p>
        <button type="button" class="btn-close btn-close-modal" id="closeRegistration"></button>
        <form id="registrationForm" class="form-wrapper" action="<?= base_url('auth/register') ?>" method="post">
            <div class="registration-type">
                <div class="form-check mb-1">
                    <input class="form-check-input" type="radio" name="registrationType" id="pemerintahan" value="pemerintahan" checked>
                    <label class="form-check-label" for="pemerintahan">
                        Pemerintahan
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="registrationType" id="nonPemerintahan" value="non-pemerintahan">
                    <label class="form-check-label" for="nonPemerintahan">
                        Non Pemerintahan
                    </label>
                </div>
            </div>
            
            <div class="form-group">
                <label for="namaLengkap">Nama Lengkap</label>
                <input type="text" class="form-control" id="namaLengkap" name="nama_lengkap" placeholder="Nama Lengkap" required>
            </div>
            
            <div class="form-group">
                <label for="noWhatsapp">No Whatsapp</label>
                <input type="text" class="form-control" id="noWhatsapp" name="no_whatsapp" placeholder="No Whatsapp" required>
            </div>
            
            <div class="form-group">
                <label for="asalDaerah">Asal Daerah</label>
                <input type="text" class="form-control" id="asalDaerah" name="asal_daerah" placeholder="Asal Daerah (Provinsi / Kabupaten/Kota)" required>
            </div>
            
            <div class="form-group">
                <label for="kodeUnik">Kode Unik</label>
                <input type="text" class="form-control" id="kodeUnik" name="kode_unik" placeholder="Kode Unik" required>
            </div>
            
            <button type="submit" class="btn btn-primary mb-2">Submit Form</button>

            <div class="text-center">
                <span>
                    <small>
                        Sudah Punya Akun? 
                        <a data-bs-toggle="modal" data-bs-target="#loginModal" href="#" class="text-decoration-none cursor-pointer">Login</a>
                    </small>
                </span>
            </div>
        </form>
    </div>
</div>
