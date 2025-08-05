<section class="section-wrapper">
    <div class="container">
        <h1 class="title main-title text-grey mb-4">Kontak Kami</h1>
        <div class="row align-items-start">
            <div class="col-lg-6 mb-4 mb-md-0" data-aos="fade-right" data-aos-duration="1000">
                <div class="contact-cards">
                    <div class="contact-card">
                        <div class="contact-card-title">
                            <i class="fa fa-map-marker-alt"></i>
                            <h3>Alamat</h3>
                        </div>
                        <p><?= $contact_info['address'] ?></p>
                    </div>
                    <div class="contact-card">
                        <div class="contact-card-title">
                            <i class="fa fa-phone-alt"></i>
                            <h3>Telepon & Fax</h3>
                        </div>
                        <p>Telepon: <?= $contact_info['phone'] ?><br>
                        Fax: <?= $contact_info['fax'] ?></p>
                    </div>
                    <div class="contact-card">
                        <div class="contact-card-title">
                            <i class="fa fa-envelope"></i>
                            <h3>Email & Website</h3>
                        </div>
                        <p>Email: <?= $contact_info['email'] ?><br>
                        Website: <?= $contact_info['website'] ?></p>
                    </div>
                </div>
                <div class="shape-wrapper">
                    <div class="shape-large shape"></div>
                    <div class="shape-medium shape"></div>
                    <div class="shape-small shape"></div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <div class="contact-form-wrapper">
                    <div class="mb-4">
                        <h2 class="page-sub-title title text-green mb-2"><?= $contact_form['title'] ?></h2>
                        <p class="text-grey"><small><?= $contact_form['description'] ?></small></p>
                    </div>
                    
                    
                    
                    <form class="form-wrapper" method="post" action="<?= base_url('kontak/submit') ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" id="name" name="name" class="form-control" 
                                           value="<?= $this->session->flashdata('form_data')['name'] ?? '' ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" 
                                           value="<?= $this->session->flashdata('form_data')['email'] ?? '' ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Telepon</label>
                                    <input type="tel" id="phone" name="phone" class="form-control" 
                                           value="<?= $this->session->flashdata('form_data')['phone'] ?? '' ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject">Subjek</label>
                                    <select id="subject" name="subject" class="form-control" required>
                                        <option value="">Pilih Subjek</option>
                                        <option value="Informasi Umum" <?= ($this->session->flashdata('form_data')['subject'] ?? '') == 'Informasi Umum' ? 'selected' : '' ?>>Informasi Umum</option>
                                        <option value="Pendaftaran" <?= ($this->session->flashdata('form_data')['subject'] ?? '') == 'Pendaftaran' ? 'selected' : '' ?>>Pendaftaran</option>
                                        <option value="Sponsorship" <?= ($this->session->flashdata('form_data')['subject'] ?? '') == 'Sponsorship' ? 'selected' : '' ?>>Sponsorship</option>
                                        <option value="Media" <?= ($this->session->flashdata('form_data')['subject'] ?? '') == 'Media' ? 'selected' : '' ?>>Media</option>
                                        <option value="Lainnya" <?= ($this->session->flashdata('form_data')['subject'] ?? '') == 'Lainnya' ? 'selected' : '' ?>>Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Pesan</label>
                            <textarea id="message" name="message" rows="5" class="form-control" required><?= $this->session->flashdata('form_data')['message'] ?? '' ?></textarea>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" id="privacy" name="privacy" class="form-check-input" required>
                            <label for="privacy" class="form-check-label">Saya setuju bahwa data saya akan disimpan dan diproses sesuai dengan <a href="#">Kebijakan Privasi</a>.</label>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <span>Kirim Pesan</span>
                            <i class="fa fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>