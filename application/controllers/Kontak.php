<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends MY_Controller
{
    public function index()
    {
        $data['contact_info'] = [
            'address' => 'Jl. Raya Serpong No. 123, Tangerang Selatan, Banten 15310',
            'phone' => '+62 21 1234 5678',
            'fax' => '+62 21 1234 5679',
            'email' => 'info@gttgn.id',
            'website' => 'www.gttgn.id',
            'office_hours' => 'Senin - Jumat: 08.00 - 17.00 WIB',
            'social_media' => [
                ['name' => 'Facebook', 'icon' => 'fab fa-facebook-f', 'url' => 'https://facebook.com/gttgn'],
                ['name' => 'Twitter', 'icon' => 'fab fa-twitter', 'url' => 'https://twitter.com/gttgn'],
                ['name' => 'Instagram', 'icon' => 'fab fa-instagram', 'url' => 'https://instagram.com/gttgn'],
                ['name' => 'LinkedIn', 'icon' => 'fab fa-linkedin-in', 'url' => 'https://linkedin.com/company/gttgn'],
                ['name' => 'YouTube', 'icon' => 'fab fa-youtube', 'url' => 'https://youtube.com/gttgn']
            ]
        ];

        $data['contact_form'] = [
            'title' => 'Kirim Pesan',
            'description' => 'Silakan isi formulir di bawah ini untuk mengirimkan pesan kepada kami. Kami akan merespons pesan Anda sesegera mungkin.'
        ];

        $data['map'] = [
            'latitude' => -6.301553,
            'longitude' => 106.652149,
            'zoom' => 15,
            'marker_title' => 'Gelar Teknologi Tepat Guna Nasional'
        ];

        $data['faq'] = [
            [
                'question' => 'Bagaimana cara mendaftar sebagai peserta GTTGN?',
                'answer' => 'Untuk mendaftar sebagai peserta GTTGN, Anda dapat mengunjungi halaman Registrasi di website kami dan mengisi formulir pendaftaran yang tersedia. Setelah itu, tim kami akan menghubungi Anda untuk konfirmasi dan informasi lebih lanjut.'
            ],
            [
                'question' => 'Apakah ada biaya untuk mengunjungi pameran GTTGN?',
                'answer' => 'Tidak, pengunjung dapat mengakses pameran GTTGN secara gratis. Namun, untuk beberapa workshop dan seminar mungkin memerlukan pendaftaran terlebih dahulu karena keterbatasan tempat.'
            ],
            [
                'question' => 'Bagaimana cara menjadi sponsor atau mitra GTTGN?',
                'answer' => 'Untuk informasi mengenai sponsorship atau kemitraan, silakan hubungi kami melalui email di partnership@gttgn.id atau telepon di +62 21 1234 5678.'
            ]
        ];

        $data['team'] = [
            [
                'name' => 'Dr. Ir. Bambang Sutejo',
                'position' => 'Ketua Panitia GTTGN 2025',
                'email' => 'bambang.sutejo@gttgn.id',
                'phone' => '+62 812 3456 7890',
                'image' => base_url('assets/image/team/team-1.jpg')
            ],
            [
                'name' => 'Dra. Siti Nurhaliza',
                'position' => 'Sekretaris Panitia GTTGN 2025',
                'email' => 'siti.nurhaliza@gttgn.id',
                'phone' => '+62 813 4567 8901',
                'image' => base_url('assets/image/team/team-2.jpg')
            ],
            [
                'name' => 'Ir. Ahmad Dahlan',
                'position' => 'Koordinator Pameran GTTGN 2025',
                'email' => 'ahmad.dahlan@gttgn.id',
                'phone' => '+62 814 5678 9012',
                'image' => base_url('assets/image/team/team-3.jpg')
            ]
        ];

        $data['menu_segments'] = $this->uri->segment(1);
        $this->load->view('kontak/index', $data);
    }
}
