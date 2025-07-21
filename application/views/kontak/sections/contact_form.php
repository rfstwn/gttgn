<section class="contact-form-section">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1000">
                <div class="contact-cards">
                    <div class="contact-card">
                        <div class="card-title">
                            <i class="fa fa-map-marker-alt"></i>
                            <h3>Alamat</h3>
                        </div>
                        <p><?= $contact_info['address'] ?></p>
                    </div>
                    <div class="contact-card">
                        <div class="card-title">
                            <i class="fa fa-phone-alt"></i>
                            <h3>Telepon & Fax</h3>
                        </div>
                        <p>Telepon: <?= $contact_info['phone'] ?><br>
                        Fax: <?= $contact_info['fax'] ?></p>
                    </div>
                    <div class="contact-card">
                        <div class="card-title">
                            <i class="fa fa-envelope"></i>
                            <h3>Email & Website</h3>
                        </div>
                        <p>Email: <?= $contact_info['email'] ?><br>
                        Website: <?= $contact_info['website'] ?></p>
                    </div>
                </div>
                <div class="form-image">
                    <div class="shape-large shape"></div>
                    <div class="shape-small shape"></div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <div class="contact-form-wrapper">
                    <div class="form-header">
                        <h2><?= $contact_form['title'] ?></h2>
                        <p><?= $contact_form['description'] ?></p>
                    </div>
                    <form id="contactForm" class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" id="name" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Telepon</label>
                                    <input type="tel" id="phone" name="phone" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject">Subjek</label>
                                    <select id="subject" name="subject" class="form-control" required>
                                        <option value="">Pilih Subjek</option>
                                        <option value="Informasi Umum">Informasi Umum</option>
                                        <option value="Pendaftaran">Pendaftaran</option>
                                        <option value="Sponsorship">Sponsorship</option>
                                        <option value="Media">Media</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Pesan</label>
                            <textarea id="message" name="message" rows="5" class="form-control" required></textarea>
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

<style>
.contact-form-section {
    padding: 75px 0;
    background-color: #f9f9f9;
    position: relative;
    overflow: hidden;
}

.form-image {
    position: relative;
    z-index: 1;
}

@keyframes float {
    0% {
        transform: translateY(0px);
    }
    50% {
        transform: translateY(-15px);
    }
    100% {
        transform: translateY(0px);
    }
}

.shape {
    position: absolute;
    z-index: 1;
    animation: float 3s ease-in-out infinite;
    opacity: 0.1;
    border-radius: 50%;
    background-color: #286061;
}

.shape-large {
    top: -30px;
    left: 0px;
    width: 200px;
    height: 200px;
}

.shape-small {
    bottom: -50px;
    right: 30px;
    width: 100px;
    height: 100px;
}

.contact-form-wrapper {
    background-color: #fff;
    padding: 16px;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
}

.form-header {
    margin-bottom: 30px;
}

.form-header h2 {
    font-size: 2rem;
    font-weight: 700;
    color: #333;
    position: relative;
    display: inline-block;
}

.form-header p {
    font-size: 1rem;
    color: #666;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-size: 0.9rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 8px;
}

.form-control {
    width: 100%;
    padding: 12px 15px;
    font-size: 1rem;
    border: 1px solid #ddd;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #286061;
    box-shadow: 0 0 0 3px rgba(255, 87, 34, 0.1);
    outline: none;
}

.form-check {
    margin-bottom: 20px;
}

.form-check-input {
    margin-right: 10px;
}

.form-check-label {
    font-size: 0.9rem;
    color: #666;
}

.form-check-label a {
    color: #286061;
    text-decoration: none;
}

.form-check-label a:hover {
    text-decoration: underline;
}

.btn-primary {
    background-color: #286061;
    border: 2px solid #286061;
    color: #fff;
    padding: 12px 30px;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 50px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    cursor: pointer;
    width: 100%;
}

.btn-primary span {
    margin-right: 10px;
    color: #fff;
}

.btn-primary:hover {
    background-color: #286061;
    border-color: #286061;
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(255, 87, 34, 0.2);
}

.contact-cards{
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
}
.contact-card {
    position: relative;
    width: 100%;
    padding: 16px;
    border-radius: 10px;
    background: linear-gradient(90deg,rgba(240, 240, 240, 1) 0%, rgba(250, 250, 250, 0) 100%);
}

.card-title {
    width: 100%;
    display: flex;
    align-items: baseline;
    justify-content: start;
}

.card-title i {
    font-size: 50px;
    color: #f0f0f0;
    transition: all 0.3s ease;
    line-height: 1;
    position: absolute;
    top:10px;
    right:10px;
}

.contact-card h3 {
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1;
}

.contact-card p {
    font-size: 1rem;
    color: #666;
    transition: all 0.3s ease;
    line-height: 1.5;
    margin:0;
}
</style>