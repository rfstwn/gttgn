<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends MY_Controller
{
    public function index()
    {
        $data['products'] = [
            [

                'id' => 1,
                'title' => 'Kabel Listrik',
                'image' =>  base_url('assets/image/product/kabel.jpg'),
                'locations' => 'Cilegon - Banten',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec finibus eget libero ut vehicula. Nulla eget magna eros. Nam sit amet convallis odio, non bibendum mi. Vestibulum bibendum dapibus ultricies'
            ],
            [
                'id' => 2,
                'title' => 'Lampu LED',
                'image' => base_url('assets/image/product/lampu.jpg'),
                'locations' => 'Cilegon - Banten',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec finibus eget libero ut vehicula. Nulla eget magna eros. Nam sit amet convallis odio, non bibendum mi. Vestibulum bibendum dapibus ultricies'
            ],
            [
                'id' => 3,
                'title' => 'Panel Surya',
                'image' => base_url('assets/image/product/panel-surya.jpeg'),
                'locations' => 'Cilegon - Banten',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec finibus eget libero ut vehicula. Nulla eget magna eros. Nam sit amet convallis odio, non bibendum mi. Vestibulum bibendum dapibus ultricies'
            ],
            [
                'id' => 4,
                'title' => 'Pemanas Air',
                'image' => base_url('assets/image/product/pemanas-air.jpg'),
                'locations' => 'Cilegon - Banten',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec finibus eget libero ut vehicula. Nulla eget magna eros. Nam sit amet convallis odio, non bibendum mi. Vestibulum bibendum dapibus ultricies'
            ],
            [
                'id' => 5,
                'title' => 'Kompor Listrik',
                'image' => base_url('assets/image/product/kompor.jpg'),
                'locations' => 'Cilegon - Banten',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec finibus eget libero ut vehicula. Nulla eget magna eros. Nam sit amet convallis odio, non bibendum mi. Vestibulum bibendum dapibus ultricies'
            ],
            [
                'id' => 6,
                'title' => 'Lampu LED',
                'image' => base_url('assets/image/product/lampu.jpg'),
                'locations' => 'Cilegon - Banten',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec finibus eget libero ut vehicula. Nulla eget magna eros. Nam sit amet convallis odio, non bibendum mi. Vestibulum bibendum dapibus ultricies'
            ],
        ];
        $data['menu_segments'] = $this->uri->segment(1);
        $this->load->view('produk/index', $data);
    }

    public function detail()
    {

        $data['detail_photo'] = [
            base_url('assets/image/product/kabel.jpg'),
            base_url('assets/image/product/lampu.jpg'),
            base_url('assets/image/product/panel-surya.jpeg'),
            base_url('assets/image/product/pemanas-air.jpg'),
            base_url('assets/image/product/kompor.jpg'),
            base_url('assets/image/product/kabel.jpg'),
            base_url('assets/image/product/lampu.jpg'),
            base_url('assets/image/product/panel-surya.jpeg'),
            base_url('assets/image/product/pemanas-air.jpg'),
            base_url('assets/image/product/kompor.jpg'),
        ];
        $data['menu_segments'] = $this->uri->segment(1);
        $data['other_products'] = [
            [

                'id' => 1,
                'title' => 'Kabel Listrik',
                'image' =>  base_url('assets/image/product/kabel.jpg'),
                'locations' => 'Cilegon - Banten',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec finibus eget libero ut vehicula. Nulla eget magna eros. Nam sit amet convallis odio, non bibendum mi. Vestibulum bibendum dapibus ultricies'

            ],
            [
                'id' => 2,
                'title' => 'Lampu LED',
                'image' => base_url('assets/image/product/lampu.jpg'),
                'locations' => 'Cilegon - Banten',
                'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec finibus eget libero ut vehicula. Nulla eget magna eros. Nam sit amet convallis odio, non bibendum mi. Vestibulum bibendum dapibus ultricies'
            ]
        ];
        $this->load->view('produk/detail/index', $data);
    }
}
