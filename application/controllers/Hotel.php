<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hotel extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('hotel_model');
    }
    
    public function index()
    {
        // Get dynamic hotel data from database
        $hotels_data = $this->hotel_model->get_all_hotels();
        
        // Convert to array format expected by the view
        $data['hotels'] = [];
        foreach ($hotels_data as $hotel) {
            $data['hotels'][] = [
                'name' => $hotel->name,
                'image' => $hotel->image,
                'address' => $hotel->address,
                'phone' => $hotel->phone,
                'star' => $hotel->stars, // Note: using 'star' to match existing view
                'latitude' => $hotel->latitude,
                'longitude' => $hotel->longitude
            ];
        }
        
        $data['menu_segments'] = $this->uri->segment(1);
        $this->load->view('hotel/index', $data);
    }
}
