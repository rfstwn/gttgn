<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
    
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    
    /**
     * Get all products with user and tenant information
     * 
     * @param int $limit Optional limit for results
     * @param int $offset Optional offset for pagination
     * @return array List of products
     */
    public function get_all_products($limit = null, $offset = 0) {
        $this->db->select('p.*, t.nama_tenant, u.nama_lengkap as user_name, u.no_whatsapp, 
                          prov.prov_name, city.city_name');
        $this->db->from('produk p');
        $this->db->join('tenant t', 't.id = p.tenant_id', 'left');
        $this->db->join('user u', 'u.id = p.user_id', 'left');
        $this->db->join('provinces prov', 'prov.prov_id = u.prov_id', 'left');
        $this->db->join('cities city', 'city.city_id = u.city_id', 'left');
        $this->db->order_by('p.created_at', 'DESC');
        
        if ($limit) {
            $this->db->limit($limit, $offset);
        }
        
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
     * Get product by ID with detailed information
     * 
     * @param int $id Product ID
     * @return object|bool Product object if found, FALSE otherwise
     */
    public function get_product_by_id($id) {
        $this->db->select('p.*, t.nama_tenant, u.nama_lengkap as user_name, u.no_whatsapp, 
                          prov.prov_name, city.city_name');
        $this->db->from('produk p');
        $this->db->join('tenant t', 't.id = p.tenant_id', 'left');
        $this->db->join('user u', 'u.id = p.user_id', 'left');
        $this->db->join('provinces prov', 'prov.prov_id = u.prov_id', 'left');
        $this->db->join('cities city', 'city.city_id = u.city_id', 'left');
        $this->db->where('p.id', $id);
        
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            return $query->row();
        }
        
        return FALSE;
    }
    
    /**
     * Get random products for homepage
     * 
     * @param int $limit Number of products to return
     * @return array List of products
     */
    public function get_random_products($limit = 5) {
        $this->db->select('p.*, t.nama_tenant, u.nama_lengkap as user_name, u.no_whatsapp, 
                          prov.prov_name, city.city_name');
        $this->db->from('produk p');
        $this->db->join('tenant t', 't.id = p.tenant_id', 'left');
        $this->db->join('user u', 'u.id = p.user_id', 'left');
        $this->db->join('provinces prov', 'prov.prov_id = u.prov_id', 'left');
        $this->db->join('cities city', 'city.city_id = u.city_id', 'left');
        $this->db->order_by('RAND()');
        $this->db->limit($limit);
        
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
     * Get other products excluding specific product ID
     * 
     * @param int $exclude_id Product ID to exclude
     * @param int $limit Number of products to return
     * @return array List of products
     */
    public function get_other_products($exclude_id, $limit = 4) {
        $this->db->select('p.*, t.nama_tenant, u.nama_lengkap as user_name, u.no_whatsapp, 
                          prov.prov_name, city.city_name');
        $this->db->from('produk p');
        $this->db->join('tenant t', 't.id = p.tenant_id', 'left');
        $this->db->join('user u', 'u.id = p.user_id', 'left');
        $this->db->join('provinces prov', 'prov.prov_id = u.prov_id', 'left');
        $this->db->join('cities city', 'city.city_id = u.city_id', 'left');
        $this->db->where('p.id !=', $exclude_id);
        $this->db->order_by('RAND()');
        $this->db->limit($limit);
        
        $query = $this->db->get();
        return $query->result();
    }
    
    /**
     * Count total products
     * 
     * @return int Total number of products
     */
    public function count_all_products() {
        return $this->db->count_all('produk');
    }
    
    /**
     * Get product images as array
     * 
     * @param object $product Product object
     * @return array Array of image URLs
     */
    public function get_product_images($product) {
        $images = array();
        
        for ($i = 1; $i <= 5; $i++) {
            $image_field = 'image_' . $i;
            if (!empty($product->$image_field)) {
                $images[] = base_url('assets/image/produk/' . $product->$image_field);
            }
        }
        
        // If no images, return default image
        if (empty($images)) {
            $images[] = base_url('assets/image/produk/default.jpg');
        }
        
        return $images;
    }
    
    /**
     * Format product data for frontend display
     * 
     * @param object $product Product object from database
     * @return array Formatted product data
     */
    public function format_product_for_display($product) {
        $images = $this->get_product_images($product);
        $location = '';
        
        if (!empty($product->city_name) && !empty($product->prov_name)) {
            $location = $product->city_name . ' - ' . $product->prov_name;
        }
        
        return array(
            'id' => $product->id,
            'title' => $product->name,
            'image' => $images[0], // Main image
            'images' => $images, // All images
            'locations' => $location,
            'desc' => $product->description,
            'description' => $product->description,
            'tenant' => $product->nama_tenant,
            'user_name' => $product->user_name,
            'user_phone' => $product->no_whatsapp,
            'video' => $product->video,
            'katalog' => $product->katalog ? base_url('assets/image/produk/' . $product->katalog) : null,
            'created_at' => $product->created_at
        );
    }
}
