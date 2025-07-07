<!-- Registration Sliding Panel -->
<div class="registration-panel" id="registrationPanel">
    <div class="registration-body">
        <h3 class="title second-title text-green">Registrasi</h3>
        <button type="button" class="btn-close btn-close-registrationLogin" id="closeRegistration"></button>
        <form id="registrationForm" action="<?= base_url('auth/register') ?>" method="post">
            <div class="registration-type">
                <div class="form-check">
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
                <input type="text" class="form-control" id="namaLengkap" name="nama_lengkap" placeholder="Nama Lengkap" required>
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control" id="noWhatsapp" name="no_whatsapp" placeholder="No Whatsapp" required>
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control" id="asalDaerah" name="asal_daerah" placeholder="Asal Daerah (Provinsi / Kabupaten/Kota)" required>
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control" id="kodeUnik" name="kode_unik" placeholder="Kode Unik" required>
            </div>
            
            <div class="form-group mt-5">
                <button type="submit" class="btn btn-primary">Submit Form</button>
            </div>

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
