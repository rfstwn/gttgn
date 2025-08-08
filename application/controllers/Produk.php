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
        // Get products from database
        $products_data = $this->product_model->get_all_products();
        
        // Format products for display
        $data['products'] = array();
        foreach ($products_data as $product) {
            $data['products'][] = $this->product_model->format_product_for_display($product);
        }
        
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
