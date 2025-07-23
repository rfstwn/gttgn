
<div class="section-wrapper">
    <h2 class="title second-title text-green mb-5">Transportasi</h2>
    <section class="d-flex flex-column flex-md-row align-items-start gap-4 transportation-section">
        <div class="transportation-tabs-menu">
            <div class="transport-icon-item active" data-target="pribadi" data-aos="zoom-in" data-aos-duration="1000">
                <div class="icon-container">
                    <i class="fa-solid fa-car fa-2xl"></i>
                </div>
                <p>Pribadi</p>
            </div>
            <div class="transport-icon-item" data-target="bus" data-aos="zoom-in" data-aos-duration="1000">
                <div class="icon-container">
                    <i class="fa-solid fa-bus fa-2xl"></i>
                </div>
                <p>Bus</p>
            </div>
            <div class="transport-icon-item" data-target="kereta" data-aos="zoom-in" data-aos-duration="1000">
                <div class="icon-container">
                    <i class="fa-solid fa-train fa-2xl"></i>
                </div>
                <p>Kereta</p>
            </div>
        </div>
        <div class="transportation-content">
            <div class="transport-content-item active" id="pribadi">
                <div class="transport-image">
                    <img src="<?= base_url('assets/image/rute-pribadi.png') ?>" alt="Pribadi">
                </div>
                <div class="transport-info">
                    <h3>Pribadi</h3>
                    <p>Stasiun terdekat untuk menuju Kota Cirebon adalah Stasiun Cirebon, yang terhubung langsung dengan jalur KA Lokal Rangkasbitung-Merak. Stasiun ini memiliki akses strategis ke pusat kota Cirebon dan terintegrasi dengan berbagai moda transportasi lainnya.</p>
                    <p>Dari Stasiun Cirebon, Anda dapat melanjutkan perjalanan menggunakan taksi, ojek online, atau angkutan kota untuk mencapai berbagai tujuan di Kota Cirebon, termasuk Alun-Alun Kota Cirebon.</p>
                </div>
            </div>
            
            <div class="transport-content-item" id="bus">
                <div class="transport-image">
                    <img src="<?= base_url('assets/image/rute-bus.jpg') ?>" alt="Bus">
                </div>
                <div class="transport-info">
                    <h3>Bus</h3>
                    <p>Tersedia layanan bus dari berbagai kota menuju Cirebon. Terminal bus utama di Cirebon adalah Terminal Harjamukti yang melayani rute dari Jakarta, Bandung, Semarang, dan kota-kota lainnya.</p>
                    <p>Dari terminal bus, Anda dapat menggunakan angkutan kota atau taksi untuk mencapai pusat kota dan destinasi wisata di Cirebon.</p>
                </div>
            </div>
            
            <div class="transport-content-item" id="kereta">
                <div class="transport-image">
                    <img src="<?= base_url('assets/image/rute-kereta.jpg') ?>" alt="Kereta">
                </div>
                <div class="transport-info">
                    <h3>Kereta</h3>
                    <p>Stasiun terdekat untuk menuju Kota Cirebon adalah Stasiun Cirebon, yang terhubung langsung dengan jalur KA Lokal Rangkasbitung-Merak. Stasiun ini memiliki akses strategis ke pusat kota Cirebon dan terintegrasi dengan berbagai moda transportasi lainnya.</p>
                    <p>Dari Stasiun Cirebon, Anda dapat melanjutkan perjalanan menggunakan taksi, ojek online, atau angkutan kota untuk mencapai berbagai tujuan di Kota Cirebon, termasuk Alun-Alun Kota Cirebon.</p>
                    
                    <div class="schedule-note">
                        <p><small>Jadwal dan rute dapat berubah-ubah dan dapat berbeda sesuai kebijakan operator transportasi. Silahkan hubungi <a href="#" class="link">disini</a> untuk informasi lebih lanjut.</small></p>
                    </div>
                </div>
            </div>
        </div>        
    </section>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tabItems = document.querySelectorAll('.transport-icon-item');
    const contentItems = document.querySelectorAll('.transport-content-item');
    
    tabItems.forEach(item => {
        item.addEventListener('click', function() {
            // Remove active class from all tabs
            tabItems.forEach(tab => tab.classList.remove('active'));
            
            // Add active class to clicked tab
            this.classList.add('active');
            
            // Hide all content items
            contentItems.forEach(content => content.classList.remove('active'));
            
            // Show the corresponding content
            const target = this.getAttribute('data-target');
            document.getElementById(target).classList.add('active');
        });
    });
});
</script>
