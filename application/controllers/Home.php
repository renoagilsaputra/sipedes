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

	public function data_diri() {
		if($this->session->userdata('id_penduduk')) {

			$this->load->view('template/header');
			$this->load->view('data-diri');
			$this->load->view('template/footer');
		} else {
			redirect(base_url('login'));
		}
	}

	public function data_diri_edit() {
		$id = $this->session->userdata('id_penduduk');
		if($this->session->userdata('id_penduduk')) {
			$data['jenis_kelamin'] = ['l','p'];
			$data['status_perkawinan'] = ['belum kawin','sudah kawin'];

			$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
			$this->form_validation->set_rules('no_kk', 'No KK', 'trim|required');
			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
			$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
			$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');
			$this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'trim|required');
			$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
			$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required');
			$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required');
			$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
			$this->form_validation->set_rules('telp', 'Telp', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('rt', 'RT', 'trim|required');
			$this->form_validation->set_rules('rw', 'RW', 'trim|required');
			$this->form_validation->set_rules('no_rumah', 'No Rumah', 'trim|required');
			$this->form_validation->set_rules('kelurahan_desa', 'Kelurahan / Desa', 'trim|required');
			$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
			$this->form_validation->set_rules('kabupaten_kota', 'Kabupaten / Kota', 'trim|required');
			$this->form_validation->set_rules('kode_pos', 'Kode Pos', 'trim|required');
			
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('template/header');
				$this->load->view('data-diri-edit', $data);
				$this->load->view('template/footer');
			
				
			} else {
				if(empty($_FILES['foto']['name'])) {
					$data = [
						'nik' => $this->input->post('nik'),
						'no_kk' => $this->input->post('no_kk'),
						'nama_lengkap' =>  $this->input->post('nama_lengkap'),
						'tmp_lahir' =>  $this->input->post('tmp_lahir'),
						'tgl_lahir' =>  $this->input->post('tgl_lahir'),
						'jk' =>  $this->input->post('jk'),
						'kewarganegaraan' =>  $this->input->post('kewarganegaraan'),
						'status_perkawinan' =>  $this->input->post('status_perkawinan'),
						'agama' =>  $this->input->post('agama'),
						'nama_ayah' =>  $this->input->post('nama_ayah'),
						'nama_ibu' =>  $this->input->post('nama_ibu'),
						'pekerjaan' =>  $this->input->post('pekerjaan'),
						'telp' =>  $this->input->post('telp'),
						'alamat' =>  $this->input->post('alamat'),
						'rt' =>  $this->input->post('rt'),
						'rw' =>  $this->input->post('rw'),
						'no_rumah' =>  $this->input->post('no_rumah'),
						'kelurahan_desa' =>  $this->input->post('kelurahan_desa'),
						'kecamatan' =>  $this->input->post('kecamatan'),
						'kabupaten_kota' =>  $this->input->post('kabupaten_kota'),
						'kode_pos' =>  $this->input->post('kode_pos'),
						
						
					];
					
					$this->MyModel->editPenduduk($id,$data);
					$alert = "<script>alert('Berhasil!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('data-diri'); 	
				} else {
					$gbr = $this->MyModel->getPendudukByID($id);
					unlink('assets/img/penduduk/'.$gbr['foto']);
					$config = [
						'file_name' => 'penduduk-'.$this->input->post('nik'),
						'upload_path' => './assets/img/penduduk/',
						'allowed_types' => 'jpg|png|jpeg',
						'max_size' => 1024,
					];
					
					$this->load->library('upload', $config);
	
					if($this->upload->do_upload('foto')) {
						$file = $this->upload->data();
						$data = [
							'nik' => $this->input->post('nik'),
							'nama_lengkap' =>  $this->input->post('nama_lengkap'),
							'tmp_lahir' =>  $this->input->post('tmp_lahir'),
							'tgl_lahir' =>  $this->input->post('tgl_lahir'),
							'jk' =>  $this->input->post('jk'),
							'kewarganegaraan' =>  $this->input->post('kewarganegaraan'),
							'status_perkawinan' =>  $this->input->post('status_perkawinan'),
							'agama' =>  $this->input->post('agama'),
							'pekerjaan' =>  $this->input->post('pekerjaan'),
							'telp' =>  $this->input->post('telp'),
							'alamat' =>  $this->input->post('alamat'),
							'rt' =>  $this->input->post('rt'),
							'rw' =>  $this->input->post('rw'),
							'no_rumah' =>  $this->input->post('no_rumah'),
							'kelurahan_desa' =>  $this->input->post('kelurahan_desa'),
							'kecamatan' =>  $this->input->post('kecamatan'),
							'kabupaten_kota' =>  $this->input->post('kabupaten_kota'),
							'kode_pos' =>  $this->input->post('kode_pos'),
							'foto' => $file['file_name'],
							
						];
						
						$this->MyModel->editPenduduk($id,$data);
						$alert = "<script>alert('Berhasil!');</script>";
						$this->session->set_flashdata('message', $alert);
						redirect('data-diri'); 	
					} else {
						$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
						$this->session->set_flashdata('error', $alert);
						redirect('data-diri-edit');
					}
				}
			}
		} else {
			redirect(base_url('login'));
		}
	}

	public function data_diri_pass() {
		$id = $this->session->userdata('id_penduduk');
		$pd = $this->MyModel->getPendudukByID($id);

		$this->form_validation->set_rules('password_lama', 'Kata Sandi Lama', 'required|trim');
        $this->form_validation->set_rules('password1', 'Kata Sandi Baru', 'required|trim|matches[password2]');
		$this->form_validation->set_rules('password2', 'Ulangi Kata Sandi', 'required|trim|matches[password1]');

		
		if ($this->form_validation->run() == FALSE) {

			$this->load->view('template/header');
			$this->load->view('data-diri-pass');
			$this->load->view('template/footer');
		} else {
			$pass_lama = $this->input->post('password_lama');
			$pass_baru = $this->input->post('password1');

			if(!password_verify($pass_lama, $pd['kata_sandi'])) {
				$alert = "<script>alert('Kata Sandi Lama Salah!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('data-diri-gantisandi');
			} else {
				if($pass_lama == $pass_baru) {
					$alert = "<script>alert('Kata Sandi Lama tidak boleh sama dengan Kata Sandi Baru!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('data-diri-gantisandi');
				} else {
					$pass = password_hash($pass_baru, PASSWORD_DEFAULT);
                    $this->db->set('kata_sandi', $pass);
                    $this->db->where('id_penduduk', $id);
					$this->db->update('penduduk');
					
					$alert = "<script>alert('Berhasil!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('data-diri');
				}
			}
		}
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
		$data['jenis_kelamin'] = ['l','p'];
		$data['status_perkawinan'] = ['belum kawin','sudah kawin'];
		

		$this->form_validation->set_rules('nik', 'NIK Pasangan', 'trim|required');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');
		$this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required');
		$this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'trim|required');
		$this->form_validation->set_rules('telp', 'Telp', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('rt', 'RT', 'trim|required');
		$this->form_validation->set_rules('rw', 'RW', 'trim|required');
		$this->form_validation->set_rules('no_rumah', 'No Rumah', 'trim|required');
		$this->form_validation->set_rules('kelurahan_desa', 'Kelurahan / Desa', 'trim|required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('kabupaten_kota', 'Kabupaten / Kota', 'trim|required');
		$this->form_validation->set_rules('provinsi', 'Provinsi', 'trim|required');
		
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header');
			$this->load->view('suket_menikah_add', $data);
			$this->load->view('template/footer');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name']) || empty($_FILES['gambar_akta_kelahiran'])) {
				$alert = "<script>alert('Surat Pengantar / Akta kelahiran tidak boleh kosong!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('suket_menikah/tambah');
			} else {
				$config = [
                    'file_name' => 'suket_nikah',
                    'upload_path' => './assets/img/suket_nikah/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'max_size' => 1024,
				];

				
				
				$this->load->library('upload', $config);
		

				if($this->upload->do_upload('gambar_surat_pengantar')) {
					$file = $this->upload->data();
					if($this->upload->do_upload('gambar_akta_kelahiran')) {
						$file2 = $this->upload->data();

						$query = $this->db->query("SELECT MAX(kode) as kode from suket_menikah");
						$kodeMax = $query->row_array();

						$nourut = substr($kodeMax['kode'], 3, 4);
						$urutan = $nourut + 1;
						$huruf = "SKN";
						$kode = $huruf . sprintf("%03s", $urutan);

						$data = [
							
							'nik' => $this->input->post('nik'),
							'nama_lengkap' =>  $this->input->post('nama_lengkap'),
							'tmp_lahir' =>  $this->input->post('tmp_lahir'),
							'tgl_lahir' =>  $this->input->post('tgl_lahir'),
							'jk' =>  $this->input->post('jk'),
							'kewarganegaraan' =>  $this->input->post('kewarganegaraan'),
							'status_perkawinan' =>  $this->input->post('status_perkawinan'),
							'agama' =>  $this->input->post('agama'),
							'nama_ayah' =>  $this->input->post('nama_ayah'),
							'nama_ibu' =>  $this->input->post('nama_ibu'),
							'pekerjaan' =>  $this->input->post('pekerjaan'),
							'alamat' =>  $this->input->post('alamat'),
							'rt' =>  $this->input->post('rt'),
							'rw' =>  $this->input->post('rw'),
							'no_rumah' =>  $this->input->post('no_rumah'),
							'kelurahan_desa' =>  $this->input->post('kelurahan_desa'),
							'kecamatan' =>  $this->input->post('kecamatan'),
							'kabupaten_kota' =>  $this->input->post('kabupaten_kota'),
							'provinsi' =>  $this->input->post('provinsi'),
							'no_telp' =>  $this->input->post('telp'),
							
						];

						$this->db->insert('pasangan', $data);
						$id_pasangan = $this->db->insert_id();

						$dt = [
							'id_penduduk' => $this->input->post('id_penduduk'),
							'id_pasangan' => $id_pasangan,
							'gambar_surat_pengantar' => $file['file_name'],
							'gambar_akta_kelahiran' => $file2['file_name'],
							'waktu' => date('Y-m-d H:i:s'),
							'kode' => $kode,
							'status' => 'belum',
						];
						
						$this->MyModel->addNikah($dt);
						$alert = "<script>alert('Berhasil!');</script>";
						$this->session->set_flashdata('message', $alert);
						redirect('pelayanan');
					} else {
						$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
						$this->session->set_flashdata('error', $alert);
						redirect('suket_menikah/tambah');
					}
					 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('suket_menikah/tambah');
				}
			}
		}
	}

	public function suket_izin_acara_add() {

		$this->form_validation->set_rules('acara', 'Acara', 'trim|required');
		$this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'trim|required');
		$this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header');
			$this->load->view('suket_izin_acara_add');
			$this->load->view('template/footer');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name'])) {
				$alert = "<script>alert('Surat Pengantar tidak boleh kosong!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('izin_usaha/tambah');
			} else {
				$config = [
                    'file_name' => 'izin_acara_surat_pengantar',
                    'upload_path' => './assets/img/izin_acara/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'max_size' => 1024,
				];
				
				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar_surat_pengantar')) {
					$file = $this->upload->data();

					$query = $this->db->query("SELECT MAX(kode) as kode from izin_acara");
					$kodeMax = $query->row_array();

					$nourut = substr($kodeMax['kode'], 3, 4);
					$urutan = $nourut + 1;
					$huruf = "IZA";
					$kode = $huruf . sprintf("%03s", $urutan);

					$data = [
						'id_penduduk' => $this->input->post('id_penduduk'),
						'acara' => $this->input->post('acara'),
						'tgl_mulai' => $this->input->post('tgl_mulai'),
						'tgl_selesai' => $this->input->post('tgl_selesai'),
						'lokasi' => $this->input->post('lokasi'),
						'jenis_acara' => $this->input->post('jenis_acara'),
						'gambar_surat_pengantar' => $file['file_name'],
						'waktu' => date('Y-m-d H:i:s'),
						'kode' => $kode,
						'status' => 'belum',
					];
					
					$this->MyModel->addAcara($data);
					$alert = "<script>alert('Berhasil!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('pelayanan'); 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('izin_acara/tambah');
				}
			}
		}
	}

	public function suket_izin_usaha_add() {
		$this->form_validation->set_rules('id_penduduk', 'NIK', 'trim|required');
		$this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'trim|required');
		$this->form_validation->set_rules('jenis_usaha', 'Jenis Usaha', 'trim|required');
		$this->form_validation->set_rules('modal_usaha', 'Modal Usaha', 'trim|required');
		$this->form_validation->set_rules('tempat_usaha', 'Tempat Usaha', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header');
			$this->load->view('suket_izin_usaha_add');
			$this->load->view('template/footer');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name'])) {
				$alert = "<script>alert('Surat Pengantar tidak boleh kosong!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('izin_usaha/tambah');
			} else {
				$config = [
                    'file_name' => 'izin_usaha_surat_pengantar',
                    'upload_path' => './assets/img/izin_usaha/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'max_size' => 1024,
				];
				
				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar_surat_pengantar')) {
					$file = $this->upload->data();

					$query = $this->db->query("SELECT MAX(kode) as kode from izin_usaha");
					$kodeMax = $query->row_array();

					$nourut = substr($kodeMax['kode'], 3, 4);
					$urutan = $nourut + 1;
					$huruf = "IZU";
					$kode = $huruf . sprintf("%03s", $urutan);

					$data = [
						'id_penduduk' => $this->input->post('id_penduduk'),
						'nama_usaha' => $this->input->post('nama_usaha'),
						'jenis_usaha' => $this->input->post('jenis_usaha'),
						'modal_usaha' => $this->input->post('modal_usaha'),
						'tempat_usaha' => $this->input->post('tempat_usaha'),
						'gambar_surat_pengantar' => $file['file_name'],
						'waktu' => date('Y-m-d H:i:s'),
						'kode' => $kode,
						'status' => 'belum',
					];
					
					$this->MyModel->addUsaha($data);
					$alert = "<script>alert('Berhasil!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('pelayanan'); 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('izin_usaha/tambah');
				}
			}
		}
	}

	public function akta_add() {
		$data['jenis_kelamin'] = ['l','p'];
		
		
		$this->form_validation->set_rules('id_penduduk', 'NIK', 'trim|required');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required');
		$this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required');
		
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('rt', 'RT', 'trim|required');
		$this->form_validation->set_rules('rw', 'RW', 'trim|required');
		$this->form_validation->set_rules('no_rumah', 'No Rumah', 'trim|required');
		$this->form_validation->set_rules('kelurahan_desa', 'Kelurahan / Desa', 'trim|required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('kabupaten_kota', 'Kabupaten / Kota', 'trim|required');
		$this->form_validation->set_rules('kode_pos', 'Kode Pos', 'trim|required');
		
		
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header');
			$this->load->view('akta_add', $data);
			$this->load->view('template/footer');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name'])) {
				$alert = "<script>alert('Foto tidak boleh kosong!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('akta/tambah');
			} else {
				$config = [
                    'file_name' => 'akta',
                    'upload_path' => './assets/img/akta/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'max_size' => 1024,
				];
				
				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar_surat_pengantar')) {
					$file = $this->upload->data();

					$query = $this->db->query("SELECT MAX(kode) as kode from akta_kelahiran");
					$kodeMax = $query->row_array();

					$nourut = substr($kodeMax['kode'], 3, 4);
					$urutan = $nourut + 1;
					$huruf = "AKT";
					$kode = $huruf . sprintf("%03s", $urutan);

					$data = [
						'id_penduduk' => $this->input->post('id_penduduk'),
						'nama_lengkap' =>  $this->input->post('nama_lengkap'),
						'tmp_lahir' =>  $this->input->post('tmp_lahir'),
						'tgl_lahir' =>  $this->input->post('tgl_lahir'),
						'jk' =>  $this->input->post('jk'),
						'kewarganegaraan' =>  $this->input->post('kewarganegaraan'),
						'agama' =>  $this->input->post('agama'),
						'nama_ayah' =>  $this->input->post('nama_ayah'),
						'nama_ibu' =>  $this->input->post('nama_ibu'),
					
						'alamat' =>  $this->input->post('alamat'),
						'rt' =>  $this->input->post('rt'),
						'rw' =>  $this->input->post('rw'),
						'no_rumah' =>  $this->input->post('no_rumah'),
						'kelurahan_desa' =>  $this->input->post('kelurahan_desa'),
						'kecamatan' =>  $this->input->post('kecamatan'),
						'kabupaten_kota' =>  $this->input->post('kabupaten_kota'),
						'kode_pos' =>  $this->input->post('kode_pos'),
						'gambar_surat_pengantar' => $file['file_name'],
						'waktu' => date('Y-m-d H:i:s'),
						'kode' => $kode,
						'status' => 'belum',
						
					];
					
					$this->MyModel->addAkta($data);
					$alert = "<script>alert('Berhasil!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('pelayanan'); 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('akta/tambah');
				}
			}
		}
	}

	public function suket_pindah_add() {
		$data['status_kependudukan'] = ['warga desa','warga luar'];
		

		$this->form_validation->set_rules('id_penduduk', 'NIK', 'trim|required');
		$this->form_validation->set_rules('status_kependudukan', 'Status Kependudukan', 'trim|required');
		$this->form_validation->set_rules('jml_keluarga_pindah', 'Jumlah Keluarga Pindah', 'trim|required');
		$this->form_validation->set_rules('pindah_ke', 'Pindah Ke', 'trim|required');
		$this->form_validation->set_rules('tgl_pindah', 'Tanggal Pindah', 'trim|required');
		$this->form_validation->set_rules('kelurahan_desa', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('kabupaten_kota', 'Kabupaten / Kota', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header');
			$this->load->view('suket_pindah_add', $data);
			$this->load->view('template/footer');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name'])) {
				$alert = "<script>alert('Surat Pengantar tidak boleh kosong!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('suket_pindah/tambah');
			} else {
				$config = [
                    'file_name' => 'suket_pindah',
                    'upload_path' => './assets/img/suket_pindah/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'max_size' => 1024,
				];
				
				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar_surat_pengantar')) {
					$file = $this->upload->data();

					$query = $this->db->query("SELECT MAX(kode) as kode from suket_pindah");
					$kodeMax = $query->row_array();

					$nourut = substr($kodeMax['kode'], 3, 4);
					$urutan = $nourut + 1;
					$huruf = "SKP";
					$kode = $huruf . sprintf("%03s", $urutan);

					$data = [
						'id_penduduk' => $this->input->post('id_penduduk'),
						'status_kependudukan' => $this->input->post('status_kependudukan'),
						'jml_keluarga_pindah' => $this->input->post('jml_keluarga_pindah'),
						'pindah_ke' => $this->input->post('pindah_ke'),
						'tgl_pindah' => $this->input->post('tgl_pindah'),
						'kelurahan_desa' => $this->input->post('kelurahan_desa'),
						'kecamatan' => $this->input->post('kecamatan'),
						'kabupaten_kota' => $this->input->post('kabupaten_kota'),
						'gambar_surat_pengantar' => $file['file_name'],
						'waktu' => date('Y-m-d H:i:s'),
						'kode' => $kode,
						'status' => 'belum',
					];
					
					$this->MyModel->addPindah($data);
					$alert = "<script>alert('Berhasil!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('pelayanan'); 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('suket_pindah/tambah');
				}
			}
		}
	}

	public function keluarga_pindah($id) {
		$data['kel'] = $this->MyModel->getKelPindah($id);
		$this->load->view('template/header');
		$this->load->view('keluarga_pindah', $data);
		$this->load->view('template/footer');
	}
	public function keluarga_pindah_add() {
		$id_suket_pindah = $this->input->post('id_suket_pindah');
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');

		if(empty($nik) || empty($nama)) {
			$alert = "<script>alert('Kolom tidak boleh kosong!');</script>";
			$this->session->set_flashdata('message', $alert);
			redirect('keluarga_pindah/'.$id_suket_pindah);
		} else {

			$data = [
				'id_suket_pindah' => $id_suket_pindah,
				'nik' => $nik,
				'nama' => $nama	
			];
	
			$this->MyModel->addKelPindah($data);
			$alert = "<script>alert('Berhasil!');</script>";
			$this->session->set_flashdata('message', $alert);
			redirect('keluarga_pindah/'.$id_suket_pindah);
		}

	}

	public function suket_kematian_add() {
		$data['penduduk'] = $this->MyModel->getPenduduk();
	
		$this->form_validation->set_rules('id_mati', 'NIK Penduduk Mati', 'trim|required');
		$this->form_validation->set_rules('waktu_kematian', 'Waktu Kematian', 'trim|required');
		
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header');
			$this->load->view('suket_mati_add', $data);
			$this->load->view('template/footer');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name'])) {
				$alert = "<script>alert('Surat Pengantar tidak boleh kosong!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/suket_pindah/tambah');
			} else {
				$config = [
                    'file_name' => 'suket_mati',
                    'upload_path' => './assets/img/suket_mati/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'max_size' => 1024,
				];
				
				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar_surat_pengantar')) {
					$file = $this->upload->data();

					$query = $this->db->query("SELECT MAX(kode) as kode from suket_kematian");
					$kodeMax = $query->row_array();

					$nourut = substr($kodeMax['kode'], 3, 4);
					$urutan = $nourut + 1;
					$huruf = "SKM";
					$kode = $huruf . sprintf("%03s", $urutan);

					$data = [
						'id_penduduk' => $this->input->post('id_mati'),
					];
					$this->db->insert('penduduk_mati', $data);
					$id_penduduk_mati = $this->db->insert_id();

					$dt = [
						'id_penduduk' => $this->input->post('id_penduduk'),
						'id_penduduk_mati' => $id_penduduk_mati,
						'waktu_kematian' => $this->input->post('waktu_kematian'),
						'gambar_surat_pengantar' => $file['file_name'],
						'waktu' => date('Y-m-d H:i:s'),
						'kode' => $kode,
						'status' => 'belum',
					];

					$this->MyModel->addMati($dt);


					
					
					$alert = "<script>alert('Berhasil!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('pelayanan'); 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('suket_mati/tambah');
				}
			}
		}
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
        
                            