<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Home extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('MyModel');
		
	}
	

	public function index(){
		

		$this->load->view('template/header');
		$this->load->view('beranda');
		$this->load->view('template/footer');
		
	}

	public function pengaduan(){
		$this->form_validation->set_rules('nik_pengadu', 'NIK', 'required|trim');
		$this->form_validation->set_rules('nama_pengadu', 'Nama', 'required|trim');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
		$this->form_validation->set_rules('tempat_kejadian', 'Tempat Kejadian', 'required|trim');
		$this->form_validation->set_rules('waktu_kejadian', 'Waktu Kejadian', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('message', '<script>alert("Gagal!")</script>');
			redirect('');
		} else {
			if(empty($_FILES['foto']['name'])) {
				$data = [
					'nik_pengadu' => $this->input->post('nik_pengadu'),
					'nama_pengadu' => $this->input->post('nama_pengadu'),
					'deskripsi' => $this->input->post('deskripsi'),
					'foto' => null,
					'tempat_kejadian' => $this->input->post('tempat_kejadian'),
					'waktu_kejadian' => $this->input->post('waktu_kejadian'),
					'status' => 'belum',
					'waktu' => date('Y-m-d H:i:s')
				];
				
				$this->MyModel->addPengaduan($data);

				$this->session->set_flashdata('message', '<script>alert("Berhasil!")</script>');
				redirect('');
			} else {
				$config = [
                    'file_name' => $this->input->post('nik_pengadu').'-pengaduan',
                    'upload_path' => './assets/img/pengaduan/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'max_size' => 2048,
                ];
				$this->load->library('upload', $config);
				
				if($this->upload->do_upload('foto')) {
					$file = $this->upload->data();
					$data = [
						'nik_pengadu' => $this->input->post('nik_pengadu'),
						'nama_pengadu' => $this->input->post('nama_pengadu'),
						'deskripsi' => $this->input->post('deskripsi'),
						'foto' => $file['file_name'],
						'tempat_kejadian' => $this->input->post('tempat_kejadian'),
						'waktu_kejadian' => $this->input->post('waktu_kejadian'),
						'status' => 'belum',
						'waktu' => date('Y-m-d H:i:s')
					];
					
					$this->MyModel->addPengaduan($data);
	
					$this->session->set_flashdata('message', '<script>alert("Berhasil!")</script>');
					redirect('');
				} else {
					$this->session->set_flashdata('message', '<script>alert("Gagal!")</script>');
					redirect('');
				}
			}
		}
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

	public function perangkatdesa() {
		$this->load->view('template/header');
		$this->load->view('perangkatdesa');
		$this->load->view('template/footer');
	}

	public function demografi() {
		$this->load->view('template/header');
		$this->load->view('demografi');
		$this->load->view('template/footer');
	}

	public function fasilitas() {
		$this->load->view('template/header');
		$this->load->view('fasilitas');
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
        
                            