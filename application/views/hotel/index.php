<?php
ci()->load->view('templates/header', ['title' => 'Hotel']);
ci()->load->view('templates/nav');
//-- End Informasi Content --

// Sample hotel data - in a real application, this would come from a database
$hotels = [
    [
        'name' => 'Grand Hotel Gatteng',
        'image' => 'assets/image/hotel/hotel-1.jpg', // Placeholder image path
        'address' => 'Jl. Raya Gatteng No. 123, Gatteng',
        'phone' => '+62 123-456-7890',
        'star' => '5',
        'latitude' => '-7.123456',
        'longitude' => '110.123456'
    ],
    [
        'name' => 'Gatteng Boutique Hotel',
        'image' => 'assets/image/hotel/hotel-2.jpg', // Placeholder image path
        'address' => 'Jl. Pemuda No. 45, Gatteng',
        'phone' => '+62 123-456-7891',
        'star' => '4',
        'latitude' => '-7.234567',
        'longitude' => '110.234567'
    ],
    [
        'name' => 'Gatteng Resort & Spa',
        'image' => 'assets/image/hotel/hotel-3.jpg', // Placeholder image path
        'address' => 'Jl. Pantai Indah No. 78, Gatteng',
        'phone' => '+62 123-456-7892',
        'star' => '4',
        'latitude' => '-7.345678',
        'longitude' => '110.345678'
    ],
    [
        'name' => 'Gatteng Inn',
        'image' => 'assets/image/hotel/hotel-4.jpg', // Placeholder image path
        'address' => 'Jl. Pahlawan No. 56, Gatteng',
        'phone' => '+62 123-456-7893',
        'star' => '3',
        'latitude' => '-7.456789',
        'longitude' => '110.456789'
    ],
    [
        'name' => 'Sartika Hotel',
        'image' => 'assets/image/hotel/hotel-5.jpg', // Placeholder image path
        'address' => 'Jl. Bumi Bintan No. 56, Bintan',
        'phone' => '+62 123-456-7893',
        'star' => '4',
        'latitude' => '-7.456789',
        'longitude' => '110.456789'
    ],
    [
        'name' => 'Bintan Hotel',
        'image' => 'assets/image/hotel/hotel-6.jpg', // Placeholder image path
        'address' => 'Jl. Serpong No. 56, Serpong',
        'phone' => '+62 123-456-7893',
        'star' => '5',
        'latitude' => '-7.456789',
        'longitude' => '110.456789'
    ]
];
?>
<div class="hero-wrapper-general">
    <img src="<?= base_url('assets/image/hero-hotel.jpg') ?>" alt="Hotel Hero">
</div>
<div class="container">
    <div class="section-wrapper">
        <h1 class="title main-title text-grey mb-4">Hotel<br />Terdekat</h1>
        
        <div class="hotel-list">
            <div class="row">
                <?php foreach ($hotels as $hotel): ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="hotel-card">
                            <div class="hotel-card__image">
                                <img src="<?= base_url($hotel['image']) ?>" alt="<?= $hotel['name'] ?>" onerror="this.src='<?= base_url('assets/image/placeholder.jpg') ?>'">

                                <div class="hotel-card__image__star">
                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                        <i class="fas fa-star <?= $i <= $hotel['star'] ? 'hotel-card__image__star-active' : 'hotel-card__image__star-inactive' ?> "></i>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <div class="hotel-card__content">
                                <h3 class="hotel-card__name"><?= $hotel['name'] ?></h3>
                                <div class="hotel-card__info">
                                    <div class="hotel-card__info-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span><?= $hotel['address'] ?></span>
                                    </div>
                                    <div class="hotel-card__info-item">
                                        <i class="fas fa-phone"></i>
                                        <span><?= $hotel['phone'] ?></span>
                                    </div>
                                </div>
                                <a href="https://www.google.com/maps/dir/?api=1&destination=<?= $hotel['latitude'] ?>,<?= $hotel['longitude'] ?>" 
                                   class="hotel-card__direction-btn" 
                                   target="_blank" 
                                   rel="noopener noreferrer">
                                    <i class="fas fa-directions"></i> Petunjuk Arah
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
<?php
ci()->load->view('templates/footer');
