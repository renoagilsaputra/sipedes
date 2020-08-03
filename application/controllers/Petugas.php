<?php 
        
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Petugas extends CI_Controller {

	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('MyModel');

		if(!$this->session->userdata('id_kasi')) {
            redirect(base_url('petugas/login'));
        }
	}

	public function index(){
		$this->load->view('template/header_pet');
		$this->load->view('petugas/beranda');
		$this->load->view('template/footer_pet');
		
	}

	public function pelayanan_cetak($id) {
		$this->db->join('penduduk','penduduk.id_penduduk = pelayanan.id_penduduk','left');
		$data['ply'] = $this->db->get_where('pelayanan', ['id_pelayanan' => $id])->row_array();
		$bln = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'April',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		];
		
		$data['tanggal'] = date('d').' '.$bln[date('m')].' '.date('Y');
		$this->load->view('petugas/cetak_pelayanan', $data);
		
	}
	public function suket_cetak($id) {
		$this->db->join('penduduk','penduduk.id_penduduk = kependudukan.id_penduduk','left');
		$data['ply'] = $this->db->get_where('kependudukan', ['id_kependudukan' => $id])->row_array();
		$bln = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'April',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		];
		
		$data['tanggal'] = date('d').' '.$bln[date('m')].' '.date('Y');
		$this->load->view('petugas/cetak_suket', $data);
	}
	public function belum_nikah_cetak($id) {
		$this->db->join('penduduk','penduduk.id_penduduk = pelayanan.id_penduduk','left');
		$data['ply'] = $this->db->get_where('pelayanan', ['id_pelayanan' => $id])->row_array();
		$bln = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'April',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		];
		
		$data['tanggal'] = date('d').' '.$bln[date('m')].' '.date('Y');
		$this->load->view('petugas/cetak_belum_menikah', $data);
	}
	public function sudah_nikah_cetak($id) {
		$this->db->join('penduduk','penduduk.id_penduduk = pelayanan.id_penduduk','left');
		$data['ply'] = $this->db->get_where('pelayanan', ['id_pelayanan' => $id])->row_array();
		$bln = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'April',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		];
		
		$data['tanggal'] = date('d').' '.$bln[date('m')].' '.date('Y');
		$this->load->view('petugas/cetak_sudah_nikah', $data);
	}
	public function tdk_mampu_cetak($id) {
		$this->db->join('penduduk','penduduk.id_penduduk = pelayanan.id_penduduk','left');
		$data['ply'] = $this->db->get_where('pelayanan', ['id_pelayanan' => $id])->row_array();
		$bln = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'April',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		];
		
		$data['tanggal'] = date('d').' '.$bln[date('m')].' '.date('Y');
		$this->load->view('petugas/cetak_tidak_mampu', $data);
	}
	public function domisili_cetak($id) {
		$this->db->join('penduduk','penduduk.id_penduduk = pelayanan.id_penduduk','left');
		$data['ply'] = $this->db->get_where('pelayanan', ['id_pelayanan' => $id])->row_array();
		$bln = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'April',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		];
		
		$data['tanggal'] = date('d').' '.$bln[date('m')].' '.date('Y');
		$this->load->view('petugas/cetak_domisili', $data);
	}

	public function usaha_cetak($id) {
		$this->db->join('penduduk','penduduk.id_penduduk = izin_usaha.id_penduduk','left');
		$data['ply'] = $this->db->get_where('izin_usaha', ['id_izin_usaha' => $id])->row_array();
		$bln = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'April',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		];
		
		$data['tanggal'] = date('d').' '.$bln[date('m')].' '.date('Y');
		$this->load->view('petugas/cetak_usaha', $data);
	}
	public function cerai_cetak($id) {
		$this->db->join('penduduk','penduduk.id_penduduk = pelayanan.id_penduduk','left');
		$data['ply'] = $this->db->get_where('pelayanan', ['id_pelayanan' => $id])->row_array();
		$bln = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'April',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		];
		
		$data['tanggal'] = date('d').' '.$bln[date('m')].' '.date('Y');
		$this->load->view('petugas/cetak_cerai', $data);
	}
	public function suket_nikah_cetak($id) {
		$this->db->join('penduduk','penduduk.id_penduduk = suket_menikah.id_penduduk','left');
		$data['ply'] = $this->db->get_where('suket_menikah', ['id_suket_menikah' => $id])->row_array();
		$bln = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'April',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		];
		
		$data['tanggal'] = date('d').' '.$bln[date('m')].' '.date('Y');
		$this->load->view('petugas/cetak_suket_nikah', $data);
	}
	public function suket_mati_cetak($id) {
		$this->db->join('penduduk','penduduk.id_penduduk = suket_kematian.id_penduduk','left');
		$data['ply'] = $this->db->get_where('suket_kematian', ['id_suket_kematian' => $id])->row_array();
		$bln = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'April',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		];
		
		$data['tanggal'] = date('d').' '.$bln[date('m')].' '.date('Y');
		$this->load->view('petugas/cetak_suket_mati', $data);
	}
	public function acara_cetak($id) {
		$this->db->join('penduduk','penduduk.id_penduduk = izin_acara.id_penduduk','left');
		$data['ply'] = $this->db->get_where('izin_acara', ['id_izin_acara' => $id])->row_array();
		$bln = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'April',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		];
		
		$data['tanggal'] = date('d').' '.$bln[date('m')].' '.date('Y');
		$this->load->view('petugas/cetak_acara', $data);
	}
	public function akta_cetak($id) {
		$this->db->join('penduduk','penduduk.id_penduduk = akta_kelahiran.id_penduduk','left');
		$data['ply'] = $this->db->get_where('akta_kelahiran', ['id_akta_kelahiran' => $id])->row_array();
		$bln = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'April',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		];
		
		$data['tanggal'] = date('d').' '.$bln[date('m')].' '.date('Y');
		$this->load->view('petugas/cetak_akta', $data);
	}
	public function pindah_cetak($id) {
		$this->db->join('penduduk','penduduk.id_penduduk = suket_pindah.id_penduduk','left');
		$data['ply'] = $this->db->get_where('suket_pindah', ['id_suket_pindah' => $id])->row_array();
		$bln = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'April',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		];
		
		$data['tanggal'] = date('d').' '.$bln[date('m')].' '.date('Y');
		$this->load->view('petugas/cetak_pindah', $data);
	}

	public function skck_cetak($id) {
		$this->db->join('penduduk','penduduk.id_penduduk = pelayanan.id_penduduk','left');
		$data['ply'] = $this->db->get_where('pelayanan', ['id_pelayanan' => $id])->row_array();
		$bln = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'April',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		];
		
		$data['tanggal'] = date('d').' '.$bln[date('m')].' '.date('Y');
		$this->load->view('petugas/cetak_skck', $data);
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
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/penduduk_edit', $data);
			$this->load->view('template/footer_pet');
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
		$data['jenis_pelayanan'] = ['Kartu Keluarga','SKCK','Surat Keterangan Cerai','Surat Keterangan Belum Menikah','Surat Keterangan Sudah Menikah','Surat Keterangan Tidak Mampu','Domisili'];
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
		$data['jenis_pelayanan'] = ['Kartu Keluarga','SKCK','Surat Keterangan Cerai','Surat Keterangan Belum Menikah','Surat Keterangan Sudah Menikah','Surat Keterangan Tidak Mampu','Domisili'];
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
		$data['penduduk'] = $this->MyModel->getPenduduk();
		$data['jenis_pelayanan'] = ['KTP','KIA'];
		$data['keperluan'] = ['membuat','merubah'];
		$data['status'] = ['belum','proses','selesai'];

		$data['kpn'] = $this->MyModel->getKependudukanByID($id);

		$this->form_validation->set_rules('id_penduduk', 'NIK', 'trim|required');
		$this->form_validation->set_rules('jenis_pelayanan', 'Jenis Pelayanan', 'trim|required');
		$this->form_validation->set_rules('keperluan', 'Keperluan', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/kependudukan_edit', $data);
			$this->load->view('template/footer_pet');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name']) && empty($_FILES['gambar_akta_kelahiran']['name'])) {
				$data = [
					'id_penduduk' => $this->input->post('id_penduduk'),
					'jenis_pelayanan' => $this->input->post('jenis_pelayanan'),
					'keperluan' => $this->input->post('keperluan'),
					'status' => $this->input->post('status'),
				];
				
				$this->MyModel->editKependudukan($id,$data);
				$alert = "<script>alert('Berhasil!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/kependudukan');
		
			} else if(empty($_FILES['gambar_surat_pengantar']['name'])) {
				unlink('assets/img/kependudukan/'.$data['kpn']['gambar_akta_kelahiran']);
				$config = [
                    'file_name' => 'kependudukan_bukti',
                    'upload_path' => './assets/img/kependudukan/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'max_size' => 1024,
				];
				$this->load->library('upload', $config);
				$this->upload->do_upload('gambar_akta_kelahiran');
				$file = $this->upload->data();

				$data = [
					'id_penduduk' => $this->input->post('id_penduduk'),
					'jenis_pelayanan' => $this->input->post('jenis_pelayanan'),
					'keperluan' => $this->input->post('keperluan'),	
					'gambar_akta_kelahiran' => $file['file_name'],					
					'status' => $this->input->post('status'),
				];
				
				$this->MyModel->editKependudukan($id,$data);
				$alert = "<script>alert('Berhasil!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/kependudukan');


			} else if(empty($_FILES['gambar_akta_kelahiran']['name'])) {
				unlink('assets/img/kependudukan/'.$data['kpn']['gambar_surat_pengantar']);
				$config = [
                    'file_name' => 'kependudukan_bukti',
                    'upload_path' => './assets/img/kependudukan/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'max_size' => 1024,
				];
				$this->load->library('upload', $config);
				$this->upload->do_upload('gambar_surat_pengantar');
				$file = $this->upload->data();

				$data = [
					'id_penduduk' => $this->input->post('id_penduduk'),
					'jenis_pelayanan' => $this->input->post('jenis_pelayanan'),
					'keperluan' => $this->input->post('keperluan'),	
					'gambar_surat_pengantar' => $file['file_name'],					
					'status' => $this->input->post('status'),
				];
				
				$this->MyModel->editKependudukan($id,$data);
				$alert = "<script>alert('Berhasil!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/kependudukan');
			} else {
				unlink('assets/img/kependudukan/'.$data['kpn']['gambar_surat_pengantar']);
				unlink('assets/img/kependudukan/'.$data['kpn']['gambar_akta_kelahiran']);
				$config = [
                    'file_name' => 'kependudukan_bukti',
                    'upload_path' => './assets/img/kependudukan/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'max_size' => 1024,
				];
				$this->load->library('upload', $config);
				$this->upload->do_upload('gambar_surat_pengantar');
				$file = $this->upload->data();
				$this->upload->do_upload('gambar_akta_kelahiran');
				$file2 = $this->upload->data();

				$data = [
					'id_penduduk' => $this->input->post('id_penduduk'),
					'jenis_pelayanan' => $this->input->post('jenis_pelayanan'),
					'keperluan' => $this->input->post('keperluan'),	
					'gambar_surat_pengantar' => $file['file_name'],					
					'gambar_akta_kelahiran' => $file2['file_name'],					
					'status' => $this->input->post('status'),
				];
				
				$this->MyModel->editKependudukan($id,$data);
				$alert = "<script>alert('Berhasil!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/kependudukan');
			}
		}
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
	// Akta Kelahiran
	public function akta() {
		if($this->input->post('search')) {
			$this->db->join('penduduk','penduduk.id_penduduk = akta_kelahiran.id_penduduk','left');
			$this->db->order_by('nik','asc');
			$this->db->like('nik', $this->input->post('search'));
			$this->db->or_like('akta_kelahiran.nama_lengkap', $this->input->post('search'));
			$this->db->or_like('kode', $this->input->post('search'));
			$data['akta'] = $this->db->get('akta_kelahiran')->result_array();
		} else {
			$data['akta'] = $this->MyModel->getAkta();
		}

		

		$this->load->view('template/header_pet');
		$this->load->view('petugas/akta', $data);
		$this->load->view('template/footer_pet');
	}

	public function akta_add() {
		$data['penduduk'] = $this->MyModel->getPenduduk();
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
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/akta_add', $data);
			$this->load->view('template/footer_pet');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name'])) {
				$alert = "<script>alert('Foto tidak boleh kosong!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/akta/tambah');
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
					redirect('petugas/akta'); 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('petugas/akta/tambah');
				}
			}
		}
	}


	public function akta_edit($id) {
		$data['penduduk'] = $this->MyModel->getPenduduk();
		$data['jenis_kelamin'] = ['l','p'];
		$data['status'] = ['belum','proses','selesai'];
		$data['akta'] = $this->MyModel->getAktaByID($id);		
		
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
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		
		
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/akta_edit', $data);
			$this->load->view('template/footer_pet');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name'])) {
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
					'status' => $this->input->post('status'),
					
				];
				
				$this->MyModel->editAkta($id,$data);
				$alert = "<script>alert('Berhasil!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/akta');
			} else {
				unlink('assets/img/akta/'.$data['akta']['gambar_surat_pengantar']);
				$config = [
                    'file_name' => 'akta',
                    'upload_path' => './assets/img/akta/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'max_size' => 1024,
				];
				
				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar_surat_pengantar')) {
					$file = $this->upload->data();

	

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
						'status' => $this->input->post('status'),
						
					];
					
					$this->MyModel->editAkta($id,$data);
					$alert = "<script>alert('Berhasil!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('petugas/akta'); 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('petugas/akta/edit/'.$id);
				}
			}
		}
	}

	public function akta_del($id) {
		$akt = $this->MyModel->getAktaByID($id);
		unlink('assets/img/akta/'.$akt['gambar_surat_pengantar']);
		$this->MyModel->delAkta($id);
		$alert = "<script>alert('Berhasil!');</script>";
		$this->session->set_flashdata('message', $alert);
		redirect('petugas/akta');
	}
	// Surat Keterangan Menikah
	public function suket_nikah() {
		if($this->input->post('search')) {
			$this->db->join('penduduk','penduduk.id_penduduk = suket_kematian.id_penduduk','left');
			$this->db->order_by('nik','asc');
			$this->db->like('nik', $this->input->post('search'));
			$this->db->or_like('akta_kelahiran.nama_lengkap', $this->input->post('search'));
			$this->db->or_like('kode', $this->input->post('search'));
			$data['nikah'] = $this->db->get('suket_menikah')->result_array();
		} else {
			$data['nikah'] = $this->MyModel->getNikah();
		}

		

		$this->load->view('template/header_pet');
		$this->load->view('petugas/suket_nikah', $data);
		$this->load->view('template/footer_pet');
	}
	public function suket_nikah_add() {
		$data['penduduk'] = $this->MyModel->getPenduduk();
		$data['jenis_kelamin'] = ['l','p'];
		$data['status_perkawinan'] = ['belum kawin','sudah kawin'];
		

		$this->form_validation->set_rules('id_penduduk', 'NIK Pengaju', 'trim|required');
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
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/suket_nikah_add', $data);
			$this->load->view('template/footer_pet');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name']) || empty($_FILES['gambar_akta_kelahiran'])) {
				$alert = "<script>alert('Surat Pengantar / Akta kelahiran tidak boleh kosong!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/suket_nikah/tambah');
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
						redirect('petugas/suket_nikah');
					} else {
						$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
						$this->session->set_flashdata('error', $alert);
						redirect('petugas/suket_nikah/tambah');
					}
					 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('petugas/suket_nikah/tambah');
				}
			}
		}
	}
	public function suket_nikah_edit($id) {
		$data['penduduk'] = $this->MyModel->getPenduduk();
		$data['jenis_kelamin'] = ['l','p'];
		$data['status_perkawinan'] = ['belum kawin','sudah kawin'];
		$data['status'] = ['belum','proses','selesai'];
		$data['nikah'] = $this->MyModel->getNikahByID($id);
		

		$this->form_validation->set_rules('id_penduduk', 'NIK Pengaju', 'trim|required');
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
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/suket_nikah_edit', $data);
			$this->load->view('template/footer_pet');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name']) && empty($_FILES['gambar_akta_kelahiran'])) {
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
				$this->db->where('id_pasangan', $this->input->post('id_pasangan'));
				$this->db->update('pasangan', $data);
		

				$dt = [
					'id_penduduk' => $this->input->post('id_penduduk'),
					'status' => $this->input->post('status'),
				];
				
				$this->MyModel->editNikah($id, $dt);
				$alert = "<script>alert('Berhasil!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/suket_nikah');
			} else if(empty($_FILES['gambar_surat_pengantar']['name'])){
				unlink('assets/img/suket_nikah/'.$data['nikah']['gambar_akta_kelahiran']);
				$config = [
                    'file_name' => 'suket_nikah',
                    'upload_path' => './assets/img/suket_nikah/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'max_size' => 1024,
				];
				
				$this->load->library('upload', $config);
			
				$this->upload->do_upload('gambar_akta_kelahiran');
				$file2 = $this->upload->data();
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
				$this->db->where('id_pasangan', $this->input->post('id_pasangan'));
				$this->db->update('pasangan', $data);
		

				$dt = [
					'id_penduduk' => $this->input->post('id_penduduk'),
					'gambar_akta_kelahiran' => $file2['file_name'],
					'status' => $this->input->post('status'),
				];
				
				$this->MyModel->editNikah($id, $dt);
				$alert = "<script>alert('Berhasil!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/suket_nikah');
			} else if(empty($_FILES['gambar_akta_kelahiran']['name'])) {
				unlink('assets/img/suket_nikah/'.$data['nikah']['gambar_surat_pengantar']);
				$config = [
                    'file_name' => 'suket_nikah',
                    'upload_path' => './assets/img/suket_nikah/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'max_size' => 1024,
				];
				
				$this->load->library('upload', $config);
				$this->upload->do_upload('gambar_surat_pengantar');
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
				$this->db->where('id_pasangan', $this->input->post('id_pasangan'));
				$this->db->update('pasangan', $data);
		

				$dt = [
					'id_penduduk' => $this->input->post('id_penduduk'),
					'gambar_surat_pengantar' => $file['file_name'],

					'status' => $this->input->post('status'),
				];
				
				$this->MyModel->editNikah($id, $dt);
				$alert = "<script>alert('Berhasil!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/suket_nikah');
			} else {
				unlink('assets/img/suket_nikah/'.$data['nikah']['gambar_surat_pengantar']);
				unlink('assets/img/suket_nikah/'.$data['nikah']['gambar_akta_kelahiran']);
				$config = [
                    'file_name' => 'suket_nikah',
                    'upload_path' => './assets/img/suket_nikah/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'max_size' => 1024,
				];
				
				$this->load->library('upload', $config);
				$this->upload->do_upload('gambar_surat_pengantar');
				$file = $this->upload->data();
				$this->upload->do_upload('gambar_akta_kelahiran');
				$file2 = $this->upload->data();
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
				$this->db->where('id_pasangan', $this->input->post('id_pasangan'));
				$this->db->update('pasangan', $data);
		

				$dt = [
					'id_penduduk' => $this->input->post('id_penduduk'),
					'gambar_surat_pengantar' => $file['file_name'],
					'gambar_akta_kelahiran' => $file2['file_name'],
					'status' => $this->input->post('status'),
				];
				
				$this->MyModel->editNikah($id, $dt);
				$alert = "<script>alert('Berhasil!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/suket_nikah');
			}
		}
	}
	public function suket_nikah_del($id) {
		$nk = $this->MyModel->getNikahByID($id);
		unlink('assets/img/suket_nikah/'.$nk['gambar_surat_pengantar']);
		unlink('assets/img/suket_nikah/'.$nk['gambar_akta_kelahiran']);
		$this->MyModel->delNikah($id);
		$alert = "<script>alert('Berhasil!');</script>";
		$this->session->set_flashdata('message', $alert);
		redirect('petugas/suket_nikah');
	}
	// Surat Keterangan Kematian
	public function suket_mati() {
		if($this->input->post('search')) {
			$this->db->select('*, penduduk_mati.id_penduduk as id_mati');
			$this->db->join('penduduk','penduduk.id_penduduk = suket_kematian.id_penduduk','left');
			$this->db->join('penduduk_mati','penduduk_mati.id_penduduk_mati = suket_kematian.id_penduduk_mati','left');
			$this->db->order_by('nik','asc');
			$this->db->like('nik', $this->input->post('search'));
			$this->db->or_like('akta_kelahiran.nama_lengkap', $this->input->post('search'));
			$this->db->or_like('kode', $this->input->post('search'));
			$data['mati'] = $this->db->get('suket_kematian')->result_array();
		} else {
			$data['mati'] = $this->MyModel->getMati();
		}

		

		$this->load->view('template/header_pet');
		$this->load->view('petugas/suket_mati', $data);
		$this->load->view('template/footer_pet');
	}
	public function suket_mati_add() {
		$data['penduduk'] = $this->MyModel->getPenduduk();
		

		$this->form_validation->set_rules('id_penduduk', 'NIK', 'trim|required');
		$this->form_validation->set_rules('id_mati', 'NIK Penduduk Mati', 'trim|required');
		$this->form_validation->set_rules('waktu_kematian', 'Waktu Kematian', 'trim|required');
		
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/suket_mati_add', $data);
			$this->load->view('template/footer_pet');
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
					redirect('petugas/suket_mati'); 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('petugas/suket_mati/tambah');
				}
			}
		}
	}
	public function suket_mati_edit($id) {
		$data['penduduk'] = $this->MyModel->getPenduduk();
		$data['mati'] = $this->MyModel->getMatiByID($id);
		$data['status'] = ['belum','proses','selesai'];
		

		$this->form_validation->set_rules('id_penduduk', 'NIK', 'trim|required');
		$this->form_validation->set_rules('id_mati', 'NIK Penduduk Mati', 'trim|required');
		$this->form_validation->set_rules('waktu_kematian', 'Waktu Kematian', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/suket_mati_edit', $data);
			$this->load->view('template/footer_pet');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name'])) {
				$data = [
					'id_penduduk' => $this->input->post('id_mati'),
				];
				$this->db->where('id_penduduk_mati', $this->input->post('id_penduduk_mati'));
				$this->db->update('penduduk_mati', $data);

				$dt = [
					'id_penduduk' => $this->input->post('id_penduduk'),
					'waktu_kematian' => $this->input->post('waktu_kematian'),
					'status' => $this->input->post('status'),
				];

				$this->MyModel->editMati($id, $dt);
				
				
				$alert = "<script>alert('Berhasil!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/suket_mati');
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

					$data = [
						'id_penduduk' => $this->input->post('id_mati'),
					];
					$this->db->where('id_penduduk_mati', $this->input->post('id_penduduk_mati'));
					$this->db->update('penduduk_mati', $data);

					$dt = [
						'id_penduduk' => $this->input->post('id_penduduk'),
						'waktu_kematian' => $this->input->post('waktu_kematian'),
						'gambar_surat_pengantar' => $file['file_name'],
						'status' => $this->input->post('status'),
					];

					$this->MyModel->editMati($id, $dt);
					
					
					$alert = "<script>alert('Berhasil!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('petugas/suket_mati'); 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('petugas/suket_mati/edit/'.$id);
				}
			}
		}
	}
	public function suket_mati_del($id) {
		$mt = $this->MyModel->getMatiByID($id);
		unlink('assets/img/suket_mati/'.$mt['gambar_surat_pengantar']);
		$this->MyModel->delMati($id);
		$alert = "<script>alert('Berhasil!');</script>";
		$this->session->set_flashdata('message', $alert);
		redirect('petugas/suket_mati');
	}
	// Surat Keterangan Pindah
	public function suket_pindah() {
		if($this->input->post('search')) {
			$this->db->join('penduduk','penduduk.id_penduduk = suket_pindah.id_penduduk','left');
			$this->db->order_by('nik','asc');
			$this->db->like('nik', $this->input->post('search'));
			$this->db->or_like('nama_lengkap', $this->input->post('search'));
			$this->db->or_like('kode', $this->input->post('search'));
			$data['pindah'] = $this->db->get('suket_pindah')->result_array();
		} else {
			$data['pindah'] = $this->MyModel->getPindah();
		}


		$this->load->view('template/header_pet');
		$this->load->view('petugas/suket_pindah', $data);
		$this->load->view('template/footer_pet');
	}
	public function suket_pindah_add() {
		$data['penduduk'] = $this->MyModel->getPenduduk();
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
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/suket_pindah_add', $data);
			$this->load->view('template/footer_pet');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name'])) {
				$alert = "<script>alert('Surat Pengantar tidak boleh kosong!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/suket_pindah/tambah');
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
					redirect('petugas/suket_pindah'); 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('petugas/suket_pindah/tambah');
				}
			}
		}
	}
	public function suket_pindah_edit($id) {
		$data['penduduk'] = $this->MyModel->getPenduduk();
		$data['status_kependudukan'] = ['warga desa','warga luar'];
		$data['pindah'] = $this->MyModel->getPindahByID($id);
		$data['status'] = ['belum','proses','selesai'];
		

		$this->form_validation->set_rules('id_penduduk', 'NIK', 'trim|required');
		$this->form_validation->set_rules('status_kependudukan', 'Status Kependudukan', 'trim|required');
		$this->form_validation->set_rules('jml_keluarga_pindah', 'Jumlah Keluarga Pindah', 'trim|required');
		$this->form_validation->set_rules('pindah_ke', 'Pindah Ke', 'trim|required');
		$this->form_validation->set_rules('tgl_pindah', 'Tanggal Pindah', 'trim|required');
		$this->form_validation->set_rules('kelurahan_desa', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required');
		$this->form_validation->set_rules('kabupaten_kota', 'Kabupaten / Kota', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/suket_pindah_edit', $data);
			$this->load->view('template/footer_pet');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name'])) {
				$data = [
					'id_penduduk' => $this->input->post('id_penduduk'),
					'status_kependudukan' => $this->input->post('status_kependudukan'),
					'jml_keluarga_pindah' => $this->input->post('jml_keluarga_pindah'),
					'pindah_ke' => $this->input->post('pindah_ke'),
					'tgl_pindah' => $this->input->post('tgl_pindah'),
					'kelurahan_desa' => $this->input->post('kelurahan_desa'),
					'kecamatan' => $this->input->post('kecamatan'),
					'kabupaten_kota' => $this->input->post('kabupaten_kota'),
					'status' => $this->input->post('status'),
				];
				
				$this->MyModel->editPindah($id,$data);
				$alert = "<script>alert('Berhasil!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/suket_pindah');
			} else {
				unlink('assets/img/suket_pindah/'.$data['pindah']['gambar_surat_pengantar']);
				$config = [
                    'file_name' => 'suket_pindah',
                    'upload_path' => './assets/img/suket_pindah/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'max_size' => 1024,
				];
				
				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar_surat_pengantar')) {
					$file = $this->upload->data();

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
						'status' => $this->input->post('status'),
					];
					
					$this->MyModel->editPindah($id,$data);
					$alert = "<script>alert('Berhasil!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('petugas/suket_pindah'); 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('petugas/suket_pindah/edit/'.$id);
				}
			}
		}
	}
	public function suket_pindah_del($id) {
		$pdh = $this->MyModel->getPindahByID($id);
		unlink('assets/img/suket_pindah/'.$pdh['gambar_surat_pengantar']);
		$this->MyModel->delPindah($id);
		$alert = "<script>alert('Berhasil!');</script>";
		$this->session->set_flashdata('message', $alert);
		redirect('petugas/suket_pindah');
	}
	public function keluarga_pindah($id) {
		$data['kel'] = $this->MyModel->getKelPindah($id);
		$this->load->view('template/header_pet');
		$this->load->view('petugas/keluarga_pindah', $data);
		$this->load->view('template/footer_pet');
	}
	public function keluarga_pindah_add() {
		$id_suket_pindah = $this->input->post('id_suket_pindah');
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');

		if(empty($nik) || empty($nama)) {
			$alert = "<script>alert('Kolom tidak boleh kosong!');</script>";
			$this->session->set_flashdata('message', $alert);
			redirect('petugas/keluarga_pindah/'.$id_suket_pindah);
		} else {

			$data = [
				'id_suket_pindah' => $id_suket_pindah,
				'nik' => $nik,
				'nama' => $nama	
			];
	
			$this->MyModel->addKelPindah($data);
			$alert = "<script>alert('Berhasil!');</script>";
			$this->session->set_flashdata('message', $alert);
			redirect('petugas/keluarga_pindah/'.$id_suket_pindah);
		}

	}
	public function keluarga_pindah_edit() {
		$id_suket_pindah = $this->input->post('id_suket_pindah');
		$id_keluarga_pindah = $this->input->post('id_keluarga_pindah');
		$nik = $this->input->post('nik');
		$nama = $this->input->post('nama');

		if(empty($nik) || empty($nama)) {
			$alert = "<script>alert('Kolom tidak boleh kosong!');</script>";
			$this->session->set_flashdata('message', $alert);
			redirect('petugas/keluarga_pindah/'.$id_suket_pindah);
		} else {

			$data = [
				'id_suket_pindah' => $id_suket_pindah,
				'nik' => $nik,
				'nama' => $nama	
			];
	
			$this->MyModel->editKelPindah($id_keluarga_pindah,$data);
			$alert = "<script>alert('Berhasil!');</script>";
			$this->session->set_flashdata('message', $alert);
			redirect('petugas/keluarga_pindah/'.$id_suket_pindah);
		}
	}
	public function keluarga_pindah_del($id) {
		$this->MyModel->delKelPindah($id);
		$alert = "<script>alert('Berhasil!');</script>";
		$this->session->set_flashdata('message', $alert);
		$this->redirect_back();
	}
	// Izin Acara
	public function izin_acara() {
		if($this->input->post('search')) {
			$this->db->join('penduduk','penduduk.id_penduduk = izin_acara.id_penduduk','left');
			$this->db->order_by('nik','asc');
			$this->db->like('nik', $this->input->post('search'));
			$this->db->or_like('nama_lengkap', $this->input->post('search'));
			$this->db->or_like('kode', $this->input->post('search'));
			$data['acara'] = $this->db->get('izin_acara')->result_array();
		} else {
			$data['acara'] = $this->MyModel->getAcara();
		}

		

		$this->load->view('template/header_pet');
		$this->load->view('petugas/izin_acara', $data);
		$this->load->view('template/footer_pet');
	}

	public function izin_acara_add() {
		$data['penduduk'] = $this->MyModel->getPenduduk();
		

		$this->form_validation->set_rules('id_penduduk', 'NIK', 'trim|required');
		$this->form_validation->set_rules('acara', 'Acara', 'trim|required');
		$this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'trim|required');
		$this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/izin_acara_add', $data);
			$this->load->view('template/footer_pet');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name'])) {
				$alert = "<script>alert('Surat Pengantar tidak boleh kosong!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/izin_acara/tambah');
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
					redirect('petugas/izin_acara'); 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('petugas/izin_acara/tambah');
				}
			}
		}
	}

	public function izin_acara_edit($id) {
		$data['penduduk'] = $this->MyModel->getPenduduk();
		$data['acara'] = $this->MyModel->getAcaraByID($id);
		$data['status'] = ['belum','proses','selesai'];

		$this->form_validation->set_rules('id_penduduk', 'NIK', 'trim|required');
		$this->form_validation->set_rules('acara', 'Acara', 'trim|required');
		$this->form_validation->set_rules('tgl_mulai', 'Tanggal Mulai', 'trim|required');
		$this->form_validation->set_rules('tgl_selesai', 'Tanggal Selesai', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/izin_acara_edit', $data);
			$this->load->view('template/footer_pet');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name'])) {
				$data = [
					'id_penduduk' => $this->input->post('id_penduduk'),
					'acara' => $this->input->post('acara'),
					'tgl_mulai' => $this->input->post('tgl_mulai'),
					'tgl_selesai' => $this->input->post('tgl_selesai'),
					'lokasi' => $this->input->post('lokasi'),
					'jenis_acara' => $this->input->post('jenis_acara'),
					'status' => $this->input->post('status'),
				];
				
				$this->MyModel->editAcara($id,$data);
				$alert = "<script>alert('Berhasil!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/izin_acara');
			} else {
				unlink('assets/img/izin_acara/'.$data['acara']['gambar_surat_pengantar']);
				$config = [
                    'file_name' => 'izin_acara_surat_pengantar',
                    'upload_path' => './assets/img/izin_acara/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'max_size' => 1024,
				];
				
				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar_surat_pengantar')) {
					$file = $this->upload->data();


					$data = [
						'id_penduduk' => $this->input->post('id_penduduk'),
						'acara' => $this->input->post('acara'),
						'tgl_mulai' => $this->input->post('tgl_mulai'),
						'tgl_selesai' => $this->input->post('tgl_selesai'),
						'lokasi' => $this->input->post('lokasi'),
						'jenis_acara' => $this->input->post('jenis_acara'),
						'gambar_surat_pengantar' => $file['file_name'],
						'status' => $this->input->post('status'),
					];
					
					$this->MyModel->editAcara($id,$data);
					$alert = "<script>alert('Berhasil!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('petugas/izin_acara'); 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('petugas/izin_acara/edit/'.$id);
				}
			}
		}
	} 

	public function izin_acara_del($id) {
		$acr = $this->MyModel->getAcaraByID($id);
		unlink('assets/img/izin_acara/'.$acr['gambar_surat_pengantar']);
		$this->MyModel->delAcara($id);
		$alert = "<script>alert('Berhasil!');</script>";
		$this->session->set_flashdata('message', $alert);
		redirect('petugas/izin_acara');

	}

	// Izin Usaha
	public function izin_usaha() {
		if($this->input->post('search')) {
			$this->db->join('penduduk','penduduk.id_penduduk = izin_usaha.id_penduduk','left');
			$this->db->order_by('nik','asc');
			$this->db->like('nik', $this->input->post('search'));
			$this->db->or_like('nama_lengkap', $this->input->post('search'));
			$this->db->or_like('kode', $this->input->post('search'));
			$data['usaha'] = $this->db->get('izin_usaha')->result_array();
		} else {
			$data['usaha'] = $this->MyModel->getUsaha();
		}

		

		$this->load->view('template/header_pet');
		$this->load->view('petugas/izin_usaha', $data);
		$this->load->view('template/footer_pet');
	}

	public function izin_usaha_add() {
		$data['penduduk'] = $this->MyModel->getPenduduk();
		

		$this->form_validation->set_rules('id_penduduk', 'NIK', 'trim|required');
		$this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'trim|required');
		$this->form_validation->set_rules('jenis_usaha', 'Jenis Usaha', 'trim|required');
		$this->form_validation->set_rules('modal_usaha', 'Modal Usaha', 'trim|required');
		$this->form_validation->set_rules('tempat_usaha', 'Tempat Usaha', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/izin_usaha_add', $data);
			$this->load->view('template/footer_pet');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name'])) {
				$alert = "<script>alert('Surat Pengantar tidak boleh kosong!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/izin_usaha/tambah');
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
					redirect('petugas/izin_usaha'); 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('petugas/izn_usaha/tambah');
				}
			}
		}
	}

	public function izin_usaha_edit($id) {
		$data['penduduk'] = $this->MyModel->getPenduduk();
		$data['usaha'] = $this->MyModel->getUsahaByID($id);
		$data['status'] = ['belum','proses','selesai'];

		$this->form_validation->set_rules('id_penduduk', 'NIK', 'trim|required');
		$this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'trim|required');
		$this->form_validation->set_rules('jenis_usaha', 'Jenis Usaha', 'trim|required');
		$this->form_validation->set_rules('modal_usaha', 'Modal Usaha', 'trim|required');
		$this->form_validation->set_rules('tempat_usaha', 'Tempat Usaha', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/izin_usaha_edit', $data);
			$this->load->view('template/footer_pet');
		} else {
			if(empty($_FILES['gambar_surat_pengantar']['name'])) {
				$data = [
					'id_penduduk' => $this->input->post('id_penduduk'),
					'nama_usaha' => $this->input->post('nama_usaha'),
					'jenis_usaha' => $this->input->post('jenis_usaha'),
					'modal_usaha' => $this->input->post('modal_usaha'),
					'tempat_usaha' => $this->input->post('tempat_usaha'),
					'status' => $this->input->post('status'),
				];
				
				$this->MyModel->editUsaha($id,$data);
				$alert = "<script>alert('Berhasil!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/izin_usaha');
			} else {
				unlink('assets/img/izin_usaha/'.$data['usaha']['gambar_surat_pengantar']);
				$config = [
                    'file_name' => 'izin_usaha_surat_pengantar',
                    'upload_path' => './assets/img/izin_usaha/',
                    'allowed_types' => 'jpg|png|jpeg',
                    'max_size' => 1024,
				];
				
				$this->load->library('upload', $config);

				if($this->upload->do_upload('gambar_surat_pengantar')) {
					$file = $this->upload->data();


					$data = [
						'id_penduduk' => $this->input->post('id_penduduk'),
						'nama_usaha' => $this->input->post('nama_usaha'),
						'jenis_usaha' => $this->input->post('jenis_usaha'),
						'modal_usaha' => $this->input->post('modal_usaha'),
						'tempat_usaha' => $this->input->post('tempat_usaha'),
						'gambar_surat_pengantar' => $file['file_name'],
						'status' => $this->input->post('status'),
					];
					
					$this->MyModel->editUsaha($id,$data);
					$alert = "<script>alert('Berhasil!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('petugas/izin_usaha'); 	
				} else {
					$alert = "<div class='alert alert-danger'>".$this->upload->display_errors()."</div>";
					$this->session->set_flashdata('error', $alert);
					redirect('petugas/izin_usaha/edit/'.$id);
				}
			}
		}
	}

	public function izin_usaha_del($id) {
		$ush = $this->MyModel->getUsahaByID($id);
		unlink('assets/img/izin_usaha/'.$ush['gambar_surat_pengantar']);
		$this->MyModel->delUsaha($id);
		$alert = "<script>alert('Berhasil!');</script>";
		$this->session->set_flashdata('message', $alert);
		redirect('petugas/izin_usaha');
	}

	// Kasi
	public function kasi() {
		$data['kasi'] = $this->MyModel->getKasi();

		$this->load->view('template/header_pet');
		$this->load->view('petugas/kasi', $data);
		$this->load->view('template/footer_pet');
	}

	public function kasi_add() {
		$this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'trim|required');
		$this->form_validation->set_rules('kata_sandi', 'Kata Sandi', 'trim|required|matches[konfirmasi_kata_sandi]');
		$this->form_validation->set_rules('konfirmasi_kata_sandi', 'Konfirmasi Kata Sandi', 'trim|required|matches[kata_sandi]');

		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/kasi_add');
			$this->load->view('template/footer_pet');

		} else {
			$data = [
				'nama_pengguna' => $this->input->post('nama_pengguna'),
				'kata_sandi' => password_hash( $this->input->post('kata_sandi'), PASSWORD_DEFAULT),
			];
			$this->MyModel->addKasi($data);
			$alert = "<script>alert('Berhasil!');</script>";
			$this->session->set_flashdata('message', $alert);
			redirect('petugas/kasi');
		}
	}

	public function kasi_edit($id) {
		$data['kasi'] = $this->MyModel->getKasiByID($id);
		$this->form_validation->set_rules('nama_pengguna', 'Nama Pengguna', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			
			$this->load->view('template/header_pet');
			$this->load->view('petugas/kasi_edit', $data);
			$this->load->view('template/footer_pet');

		} else {
			$data = [
				'nama_pengguna' => $this->input->post('nama_pengguna'),
			];
			$this->MyModel->editKasi($id,$data);
			$alert = "<script>alert('Berhasil!');</script>";
			$this->session->set_flashdata('message', $alert);
			redirect('petugas/kasi');
		}
	}

	public function kasi_del($id) {
		$this->MyModel->delKasi($id);
		$alert = "<script>alert('Berhasil!');</script>";
		$this->session->set_flashdata('message', $alert);
		redirect('petugas/kasi');
	}

	public function kasi_pass($id) {
		$pd = $this->MyModel->getKasiByID($id);

		$this->form_validation->set_rules('password_lama', 'Kata Sandi Lama', 'required|trim');
        $this->form_validation->set_rules('password1', 'Kata Sandi Baru', 'required|trim|matches[password2]');
		$this->form_validation->set_rules('password2', 'Ulangi Kata Sandi', 'required|trim|matches[password1]');

		
		if ($this->form_validation->run() == FALSE) {

			$this->load->view('template/header_pet');
			$this->load->view('petugas/kasi_pass');
			$this->load->view('template/footer_pet');
		} else {
			$pass_lama = $this->input->post('password_lama');
			$pass_baru = $this->input->post('password1');

			if(!password_verify($pass_lama, $pd['kata_sandi'])) {
				$alert = "<script>alert('Kata Sandi Lama Salah!');</script>";
				$this->session->set_flashdata('message', $alert);
				redirect('petugas/kasi/gantisandi/'.$id);
			} else {
				if($pass_lama == $pass_baru) {
					$alert = "<script>alert('Kata Sandi Lama tidak boleh sama dengan Kata Sandi Baru!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('petugas/kasi/gantisandi/'.$id);
				} else {
					$pass = password_hash($pass_baru, PASSWORD_DEFAULT);
                    $this->db->set('kata_sandi', $pass);
                    $this->db->where('id_kasi', $id);
					$this->db->update('kasi');
					
					$alert = "<script>alert('Berhasil!');</script>";
					$this->session->set_flashdata('message', $alert);
					redirect('petugas/kasi');
				}
			}
		}
	}

	private function redirect_back()
    {
        if(isset($_SERVER['HTTP_REFERER']))
        {
            header('Location: '.$_SERVER['HTTP_REFERER']);
        }
        else
        {
            header('Location: http://'.$_SERVER['SERVER_NAME']);
        }
        exit;
    }
}
        
    /* End of file  Petugas.php */
        
                            