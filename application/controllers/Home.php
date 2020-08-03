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
		$id_penduduk = $this->session->userdata('id_penduduk');
		$data['pelayanan'] = $this->db->get_where('pelayanan',['id_penduduk' =>$id_penduduk ])->result_array();
		$data['kependudukan'] = $this->db->get_where('kependudukan',['id_penduduk' =>$id_penduduk ])->result_array();
		$data['suket_menikah'] = $this->db->get_where('suket_menikah',['id_penduduk' =>$id_penduduk ])->result_array();
		$data['suket_izin_acara'] = $this->db->get_where('izin_acara',['id_penduduk' =>$id_penduduk ])->result_array();
		$data['suket_izin_usaha'] = $this->db->get_where('izin_usaha',['id_penduduk' =>$id_penduduk ])->result_array();
		$data['suket_pindah'] = $this->db->get_where('suket_pindah',['id_penduduk' =>$id_penduduk ])->result_array();
		$data['suket_kematian'] = $this->db->get_where('suket_kematian',['id_penduduk' =>$id_penduduk ])->result_array();
		$data['akta'] = $this->db->get_where('akta_kelahiran',['id_penduduk' =>$id_penduduk ])->result_array();
		$this->load->view('template/header');
		$this->load->view('pelayanan', $data);
		$this->load->view('template/footer');
	}

	public function pelayanan_add() {
		$data['jenis_pelayanan'] = ['Kartu Keluarga','SKCK','Surat Keterangan Cerai','Surat Keterangan Belum Menikah','Surat Keterangan Sudah Menikah','Surat Keterangan Tidak Mampu','Domisili'];
		$data['keperluan'] = ['membuat','merubah'];

		$this->form_validation->set_rules('id_penduduk', 'NIK', 'trim|required');
		$this->form_validation->set_rules('jenis_pelayanan', 'Jenis Pelayanan', 'trim|required');
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/header');
			$this->load->view('pelayanan_add', $data);
			$this->load->view('template/footer');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name'])) {
				$alert = "<script>alert('Surat Pengantar tidak boleh kosong!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('pelayanan/tambah');
			} else {
				$config = [
                    'file_name' => 'pelayanan_surat_pengantar',
                    'upload_path' => './assets/img/pelayanan/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'max_size' => 1024,
				];
				
				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar_surat_pengantar')) {
					$file = $this->upload->data();

					$query = $this->db->query("SELECT MAX(kode) as kode from pelayanan");
					$kodeMax = $query->row_array();

					$nourut = substr($kodeMax['kode'], 3, 4);
					$urutan = $nourut + 1;
					$huruf = "PLY";
					$kode = $huruf . sprintf("%03s", $urutan);

					$data = [
						'id_penduduk' => $this->input->post('id_penduduk'),
						'jenis_pelayanan' => $this->input->post('jenis_pelayanan'),
						'keperluan' => $this->input->post('keperluan'),
						'gambar_surat_pengantar' => $file['file_name'],
						'waktu' => date('Y-m-d H:i:s'),
						'kode' => $kode,
						'status' => 'belum',
					];
					
					$this->MyModel->addPelayanan($data);
					$alert = "<script>alert('Berhasil!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('pelayanan'); 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('pelayanan/tambah');
				}
			}
		}
	}

	public function kependudukan_add() {
	
		$data['jenis_pelayanan'] = ['KTP','KIA'];
		$data['keperluan'] = ['membuat','merubah'];

		$this->form_validation->set_rules('id_penduduk', 'NIK', 'trim|required');
		$this->form_validation->set_rules('jenis_pelayanan', 'Jenis Pelayanan', 'trim|required');
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header');
			$this->load->view('kependudukan_add', $data);
			$this->load->view('template/footer');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name']) || empty($_FILES['gambar_akta_kelahiran'])) {
				$alert = "<script>alert('Surat Pengantar / Akta kelahiran tidak boleh kosong!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/kependudukan/tambah');
			} else {
				$config = [
                    'file_name' => 'kependudukan_bukti',
                    'upload_path' => './assets/img/kependudukan/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'max_size' => 1024,
				];

				
				
				$this->load->library('upload', $config);
		

				if($this->upload->do_upload('gambar_surat_pengantar')) {
					$file = $this->upload->data();
					if($this->upload->do_upload('gambar_akta_kelahiran')) {
						$file2 = $this->upload->data();

						$query = $this->db->query("SELECT MAX(kode) as kode from kependudukan");
						$kodeMax = $query->row_array();

						$nourut = substr($kodeMax['kode'], 3, 4);
						$urutan = $nourut + 1;
						$huruf = "KPN";
						$kode = $huruf . sprintf("%03s", $urutan);

						$data = [
							'id_penduduk' => $this->input->post('id_penduduk'),
							'jenis_pelayanan' => $this->input->post('jenis_pelayanan'),
							'keperluan' => $this->input->post('keperluan'),
							'gambar_surat_pengantar' => $file['file_name'],
							'gambar_akta_kelahiran' => $file2['file_name'],
							'waktu' => date('Y-m-d H:i:s'),
							'kode' => $kode,
							'status' => 'belum',
						];
						
						$this->MyModel->addKependudukan($data);
						$alert = "<script>alert('Berhasil!');</script>";
						$this->session->set_flashdata('message', $alert);
						redirect('pelayanan');
					} else {
						$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
						$this->session->set_flashdata('error', $alert);
						redirect('kependudukan/tambah');
					}
					 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('kependudukan/tambah');
				}
			}
		}
	}

	public function suket_menikah_add() {

	}

	public function suket_izin_acara_add() {

	}

	public function suket_izin_usaha_add() {

	}

	public function akta_add() {
		
	}

	public function suket_pindah_add() {

	}

	public function suket_kematian_add() {

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
        
                            