-- Create informasi_content table for managing information page content
CREATE TABLE IF NOT EXISTS `informasi_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT 'Informasi & Lokasi',
  `description_1` text NOT NULL,
  `description_2` text NOT NULL,
  `address` text NOT NULL,
  `hero_image` varchar(255) DEFAULT 'hero-information.jpg',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default content
INSERT INTO `informasi_content` (`title`, `description_1`, `description_2`, `address`, `hero_image`) VALUES
('Informasi & Lokasi', 
 'GTTGN 2025 yang berlokasi di Kota Cilegon dapat diakses dengan mudah karena lokasinya yang dekat dengan fasilitas umum dan jalan utama.',
 'Siapkan kunjungan Anda ke GTTGN Kota Cilegon dengan mengikuti rute pilihan kami. Lihat peta interaktif dan temukan panduan arah perjalanan melalui tab berikut.',
 'Jalan Jenderal Sudirman, Kelurahan Ramanuju, Kecamatan Purwakarta, Kota Cilegon, Banten 42431',
 'hero-information.jpg');

-- Create transportation table for managing transportation options
CREATE TABLE IF NOT EXISTS `transportation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description_1` text NOT NULL,
  `description_2` text,
  `schedule_note` text,
  `order_position` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_order_active` (`order_position`, `is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insert default transportation data
INSERT INTO `transportation` (`name`, `icon`, `image`, `description_1`, `description_2`, `schedule_note`, `order_position`, `is_active`) VALUES
('Pribadi', 'fa-solid fa-car fa-2xl', 'rute-pribadi.png', 
 'Stasiun terdekat untuk menuju Kota Cirebon adalah Stasiun Cirebon, yang terhubung langsung dengan jalur KA Lokal Rangkasbitung-Merak. Stasiun ini memiliki akses strategis ke pusat kota Cirebon dan terintegrasi dengan berbagai moda transportasi lainnya.',
 'Dari Stasiun Cirebon, Anda dapat melanjutkan perjalanan menggunakan taksi, ojek online, atau angkutan kota untuk mencapai berbagai tujuan di Kota Cirebon, termasuk Alun-Alun Kota Cirebon.',
 NULL, 1, 1),

('Bus', 'fa-solid fa-bus fa-2xl', 'rute-bus.jpg',
 'Tersedia layanan bus dari berbagai kota menuju Cirebon. Terminal bus utama di Cirebon adalah Terminal Harjamukti yang melayani rute dari Jakarta, Bandung, Semarang, dan kota-kota lainnya.',
 'Dari terminal bus, Anda dapat menggunakan angkutan kota atau taksi untuk mencapai pusat kota dan destinasi wisata di Cirebon.',
 NULL, 2, 1),

('Kereta', 'fa-solid fa-train fa-2xl', 'rute-kereta.jpg',
 'Stasiun terdekat untuk menuju Kota Cirebon adalah Stasiun Cirebon, yang terhubung langsung dengan jalur KA Lokal Rangkasbitung-Merak. Stasiun ini memiliki akses strategis ke pusat kota Cirebon dan terintegrasi dengan berbagai moda transportasi lainnya.',
 'Dari Stasiun Cirebon, Anda dapat melanjutkan perjalanan menggunakan taksi, ojek online, atau angkutan kota untuk mencapai berbagai tujuan di Kota Cirebon, termasuk Alun-Alun Kota Cirebon.',
 'Jadwal dan rute dapat berubah-ubah dan dapat berbeda sesuai kebijakan operator transportasi. Silahkan hubungi <a href="#" class="link">disini</a> untuk informasi lebih lanjut.',
 3, 1);
