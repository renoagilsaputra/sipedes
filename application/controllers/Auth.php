<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Auth extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('MyModel');
		
	}
	

	public function login_kasi() {
		$this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'required|trim'); 
		$this->form_validation->set_rules('kata_sandi', 'Kata Sandi', 'required|trim');
		if ($this->form_validation->run() == FALSE) {

			$this->load->view('auth/login_kasi');
		} else {
			$username = $this->input->post('nama_pengguna');
            $password = $this->input->post('kata_sandi');
			$kasi = $this->db->get_where('kasi', ['nama_pengguna' => $username])->row_array();
			
			if($kasi) {
				if(password_verify($password, $kasi['kata_sandi'])) {
                    $data = [
                        'id_kasi' => $kasi['id_kasi']
                    ];
                    $this->session->set_userdata($data);
                    redirect(base_url('petugas'));
                } else {
					$alert = "<script>alert('Kata Sandi Salah!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('petugas/login');
                }
			} else {
				$alert = "<script>alert('Nama Pengguna tidak terdaftar!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/login');
			}
		}
		
	}

	public function logout_kasi() {
		$this->session->sess_destroy();
        redirect(base_url('petugas/login'));
	}

	public function login_penduduk() {

	}

	public function logout_penduduk() {

	}
}
        
    /* End of file  Auth.php */
        
                            