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
        
        $data['menu_segments'] = $this->uri->segment(1);
        $this->load->view('kontak/index', $data);
    }
}
