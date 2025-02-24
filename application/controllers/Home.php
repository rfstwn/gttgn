<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{
    public function index()
    {
        $data['faqs'] = [
            [
                'question' => 'Apa itu Gelar Teknologi Tepat Guna Nasional ?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque non ligula interdum tempus. Mauris porta commodo velit, in interdum quam imperdiet venenatis. Vestibulum ac commodo felis, nec fringilla arcu. Pellentesque congue lacus nibh, at bibendum erat tempor vel'
            ],
            [
                'question' => 'Bagaimana cara daftar Gelar Teknologi Tepat Guna Nasional ?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque non ligula interdum tempus. Mauris porta commodo velit, in interdum quam imperdiet venenatis. Vestibulum ac commodo felis, nec fringilla arcu.'
            ],
            [
                'question' => 'Siapa saja peserta Gelar Teknologi Tepat Guna Nasional ?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque non ligula interdum tempus.'
            ],
            [
                'question' => 'Dimana lokasi Gelar Teknologi Tepat Guna Nasional ?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi id neque non ligula interdum tempus. Mauris porta commodo velit, in interdum quam imperdiet venenatis. Vestibulum ac commodo felis, nec fringilla arcu.'
            ],
            [
                'question' => 'Apa manfaat Gelar Teknologi Tepat Guna Nasional ?',
                'answer' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.'
            ]
        ];

        $data['schedule'] = [
            ['date' => '20', 'month' => 'Juni', 'year' => '2025', 'event' => 'Pembukaan pendaftaran peserta'],
            ['date' => '30', 'month' => 'Juni', 'year' => '2025', 'event' => 'Penutupan pendaftaran'],
            ['date' => '14', 'month' => 'Juli', 'year' => '2025', 'event' => 'Opening Ceremony dan Gala Dinner'],
            ['date' => '15', 'month' => 'Juli', 'year' => '2025', 'event' => 'Pameran Teknologi Tepat Guna'],
            ['date' => '16', 'month' => 'Juli', 'year' => '2025', 'event' => 'Sinergitas kebijakan pemerintah pusat dan daerah'],
            ['date' => '17', 'month' => 'Juli', 'year' => '2025', 'event' => 'Penutupan acara dan Penyerahan hadiah atau penghargaan kepada pemenang lomba atau inovator terbaik']
        ];

        $data['products'] = [
            [
                'title' => 'Kabel Listrik',
                'image' =>  base_url('assets/image/product/kabel.jpg'),
                'description' => 'Kabel listrik low voltage, kabel listrik medium voltage, kabel listrik oil & gas, kabel fiber optik, kabel fire resistance dan kabel telekomunikasi.',
            ],
            [
                'title' => 'Lampu LED',
                'image' => base_url('assets/image/product/lampu.jpg'),
                'description' => 'Kabel listrik low voltage, kabel listrik medium voltage, kabel listrik oil & gas, kabel fiber optik, kabel fire resistance dan kabel telekomunikasi.',
            ],
            [
                'title' => 'Panel Surya',
                'image' => base_url('assets/image/product/panel-surya.jpeg'),
                'description' => 'Kabel listrik low voltage, kabel listrik medium voltage, kabel listrik oil & gas, kabel fiber optik, kabel fire resistance dan kabel telekomunikasi.',
            ],
            [
                'title' => 'Pemanas Air',
                'image' => base_url('assets/image/product/pemanas-air.jpg'),
                'description' => 'Pemanas Air low voltage, kabel listrik medium voltage, kabel listrik oil & gas, kabel fiber optik, kabel fire resistance dan kabel telekomunikasi.',
            ],
            [
                'title' => 'Kompor Listrik',
                'image' => base_url('assets/image/product/kompor.jpg'),
                'description' => 'Pemanas Air low voltage, kabel listrik medium voltage, kabel listrik oil & gas, kabel fiber optik, kabel fire resistance dan kabel telekomunikasi.',
            ]
        ];


        $data['audiences'] = [
            ['count' => '35', 'title' => 'Inventor'],
            ['count' => '38', 'title' => 'Stan Provinsi'],
            ['count' => '15', 'title' => 'Stan BUMN'],
            ['count' => '10', 'title' => 'Stan BUMD'],
            ['count' => '07', 'title' => 'Stan Swasta'],
        ];

        $data['menu_segments'] = $this->uri->segment(1);
        $this->load->view('home/index', $data);
    }
}
