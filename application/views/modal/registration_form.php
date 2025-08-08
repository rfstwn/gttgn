<!-- Registration Sliding Panel -->
<div class="registration-panel" id="registrationPanel">
    <div class="registration-body">
        <h3 class="title page-sub-title text-green mb-2">Registrasi</h3>
        <p class="text-grey mb-4"><small>Lengkapi data diri Anda untuk mendaftar</small></p>
        <button type="button" class="btn-close btn-close-modal" id="closeRegistration"></button>
        <form id="registrationForm" class="form-wrapper" action="<?= base_url('user/register') ?>" method="post">
            <div class="registration-type">
                <div class="form-check mb-1">
                    <input class="form-check-input" type="radio" name="registrationType" id="pemerintahan" value="1" checked>
                    <label class="form-check-label" for="pemerintahan">
                        Pemerintahan
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="registrationType" id="nonPemerintahan" value="2">
                    <label class="form-check-label" for="nonPemerintahan">
                        Non Pemerintahan
                    </label>
                </div>
            </div>
            
            <div class="form-group">
                <label for="namaLengkap">Nama Lengkap <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="namaLengkap" name="nama_lengkap" value="<?= set_value('nama_lengkap') ?>" placeholder="Nama Lengkap" required>
                <div class="text-danger"><?= form_error('nama_lengkap') ?></div>
            </div>
            
            <div class="form-group">
                <label for="no_whatsapp">No Whatsapp <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="no_whatsapp" name="no_whatsapp" value="<?= set_value('no_whatsapp') ?>" required>
                <div class="text-danger"><?= form_error('no_whatsapp') ?></div>
            </div>
            
            <div class="form-group">
                <label for="password">Password <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password" name="password" minlength="6" required>
                <small class="form-text text-muted">Minimal 6 karakter</small>
                <div class="text-danger"><?= form_error('password') ?></div>
            </div>
            
            <div class="form-group">
                <label for="province_id">Provinsi <span class="text-danger">*</span></label>
                <select class="form-control" id="province_id" name="province_id" required>
                    <option value="">Pilih Provinsi</option>
                    <?php if(isset($provinces) && is_array($provinces)): ?>
                        <?php foreach ($provinces as $province) : ?>
                            <option value="<?= $province->prov_id ?>" <?= set_select('province_id', $province->prov_id) ?>>
                                <?= htmlspecialchars($province->prov_name) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <div class="text-danger"><?= form_error('province_id') ?></div>
            </div>
            
            <div class="form-group">
                <label for="city_id">Kota/Kabupaten <span class="text-danger">*</span></label>
                <select class="form-control" id="city_id" name="city_id" required>
                    <option value="">Pilih Provinsi terlebih dahulu</option>
                </select>
                <div class="text-danger"><?= form_error('city_id') ?></div>
            </div>
            
            <div class="form-group">
                <label for="kodeUnik">Kode Unik <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="kodeUnik" name="kode_unik" value="<?= set_value('kode_unik') ?>" placeholder="Kode Unik" required>
                <small id="kodeUnikHelp" class="form-text text-muted">Masukkan kode unik GTTGNXXVI</small>
                <div class="text-danger"><?= form_error('kode_unik') ?></div>
                <div id="kodeUnikError" class="invalid-feedback">Kode unik harus GTTGNXXVI</div>
            </div>
            
            <button type="submit" class="btn btn-primary mb-2" id="submitBtn">Submit Form</button>

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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('registrationForm');
        const kodeUnikInput = document.getElementById('kodeUnik');
        const kodeUnikError = document.getElementById('kodeUnikError');
        const submitBtn = document.getElementById('submitBtn');
        const provinceSelect = document.getElementById('province_id');
        const citySelect = document.getElementById('city_id');
        
        // Validate kode unik on input
        kodeUnikInput.addEventListener('input', validateKodeUnik);
        
        // Handle province selection change
        provinceSelect.addEventListener('change', function() {
            const provinceId = this.value;
            loadCities(provinceId);
        });
        
        // Validate form on submit
        form.addEventListener('submit', function(event) {
            if (!validateKodeUnik()) {
                event.preventDefault();
            }
        });
        get_province();
        // Load provinces for registration form
        function get_province(){
            provinceSelect.innerHTML = '<option value="">Loading...</option>';
            provinceSelect.disabled = true;

            fetch('<?= base_url('api/get_provinces/') ?>')
                .then(response => response.json())
                .then(data => {
                    provinceSelect.innerHTML = '<option value="">Pilih Provinsi</option>';
                    
                    if (data.status === 'success' && data.data) {
                        data.data.forEach(province => {
                            const option = document.createElement('option');
                            option.value = province.prov_id;
                            option.textContent = province.prov_name;
                            provinceSelect.appendChild(option);
                        });
                        provinceSelect.disabled = false;
                    } else {
                        provinceSelect.innerHTML = '<option value="">Tidak ada provinsi tersedia</option>';
                    }
                })
                .catch(error => {
                    console.error('Error loading provinces:', error);
                    provinceSelect.innerHTML = '<option value="">Error loading provinces</option>';
                });
        }

        
        function validateKodeUnik() {
            const expectedCode = 'GTTGNXXVI';
            const inputValue = kodeUnikInput.value.trim();
            
            if (inputValue === expectedCode) {
                kodeUnikInput.classList.remove('is-invalid');
                kodeUnikInput.classList.add('is-valid');
                kodeUnikError.style.display = 'none';
                return true;
            } else {
                kodeUnikInput.classList.remove('is-valid');
                kodeUnikInput.classList.add('is-invalid');
                kodeUnikError.style.display = 'block';
                return false;
            }
        }
        
        function loadCities(provinceId) {
            // Clear current city options
            citySelect.innerHTML = '<option value="">Loading...</option>';
            citySelect.disabled = true;
            
            if (!provinceId) {
                citySelect.innerHTML = '<option value="">Pilih Provinsi terlebih dahulu</option>';
                citySelect.disabled = true;
                return;
            }
            
            // Fetch cities via AJAX
            fetch('<?= base_url('api/get_cities/') ?>' + provinceId)
                .then(response => response.json())
                .then(data => {
                    citySelect.innerHTML = '<option value="">Pilih Kota/Kabupaten</option>';
                    
                    if (data.status === 'success' && data.data) {
                        data.data.forEach(city => {
                            const option = document.createElement('option');
                            option.value = city.city_id;
                            option.textContent = city.city_name;
                            citySelect.appendChild(option);
                        });
                        citySelect.disabled = false;
                    } else {
                        citySelect.innerHTML = '<option value="">Tidak ada kota tersedia</option>';
                    }
                })
                .catch(error => {
                    console.error('Error loading cities:', error);
                    citySelect.innerHTML = '<option value="">Error loading cities</option>';
                });
        }
    });
</script>