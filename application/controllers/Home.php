<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Home extends CI_Controller {

	public function index(){
		$this->load->view('template/header');
		$this->load->view('beranda');
		$this->load->view('template/footer');
	}

	public function peta() {
		$this->load->view('template/header');
		$this->load->view('peta');
		$this->load->view('template/footer');
	}

	public function visimisi() {
		$this->load->view('template/header');
		$this->load->view('visimisi');
		$this->load->view('template/footer');
	}

	public function pelayanan() {
		$this->load->view('template/header');
		$this->load->view('pelayanan');
		$this->load->view('template/footer');
	}

	public function sejarah() {
		$this->load->view('template/header');
		$this->load->view('sejarah');
		$this->load->view('template/footer');
	}

	public function galeri() {
		$this->load->view('template/header');
		$this->load->view('galeri');
		$this->load->view('template/footer');
	}

	public function kontak() {
		$this->load->view('template/header');
		$this->load->view('kontak');
		$this->load->view('template/footer');
	}


        
}
        
    /* End of file  Home.php */
        
                            