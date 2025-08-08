<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
    }
    
    public function index()
    {
        // Load pagination library
        $this->load->library('pagination');
        
        // Pagination configuration
        $config['base_url'] = base_url('produk/index');
        $config['total_rows'] = $this->product_model->count_all_products();
        $config['per_page'] = 6; // Number of products per page
        $config['uri_segment'] = 3;
        
        // Pagination styling
        $config['full_tag_open'] = '<ul class="pagination justify-content-center mb-0">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = '<i class="fa-solid fa-angles-left"></i>';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = '<i class="fa-solid fa-angles-right"></i>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = '<i class="fa-solid fa-angles-right"></i>';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '<i class="fa-solid fa-angles-left"></i>';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item"><a class="page-link active" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
        
        // Initialize pagination
        $this->pagination->initialize($config);
        
        // Get current page
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        
        // Get products from database with pagination
        $products_data = $this->product_model->get_all_products($config['per_page'], $page);
        
        // Format products for display
        $data['products'] = array();
        foreach ($products_data as $product) {
            $data['products'][] = $this->product_model->format_product_for_display($product);
        }
        
        // Pass pagination links to view
        $data['pagination'] = $this->pagination->create_links();
        $data['total_products'] = $config['total_rows'];
        $data['menu_segments'] = $this->uri->segment(1);
        
        $this->load->view('produk/index', $data);
    }

    public function detail($id = null)
    {
        // Get product ID from URL segment if not provided
        if (!$id) {
            $id = $this->uri->segment(3);
        }
        
        if (!$id) {
            show_404();
            return;
        }
        
        // Get product details from database
        $product = $this->product_model->get_product_by_id($id);
        
        if (!$product) {
            show_404();
            return;
        }
        
        // Format product data
        $data['product'] = $this->product_model->format_product_for_display($product);
        
        // Get product images
        $data['detail_photo'] = $this->product_model->get_product_images($product);
        
        // Get other products (excluding current one)
        $other_products_data = $this->product_model->get_other_products($id, 4);
        $data['other_products'] = array();
        foreach ($other_products_data as $other_product) {
            $data['other_products'][] = $this->product_model->format_product_for_display($other_product);
        }
        
        $data['menu_segments'] = $this->uri->segment(1);
        $this->load->view('produk/detail/index', $data);
    }
}
