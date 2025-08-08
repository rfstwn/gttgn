<div class="modal modal-md fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mb-4">
                <h3 class="page-sub-title title text-green mb-2">Login</h3>
                <p class="text-grey"><small>Masukkan no. whatsapp dan password Anda</small></p>
                </div>
                <button type="button" class="btn-close btn-close-modal" data-bs-dismiss="modal"></button>
                <form class="form-wrapper" id="loginForm" action="<?= base_url('user/login') ?>" method="post">
                    <div class="form-group">
                        <label for="no_whatsapp">No. Whatsapp</label>
                        <input type="number" placeholder="No. Whatsapp" class="form-control" id="no_whatsapp" name="no_whatsapp" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="password-wrapper">
                            <input type="password" placeholder="Password" class="form-control" id="password" name="password" required>
                            <button class="btn btn-outline-secondary toggle-password" type="button" tabindex="-1">
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Login</button>
                    <div class="cta_daftar">
                        <span><small>Belum punya akun?</small> <a href="#" id="openRegistration">Daftar disini</a></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>