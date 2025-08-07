<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('province_model');
        $this->load->model('city_model');
        header('Content-Type: application/json');
    }
    
    /**
     * Get cities by province ID
     */
    public function get_cities($province_id) {
        if (!$province_id || !is_numeric($province_id)) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid province ID']);
            return;
        }
        
        $cities = $this->city_model->get_cities_by_province($province_id);
        
        if ($cities) {
            echo json_encode(['status' => 'success', 'data' => $cities]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No cities found']);
        }
    }
    
    /**
     * Get all provinces
     */
    public function get_provinces() {
        $provinces = $this->province_model->get_all_provinces();
        
        if ($provinces) {
            echo json_encode(['status' => 'success', 'data' => $provinces]);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'No provinces found']);
        }
    }
}
