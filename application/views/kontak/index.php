<?php
ci()->load->view("templates/header", ['title' => 'Kontak']);
ci()->load->view('templates/nav');

//-- Kontak Content --
ci()->load->view('kontak/sections/contact_hero');
ci()->load->view('kontak/sections/contact_form');

//-- End Kontak Content --
ci()->load->view('templates/footer');
