<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Petugas extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('MyModel');
	}

	public function index(){
		$this->load->view('template/header_pet');
		$this->load->view('petugas/beranda');
		$this->load->view('template/footer_pet');
		
	}

	public function laporanPengaduan(){
		$data['pengaduan'] = $this->MyModel->getPengaduan();
		$data['status'] = ['belum','proses','selesai'];

		$this->load->view('template/header_pet');
		$this->load->view('petugas/laporan_pengaduan', $data);
		$this->load->view('template/footer_pet');		

		
	}
	
	public function editStatusPengaduan() {
		if(empty($this->input->post('status'))) {
			$alert = "<script>alert('Status tidak boleh kosong!');</script>";
			$this->session->set_flashdata('message', $alert);
			redirect('petugas/laporan-pengaduan');
		} else {
			$this->db->set('status',$this->input->post('status'));
			$this->db->where('id_pengaduan', $this->input->post('id_pengaduan'));
			$this->db->update('pengaduan');
			$alert = "<script>alert('Berhasil!');</script>";
			$this->session->set_flashdata('message', $alert);
			redirect('petugas/laporan-pengaduan');
		}
		
	}

	public function pengaduan_del($id) {
		$pd = $this->MyModel->getPengaduanByID($id);
		unlink('assets/img/pengaduan/'.$pd['foto']);
		$this->MyModel->delPengaduan($id);
		$alert = "<script>alert('Berhasil!');</script>";
		$this->session->set_flashdata('message', $alert);
		redirect('petugas/laporan-pengaduan'); 	
	}

	// Penduduk
	public function penduduk() {
		if($this->input->post('search')) {
			$this->db->like('nik', $this->input->post('search'));
			$this->db->or_like('nama_lengkap', $this->input->post('search'));
			$this->db->order_by('nik','asc');
			$data['penduduk'] = $this->db->get('penduduk')->result_array();
		} else {
			$data['penduduk'] = $this->MyModel->getPenduduk();
		}
		$this->load->view('template/header_pet');
		$this->load->view('petugas/penduduk', $data);
		$this->load->view('template/footer_pet');	
	}

	public function addPenduduk() {

		$data['jenis_kelamin'] = ['l','p'];
		$data['status_perkawinan'] = ['belum kawin','sudah kawin'];
		

		$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');
		$this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
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
		$this->form_validation->set_rules('kata_sandi', 'Kata Sandi', 'trim|required|matches[konfirmasi_kata_sandi]');
		$this->form_validation->set_rules('konfirmasi_kata_sandi', 'Konfirmasi Kata Sandi', 'trim|required|matches[kata_sandi]');
		
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/penduduk_add', $data);
			$this->load->view('template/footer_pet');
		} else {
			if(empty($_FILES['foto']['name'])) {
				$alert = "<script>alert('Foto tidak boleh kosong!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/penduduk/tambah');
			} else {
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
						'kata_sandi' => password_hash( $this->input->post('kata_sandi'), PASSWORD_DEFAULT),
						'foto' => $file['file_name'],
						
					];
					
					$this->MyModel->addPenduduk($data);
					$alert = "<script>alert('Berhasil!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('petugas/penduduk'); 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('petugas/penduduk/tambah');
				}
			}
		}
		
	}

	public function editPenduduk($id) {
		$data['pd'] = $this->MyModel->getPendudukByID($id);
		$data['jenis_kelamin'] = ['l','p'];
		$data['status_perkawinan'] = ['belum kawin','sudah kawin'];
		

		$this->form_validation->set_rules('nik', 'NIK', 'trim|required');
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('tmp_lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('kewarganegaraan', 'Kewarganegaraan', 'trim|required');
		$this->form_validation->set_rules('status_perkawinan', 'Status Perkawinan', 'trim|required');
		$this->form_validation->set_rules('agama', 'Agama', 'trim|required');
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
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/penduduk_edit', $data);
			$this->load->view('template/footer_pet');
		} else {
			if(empty($_FILES['foto']['name'])) {
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
					
					
				];
				
				$this->MyModel->editPenduduk($id,$data);
				$alert = "<script>alert('Berhasil!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/penduduk'); 	
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
					redirect('petugas/penduduk'); 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('petugas/penduduk/edit/'.$id);
				}
			}
		}
	}

	public function delPenduduk($id) {
		$gbr = $this->MyModel->getPendudukByID($id);
		unlink('assets/img/penduduk/'.$gbr['foto']);
		$this->MyModel->delPenduduk($id);
		$alert = "<script>alert('Berhasil!');</script>";
		$this->session->set_flashdata('message', $alert);
		redirect('petugas/penduduk');
	}

	public function sandiPenduduk($id) {
		$pd = $this->MyModel->getPendudukByID($id);

		$this->form_validation->set_rules('password_lama', 'Kata Sandi Lama', 'required|trim');
        $this->form_validation->set_rules('password1', 'Kata Sandi Baru', 'required|trim|matches[password2]');
		$this->form_validation->set_rules('password2', 'Ulangi Kata Sandi', 'required|trim|matches[password1]');

		
		if ($this->form_validation->run() == FALSE) {

			$this->load->view('template/header_pet');
			$this->load->view('petugas/penduduk_gantisandi');
			$this->load->view('template/footer_pet');
		} else {
			$pass_lama = $this->input->post('password_lama');
			$pass_baru = $this->input->post('password1');

			if(!password_verify($pass_lama, $pd['kata_sandi'])) {
				$alert = "<script>alert('Kata Sandi Lama Salah!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/penduduk/gantisandi/'.$id);
			} else {
				if($pass_lama == $pass_baru) {
					$alert = "<script>alert('Kata Sandi Lama tidak boleh sama dengan Kata Sandi Baru!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('petugas/penduduk/gantisandi/'.$id);
				} else {
					$pass = password_hash($pass_baru, PASSWORD_DEFAULT);
                    $this->db->set('kata_sandi', $pass);
                    $this->db->where('id_penduduk', $id);
					$this->db->update('penduduk');
					
					$alert = "<script>alert('Berhasil!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('petugas/penduduk');
				}
			}
		}
	}
	// Pelayanan
	public function pelayanan() {
		if($this->input->post('search')) {
			$this->db->join('penduduk','penduduk.id_penduduk = pelayanan.id_penduduk','left');
			$this->db->order_by('nik','asc');
			$this->db->like('nik', $this->input->post('search'));
			$this->db->or_like('nama_lengkap', $this->input->post('search'));
			$this->db->or_like('kode', $this->input->post('search'));
			$data['pelayanan'] = $this->db->get('pelayanan')->result_array();
		} else {
			$data['pelayanan'] = $this->MyModel->getPelayanan();
		}

		

		$this->load->view('template/header_pet');
		$this->load->view('petugas/pelayanan', $data);
		$this->load->view('template/footer_pet');	
	}

	public function pelayanan_add() {
		$data['penduduk'] = $this->MyModel->getPenduduk();
		$data['jenis_pelayanan'] = ['Kartu Keluarga','SKCK','Surat Keterangan Belum Menikah','Surat Keterangan Sudah Menikah','Surat Keterangan Tidak Mampu','Domisili'];
		$data['keperluan'] = ['membuat','merubah'];

		$this->form_validation->set_rules('id_penduduk', 'NIK', 'trim|required');
		$this->form_validation->set_rules('jenis_pelayanan', 'Jenis Pelayanan', 'trim|required');
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/pelayanan_add', $data);
			$this->load->view('template/footer_pet');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name'])) {
				$alert = "<script>alert('Surat Pengantar tidak boleh kosong!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/pelayanan/tambah');
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
					redirect('petugas/pelayanan'); 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('petugas/pelayanan/tambah');
				}
			}
		}
		

	}

	public function pelayanan_edit($id) {
		$data['penduduk'] = $this->MyModel->getPenduduk();
		$data['jenis_pelayanan'] = ['Kartu Keluarga','SKCK','Surat Keterangan Belum Menikah','Surat Keterangan Sudah Menikah','Surat Keterangan Tidak Mampu','Domisili'];
		$data['keperluan'] = ['membuat','merubah'];
		$data['status'] = ['belum','proses','selesai'];

		$data['ply'] = $this->MyModel->getPelayananByID($id);

		$this->form_validation->set_rules('id_penduduk', 'NIK', 'trim|required');
		$this->form_validation->set_rules('jenis_pelayanan', 'Jenis Pelayanan', 'trim|required');
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/pelayanan_edit', $data);
			$this->load->view('template/footer_pet');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name'])) {
				$data = [
					'id_penduduk' => $this->input->post('id_penduduk'),
					'jenis_pelayanan' => $this->input->post('jenis_pelayanan'),
					'keperluan' => $this->input->post('keperluan'),
					'status' => $this->input->post('status'),
				];
				
				$this->MyModel->editPelayanan($id,$data);
				$alert = "<script>alert('Berhasil!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/pelayanan');
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

					

					$data = [
						'id_penduduk' => $this->input->post('id_penduduk'),
						'jenis_pelayanan' => $this->input->post('jenis_pelayanan'),
						'keperluan' => $this->input->post('keperluan'),
						'gambar_surat_pengantar' => $file['file_name'],
						'status' => $this->input->post('status'),
					];
					
					$this->MyModel->editPelayanan($id,$data);
					$alert = "<script>alert('Berhasil!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('petugas/pelayanan'); 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('petugas/pelayanan/tambah');
				}
			}
		}
	}

	public function pelayanan_del($id) {
		$ply = $this->MyModel->getPelayananByID($id);
		unlink('assets/img/pelayanan/'.$ply['gambar_surat_pengantar']);
		$this->MyModel->delPelayanan($id);
		$alert = "<script>alert('Berhasil!');</script>";
		$this->session->set_flashdata('message', $alert);
		redirect('petugas/pelayanan'); 
	}

	// Kependudukan
	public function kependudukan() {
		if($this->input->post('search')) {
			$this->db->join('penduduk','penduduk.id_penduduk = pelayanan.id_penduduk','left');
			$this->db->order_by('nik','asc');
			$this->db->like('nik', $this->input->post('search'));
			$this->db->or_like('nama_lengkap', $this->input->post('search'));
			$this->db->or_like('kode', $this->input->post('search'));
			$data['kependudukan'] = $this->db->get('kependudukan')->result_array();
		} else {
			$data['kependudukan'] = $this->MyModel->getKependudukan();
		}

		

		$this->load->view('template/header_pet');
		$this->load->view('petugas/kependudukan', $data);
		$this->load->view('template/footer_pet');	
	}

	public function kependudukan_add() {
		$data['penduduk'] = $this->MyModel->getPenduduk();
		$data['jenis_pelayanan'] = ['KTP','KIA'];
		$data['keperluan'] = ['membuat','merubah'];

		$this->form_validation->set_rules('id_penduduk', 'NIK', 'trim|required');
		$this->form_validation->set_rules('jenis_pelayanan', 'Jenis Pelayanan', 'trim|required');
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/kependudukan_add', $data);
			$this->load->view('template/footer_pet');
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
						redirect('petugas/kependudukan');
					} else {
						$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
						$this->session->set_flashdata('error', $alert);
						redirect('petugas/kependudukan/tambah');
					}
					 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('petugas/kependudukan/tambah');
				}
			}
		}
	}

	public function kependudukan_edit($id) {

	}

	public function kependudukan_del($id) {
		$kpn = $this->MyModel->getKependudukanByID($id);
		unlink('assets/img/kependudukan/'.$kpn['gambar_surat_pengantar']);
		unlink('assets/img/kependudukan/'.$kpn['gambar_akta_kelahiran']);
		$this->MyModel->delKependudukan($id);
		$alert = "<script>alert('Berhasil!');</script>";
		$this->session->set_flashdata('message', $alert);
		redirect('petugas/kependudukan'); 	
	}
         
}
        
    /* End of file  Petugas.php */
        
                            