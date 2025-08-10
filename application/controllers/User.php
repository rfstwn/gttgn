<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
    }
    
    /**
     * Registration form processing
     */
    public function register() {
        // Set validation rules
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('no_whatsapp', 'No Whatsapp', 'required|trim|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]');
        $this->form_validation->set_rules('province_id', 'Provinsi', 'required|numeric');
        $this->form_validation->set_rules('city_id', 'Kota/Kabupaten', 'required|numeric');
        $this->form_validation->set_rules('kode_unik', 'Kode Unik', 'required|trim|callback_validate_kode_unik');
        
        // Check if validation fails
        if ($this->form_validation->run() == FALSE) {
            // Return to the registration form with errors
            $this->session->set_flashdata('error', trim(preg_replace('/\s+/', ' ', validation_errors())));
            redirect(base_url());
        } else {
            // Prepare data for database insertion
            $data = array(
                'registration_type' => $this->input->post('registrationType') ?: 1,
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'no_whatsapp' => $this->input->post('no_whatsapp'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'prov_id' => $this->input->post('province_id'),
                'city_id' => $this->input->post('city_id'),
                'kode_unik' => $this->input->post('kode_unik')
            );
            
            // Save data to database
            $result = $this->user_model->save_registration($data);
            
            if ($result) {
                // Registration successful
                $this->session->set_flashdata('success', 'Registrasi berhasil! Terima kasih telah mendaftar.');
            } else {
                // Registration failed
                $this->session->set_flashdata('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
            }
            
            // Redirect to homepage
            redirect(base_url());
        }
    }
    
    /**
     * Custom validation callback for kode_unik field
     * 
     * @param string $code The code to validate
     * @return bool TRUE if valid, FALSE otherwise
     */
    public function validate_kode_unik($code) {
        if (!$this->user_model->validate_unique_code($code)) {
            $this->form_validation->set_message('validate_kode_unik', 'Kode Unik tidak valid. Kode harus GTTGNXXVI.');
            return FALSE;
        }
        return TRUE;
    }
    
    /**
     * User login processing
     */
    public function login() {
        // Set validation rules
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('no_whatsapp', 'No Whatsapp', 'required|trim|numeric');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', 'No. WhatsApp dan password harus diisi dengan benar.');
            redirect(base_url());
        } else {
            $no_whatsapp = $this->input->post('no_whatsapp');
            $password = $this->input->post('password');
            
            // Authenticate user
            $user = $this->user_model->authenticate($no_whatsapp, $password);
            
            if ($user) {
                // Set session data
                $session_data = array(
                    'user_id' => $user->id,
                    'nama_lengkap' => $user->nama_lengkap,
                    'no_whatsapp' => $user->no_whatsapp,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($session_data);
                
                $this->session->set_flashdata('success', 'Login berhasil! Selamat datang, ' . $user->nama_lengkap);
                redirect('user/dashboard');
            } else {
                $this->session->set_flashdata('error', 'No. WhatsApp atau password salah.');
                redirect(base_url());
            }
        }
    }
    
    /**
     * User logout
     */
    public function logout() {
        // Destroy session
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Anda telah berhasil logout.');
        redirect(base_url());
    }
    
    /**
     * User dashboard - protected page
     */
    public function dashboard() {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect(base_url());
        }
        
        $data['title'] = 'Dashboard PIC User';
        $data['user'] = (object) array(
            'id' => $this->session->userdata('user_id'),
            'nama_lengkap' => $this->session->userdata('nama_lengkap'),
            'no_whatsapp' => $this->session->userdata('no_whatsapp')
        );
        
        // Get user's participants, tenants, and products
        $data['participants'] = $this->user_model->get_user_participants($data['user']->id);
        $data['tenants'] = $this->user_model->get_user_tenants($data['user']->id);
        $data['products'] = $this->user_model->get_user_products($data['user']->id);
        $data['menu_segments'] = $this->uri->segment(1);

        $data['jabatan'] = [
            "Gubernur",
            "Wakil Gubernur",
            "Sekda Provinsi",
            "Kepada Dinas",
            "Ajudan Gubernur",
            "Ajudan Wakil Gubernur",
            "Ketua DPRD Provinsi",
            "Wakil Ketua DPRD Provinsi",
            "Bupati/Walikota",
            "Wakil Bupati/Wakil Wali kota",
            "Sekda Kab/Kota",
            "Ketua DPRD Kab/Kota",
            "Wakil Ketua DPRD Kab/Kota",
            "Ajudan Bupati/Wali Kota",
            "Ajudan Wakil Bupati/Wakil Walikota"
        ];

        $this->load->view('user/dashboard', $data);
    }
    
    /**
     * Add participant
     */
    public function add_participant() {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect(base_url());
        }
        
        // Set validation rules
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('no_whatsapp', 'No Whatsapp', 'required|trim|numeric');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', trim(preg_replace('/\s+/', ' ', validation_errors())));
        } else {
            $data = array(
                'user_id' => $this->session->userdata('user_id'),
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'no_whatsapp' => $this->input->post('no_whatsapp'),
                'jabatan' => $this->input->post('jabatan')
            );
            
            $result = $this->user_model->save_participant($data);
            
            if ($result) {
                $this->session->set_flashdata('success', 'Participant berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan participant.');
            }
        }
        
        redirect('user/dashboard');
    }
    
    /**
     * Add tenant
     */
    public function add_tenant() {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect(base_url());
        }
        
        // Set validation rules
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('nama_tenant', 'Nama Tenant', 'required|trim');
        $this->form_validation->set_rules('produk_utama', 'Produk Utama', 'trim');
        $this->form_validation->set_rules('no_telp', 'No. Telepon', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');
        $this->form_validation->set_rules('youtube', 'YouTube URL', 'trim|valid_url');
        $this->form_validation->set_rules('address', 'Alamat', 'trim');
        $this->form_validation->set_rules('description', 'Deskripsi', 'trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', trim(preg_replace('/\s+/', ' ', validation_errors())));
        } else {
            // Handle photo upload
            $photo_filename = null;
            if (!empty($_FILES['photo_profile']['name'])) {
                $config['upload_path'] = './assets/image/tenant/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = 2048; // 2MB
                $config['encrypt_name'] = TRUE;
                
                // Create directory if it doesn't exist
                if (!is_dir($config['upload_path'])) {
                    mkdir($config['upload_path'], 0755, true);
                }
                
                $this->load->library('upload', $config);
                
                if ($this->upload->do_upload('photo_profile')) {
                    $upload_data = $this->upload->data();
                    $photo_filename = $upload_data['file_name'];
                } else {
                    $this->session->set_flashdata('error', 'Error uploading photo: ' . $this->upload->display_errors());
                    redirect('user/dashboard');
                    return;
                }
            }
            
            $data = array(
                'user_id' => $this->session->userdata('user_id'),
                'nama_tenant' => $this->input->post('nama_tenant'),
                'produk_utama' => $this->input->post('produk_utama'),
                'no_telp' => $this->input->post('no_telp'),
                'email' => $this->input->post('email'),
                'youtube' => $this->input->post('youtube'),
                'address' => $this->input->post('address'),
                'photo_profile' => $photo_filename,
                'description' => $this->input->post('description')
            );
            
            $result = $this->user_model->save_tenant($data);
            
            if ($result) {
                $this->session->set_flashdata('success', 'Tenant berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan tenant.');
            }
        }
        
        redirect('user/dashboard');
    }
    
    /**
     * Add product
     */
    public function add_product() {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect(base_url());
        }
        
        // Set validation rules
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('tenant_id', 'Tenant', 'required|numeric');
        $this->form_validation->set_rules('name', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('description', 'Deskripsi', 'trim');
        $this->form_validation->set_rules('video', 'Video URL', 'trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', trim(preg_replace('/\s+/', ' ', validation_errors())));
        } else {
            // Handle file uploads
            $this->load->library('upload');
            $uploaded_files = array();
            
            // Configure upload
            $config['upload_path'] = './assets/image/produk/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = TRUE;
            
            // Create directory if not exists
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0755, true);
            }
            
            // Upload images (image_1 to image_5)
            for ($i = 1; $i <= 5; $i++) {
                if (!empty($_FILES['image_' . $i]['name'])) {
                    $config['file_name'] = 'produk_' . time() . '_' . $i;
                    $this->upload->initialize($config);
                    
                    if ($this->upload->do_upload('image_' . $i)) {
                        $upload_data = $this->upload->data();
                        $uploaded_files['image_' . $i] = $upload_data['file_name'];
                    }
                }
            }
            
            // Upload katalog
            if (!empty($_FILES['katalog']['name'])) {
                $config['allowed_types'] = 'pdf|doc|docx';
                $config['file_name'] = 'katalog_' . time();
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('katalog')) {
                    $upload_data = $this->upload->data();
                    $uploaded_files['katalog'] = $upload_data['file_name'];
                }
            }
            
            $data = array(
                'user_id' => $this->session->userdata('user_id'),
                'tenant_id' => $this->input->post('tenant_id'),
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'video' => $this->input->post('video')
            );
            
            // Add uploaded files to data
            foreach ($uploaded_files as $key => $filename) {
                $data[$key] = $filename;
            }
            
            // Ensure image_1 is required
            if (empty($data['image_1'])) {
                $this->session->set_flashdata('error', 'Gambar utama (Image 1) wajib diupload.');
                redirect('user/dashboard');
                return;
            }
            
            $result = $this->user_model->save_product($data);
            
            if ($result) {
                $this->session->set_flashdata('success', 'Produk berhasil ditambahkan.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menambahkan produk.');
            }
        }
        
        redirect('user/dashboard');
    }
    
    /**
     * Edit product form
     */
    public function edit_product($id) {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect(base_url());
        }
        
        $product = $this->user_model->get_product_by_id($id);
        
        // Check if product exists and belongs to current user
        if (!$product || $product->user_id != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'Produk tidak ditemukan.');
            redirect('user/dashboard');
        }
        
        $data['title'] = 'Edit Produk';
        $data['product'] = $product;
        $data['tenants'] = $this->user_model->get_user_tenants($this->session->userdata('user_id'));
        $data['menu_segments'] = $this->uri->segment(1);
        
        $this->load->view('user/edit_product', $data);
    }
    
    /**
     * Update product
     */
    public function update_product($id) {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect(base_url());
        }
        
        $product = $this->user_model->get_product_by_id($id);
        
        // Check if product exists and belongs to current user
        if (!$product || $product->user_id != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'Produk tidak ditemukan.');
            redirect('user/dashboard');
        }
        
        // Set validation rules
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('tenant_id', 'Tenant', 'required|numeric');
        $this->form_validation->set_rules('name', 'Nama Produk', 'required|trim');
        $this->form_validation->set_rules('description', 'Deskripsi', 'trim');
        $this->form_validation->set_rules('video', 'Video URL', 'trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', trim(preg_replace('/\s+/', ' ', validation_errors())));
        } else {
            // Handle file uploads
            $this->load->library('upload');
            $uploaded_files = array();
            
            // Configure upload
            $config['upload_path'] = './assets/image/produk/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size'] = 2048; // 2MB
            $config['encrypt_name'] = TRUE;
            
            // Create directory if not exists
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0755, true);
            }
            
            // Upload images (image_1 to image_5)
            for ($i = 1; $i <= 5; $i++) {
                if (!empty($_FILES['image_' . $i]['name'])) {
                    $config['file_name'] = 'produk_' . time() . '_' . $i;
                    $this->upload->initialize($config);
                    
                    if ($this->upload->do_upload('image_' . $i)) {
                        $upload_data = $this->upload->data();
                        $uploaded_files['image_' . $i] = $upload_data['file_name'];
                        
                        // Delete old image if exists
                        $old_image = $product->{'image_' . $i};
                        if ($old_image && file_exists('./assets/image/produk/' . $old_image)) {
                            unlink('./assets/image/produk/' . $old_image);
                        }
                    }
                }
            }
            
            // Upload katalog
            if (!empty($_FILES['katalog']['name'])) {
                $config['allowed_types'] = 'pdf|doc|docx';
                $config['file_name'] = 'katalog_' . time();
                $this->upload->initialize($config);
                
                if ($this->upload->do_upload('katalog')) {
                    $upload_data = $this->upload->data();
                    $uploaded_files['katalog'] = $upload_data['file_name'];
                    
                    // Delete old katalog if exists
                    if ($product->katalog && file_exists('./assets/image/produk/' . $product->katalog)) {
                        unlink('./assets/image/produk/' . $product->katalog);
                    }
                }
            }
            
            $data = array(
                'tenant_id' => $this->input->post('tenant_id'),
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'video' => $this->input->post('video')
            );
            
            // Add uploaded files to data
            foreach ($uploaded_files as $key => $filename) {
                $data[$key] = $filename;
            }
            
            $result = $this->user_model->update_product($id, $data);
            
            if ($result) {
                $this->session->set_flashdata('success', 'Produk berhasil diupdate.');
            } else {
                $this->session->set_flashdata('error', 'Gagal mengupdate produk.');
            }
        }
        
        redirect('user/dashboard');
    }
    
    /**
     * Delete product
     */
    public function delete_product($id) {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect(base_url());
        }
        
        $product = $this->user_model->get_product_by_id($id);
        
        // Check if product exists and belongs to current user
        if (!$product || $product->user_id != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'Produk tidak ditemukan.');
            redirect('user/dashboard');
        }
        
        // Delete associated files
        for ($i = 1; $i <= 5; $i++) {
            $image = $product->{'image_' . $i};
            if ($image && file_exists('./assets/image/produk/' . $image)) {
                unlink('./assets/image/produk/' . $image);
            }
        }
        
        if ($product->katalog && file_exists('./assets/image/produk/' . $product->katalog)) {
            unlink('./assets/image/produk/' . $product->katalog);
        }
        
        $result = $this->user_model->delete_product($id);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Produk berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus produk.');
        }
        
        redirect('user/dashboard');
    }
    
    /**
     * Toggle participant presence status
     */
    public function toggle_participant_presence($participant_id) {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Anda harus login terlebih dahulu.');
            redirect(base_url());
        }
        
        // Get participant data to verify ownership
        $participant = $this->user_model->get_participant_by_id($participant_id);
        
        if (!$participant || $participant->user_id != $this->session->userdata('user_id')) {
            $this->session->set_flashdata('error', 'Participant tidak ditemukan.');
            redirect('user/dashboard');
            return;
        }
        
        // Toggle the is_present status
        $new_status = $participant->is_present ? 0 : 1;
        $result = $this->user_model->update_participant_presence($participant_id, $new_status);
        
        if ($result) {
            $status_text = $new_status ? 'Hadir' : 'Tidak Hadir';
            $this->session->set_flashdata('success', 'Status kehadiran berhasil diubah menjadi: ' . $status_text);
        } else {
            $this->session->set_flashdata('error', 'Gagal mengubah status kehadiran.');
        }
        
        redirect('user/dashboard');
    }
    
    public function get_tenant_detail($tenant_id) {
        // Check if user is logged in
        if (!$this->session->userdata('logged_in')) {
            echo json_encode(['success' => false, 'message' => 'Unauthorized']);
            return;
        }
        
        // Get tenant data
        $tenant = $this->user_model->get_tenant_by_id($tenant_id);
        
        // Check if tenant exists and belongs to current user
        if (!$tenant || $tenant->user_id != $this->session->userdata('user_id')) {
            echo json_encode(['success' => false, 'message' => 'Tenant tidak ditemukan']);
            return;
        }
        
        echo json_encode([
            'success' => true,
            'tenant' => $tenant
        ]);
    }
}
