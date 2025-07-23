<?php
ci()->load->view('templates/header', ['title' => 'Home']);
//-- Home Content --
ci()->load->view('/templates/nav', ['isSticky' => true]);
ci()->load->view('home/sections/hero');
ci()->load->view('home/sections/welcome');
ci()->load->view('home/sections/peserta');
ci()->load->view('home/sections/produk');
ci()->load->view('home/sections/jadwal');
ci()->load->view('home/sections/faq');
//-- End Home Content --
ci()->load->view('templates/footer');
