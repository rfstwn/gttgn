<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Informasi extends MY_Controller
{
    public function index()
    {
        $data['event_details'] = [
            'title' => 'Gelar Teknologi Tepat Guna Nasional 2025',
            'date' => '14 - 17 Juli 2025',
            'location' => 'Indonesia Convention Exhibition (ICE) BSD City',
            'description' => 'Gelar Teknologi Tepat Guna Nasional (GTTGN) 2025 merupakan ajang pameran teknologi tepat guna terbesar di Indonesia yang diselenggarakan oleh Kementerian Desa, Pembangunan Daerah Tertinggal dan Transmigrasi. Acara ini bertujuan untuk memperkenalkan dan mempromosikan berbagai inovasi teknologi tepat guna yang dapat dimanfaatkan untuk meningkatkan produktivitas dan kesejahteraan masyarakat.',
            'theme' => 'Inovasi Teknologi Tepat Guna untuk Indonesia Maju',
            'organizer' => 'Kementerian Desa, Pembangunan Daerah Tertinggal dan Transmigrasi',
            'banner_image' => base_url('assets/image/event-banner.jpg'),
            'logo_image' => base_url('assets/image/gttgn-logo.png'),
        ];

        $data['event_highlights'] = [
            [
                'title' => 'Pameran Teknologi',
                'description' => 'Pameran teknologi tepat guna dari seluruh Indonesia yang mencakup berbagai sektor seperti pertanian, perikanan, energi terbarukan, dan industri kreatif.',
                'icon' => 'fa fa-lightbulb'
            ],
            [
                'title' => 'Kompetisi Inovasi',
                'description' => 'Kompetisi inovasi teknologi tepat guna dengan total hadiah puluhan juta rupiah untuk mendorong kreativitas dan inovasi.',
                'icon' => 'fa fa-trophy'
            ],
            [
                'title' => 'Seminar & Workshop',
                'description' => 'Berbagai seminar dan workshop dengan tema teknologi tepat guna yang dibawakan oleh para ahli dan praktisi.',
                'icon' => 'fa fa-chalkboard-teacher'
            ],
            [
                'title' => 'Business Matching',
                'description' => 'Kesempatan untuk menjalin kerjasama bisnis antara inventor, produsen, dan investor.',
                'icon' => 'fa fa-handshake'
            ]
        ];

        $data['gallery'] = [
            [
                'image' => base_url('assets/image/gallery/gallery-1.jpg'),
                'caption' => 'Pembukaan GTTGN 2024'
            ],
            [
                'image' => base_url('assets/image/gallery/gallery-2.jpg'),
                'caption' => 'Pameran Teknologi Tepat Guna'
            ],
            [
                'image' => base_url('assets/image/gallery/gallery-3.jpg'),
                'caption' => 'Seminar Teknologi Tepat Guna'
            ],
            [
                'image' => base_url('assets/image/gallery/gallery-4.jpg'),
                'caption' => 'Kompetisi Inovasi'
            ],
            [
                'image' => base_url('assets/image/gallery/gallery-5.jpg'),
                'caption' => 'Business Matching'
            ],
            [
                'image' => base_url('assets/image/gallery/gallery-6.jpg'),
                'caption' => 'Penganugerahan Penghargaan'
            ]
        ];

        $data['testimonials'] = [
            [
                'name' => 'Budi Santoso',
                'position' => 'Inventor Teknologi Pertanian',
                'message' => 'GTTGN memberikan kesempatan bagi para inventor untuk memperkenalkan inovasi mereka kepada masyarakat luas. Saya berhasil mendapatkan investor untuk mengembangkan teknologi saya berkat acara ini.',
                'image' => base_url('assets/image/testimonials/testimonial-1.jpg')
            ],
            [
                'name' => 'Siti Rahayu',
                'position' => 'Kepala Dinas Pertanian Kabupaten Bogor',
                'message' => 'Acara ini sangat bermanfaat bagi kami untuk menemukan teknologi tepat guna yang dapat diterapkan di daerah kami. Kami telah mengadopsi beberapa teknologi yang kami temukan di GTTGN tahun lalu.',
                'image' => base_url('assets/image/testimonials/testimonial-2.jpg')
            ],
            [
                'name' => 'Ahmad Hidayat',
                'position' => 'CEO PT Inovasi Teknologi Indonesia',
                'message' => 'GTTGN adalah platform yang luar biasa untuk menemukan inovasi-inovasi baru dan menjalin kerjasama dengan para inventor. Kami telah berhasil mengkomersialkan beberapa teknologi yang kami temukan di acara ini.',
                'image' => base_url('assets/image/testimonials/testimonial-3.jpg')
            ]
        ];

        $data['menu_segments'] = $this->uri->segment(1);
        $this->load->view('informasi/index', $data);
    }
}
