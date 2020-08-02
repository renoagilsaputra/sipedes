<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class MyModel extends CI_Model {
                        
	public function addPengaduan($data) {
		$this->db->insert('pengaduan', $data);
	}
	
	public function getPengaduan() {
		$this->db->order_by('waktu','desc');
		return $this->db->get('pengaduan')->result_array();
	}

	public function getPengaduanByID($id) {
		return $this->db->get_where('pengaduan',['id_pengaduan' => $id])->row_array();
	}

    public function delPengaduan($id) {
		$this->db->where('id_pengaduan', $id);
		$this->db->delete('pengaduan');
	}
	
	// Penduduk
	public function getPenduduk() {
		$this->db->order_by('nik','asc');
		return $this->db->get('penduduk')->result_array();
	}
	public function getPendudukByID($id) {
		return $this->db->get_where('penduduk',['id_penduduk' => $id])->row_array();
	}

	public function addPenduduk($data) {
		$this->db->insert('penduduk', $data);
	}

	public function editPenduduk($id, $data) {
		$this->db->where('id_penduduk', $id);
		$this->db->update('penduduk', $data);
	}

	public function delPenduduk($id) {
		$this->db->where('id_penduduk',$id);
		$this->db->delete('penduduk');
	}
	// Pelayanan
	public function getPelayanan() {
		$this->db->join('penduduk','penduduk.id_penduduk = pelayanan.id_penduduk','left');
		$this->db->order_by('nik','asc');
		return $this->db->get('pelayanan')->result_array();
	}
	public function getPelayananByID($id) {
		return $this->db->get_where('pelayanan',['id_pelayanan' => $id])->row_array();
	}

	public function addPelayanan($data) {
		$this->db->insert('pelayanan', $data);
	}

	public function editPelayanan($id, $data) {
		$this->db->where('id_pelayanan', $id);
		$this->db->update('pelayanan', $data);
	}

	public function delPelayanan($id) {
		$this->db->where('id_pelayanan',$id);
		$this->db->delete('pelayanan');
	}
	//  Kependudukan
	public function getKependudukan() {
		$this->db->join('penduduk','penduduk.id_penduduk = kependudukan.id_penduduk','left');
		$this->db->order_by('nik','asc');
		return $this->db->get('kependudukan')->result_array();
	}
	public function getKependudukanByID($id) {
		return $this->db->get_where('kependudukan',['id_kependudukan' => $id])->row_array();
	}

	public function addKependudukan($data) {
		$this->db->insert('kependudukan', $data);
	}

	public function editKependudukan($id, $data) {
		$this->db->where('id_kependudukan', $id);
		$this->db->update('kependudukan', $data);
	}

	public function delKependudukan($id) {
		$this->db->where('id_kependudukan',$id);
		$this->db->delete('kependudukan');
	}
	// Akta Kelahiran
	public function getAkta() {
		$this->db->select(
			'*,
			akta_kelahiran.nama_lengkap as nama_akta, 
			akta_kelahiran.tmp_lahir as tmp_lahir_akta, 
			akta_kelahiran.tgl_lahir as tgl_lahir_akta, 
			akta_kelahiran.jk as jk_akta, 
			akta_kelahiran.kewarganegaraan as kewarganegaraan_akta, 
			akta_kelahiran.agama as agama_akta, 
			akta_kelahiran.alamat as alamat_akta, 
			akta_kelahiran.rt as rt_akta, 
			akta_kelahiran.rw as rw_akta, 
			akta_kelahiran.no_rumah as no_rumah_akta, 
			akta_kelahiran.kelurahan_desa as kelurahan_desa_akta, 
			akta_kelahiran.kecamatan as kecamatan_akta, 
			akta_kelahiran.kabupaten_kota as kabupaten_kota_akta, 
			akta_kelahiran.kode_pos as kode_pos_akta');
		$this->db->join('penduduk','penduduk.id_penduduk = akta_kelahiran.id_penduduk','left');
		$this->db->order_by('nik','asc');
		return $this->db->get('akta_kelahiran')->result_array();
	}
	public function getAktaByID($id) {
		return $this->db->get_where('akta_kelahiran',['id_akta_kelahiran' => $id])->row_array();
	}

	public function addAkta($data) {
		$this->db->insert('akta_kelahiran', $data);
	}

	public function editAkta($id, $data) {
		$this->db->where('id_akta_kelahiran', $id);
		$this->db->update('akta_kelahiran', $data);
	}

	public function delAkta($id) {
		$this->db->where('id_akta_kelahiran',$id);
		$this->db->delete('akta_kelahiran');
	}
	// Surat Menikah
	public function getNikah() {
		$this->db->join('penduduk','penduduk.id_penduduk = suket_menikah.id_penduduk','left');
		
		$this->db->order_by('nik','asc');
		return $this->db->get('suket_menikah')->result_array();
	}

	public function getNikahByID($id) {
		
		return $this->db->get_where('suket_menikah',['id_suket_menikah' => $id])->row_array();
	}

	public function addNikah($data) {
		$this->db->insert('suket_menikah',$data);
	}

	public function editNikah($id, $data) {
		$this->db->where('id_suket_menikah', $id);
		$this->db->update('suket_menikah', $data);
	}

	public function delNikah($id) {
		$sm = $this->getNikahByID($id);


		$this->db->where('id_pasangan', $sm['id_pasangan']);
		$this->db->delete('pasangan');
		
		$this->db->where('id_suket_menikah', $id);
		$this->db->delete('suket_menikah');
	}

	public function getPasanganByID($id) {
		return $this->db->get_where('pasangan',['id_pasangan' => $id])->row_array();
	}

	// Surat Kematian
	public function getMati() {
		$this->db->select('*, penduduk_mati.id_penduduk as id_mati');
		$this->db->join('penduduk','penduduk.id_penduduk = suket_kematian.id_penduduk','left');
		$this->db->join('penduduk_mati','penduduk_mati.id_penduduk_mati = suket_kematian.id_penduduk_mati','left');
		$this->db->order_by('nik','asc');
		return $this->db->get('suket_kematian')->result_array();
	}

	public function getMatiByID($id) {
		$this->db->select('*,suket_kematian.id_penduduk as id_pengaju, penduduk_mati.id_penduduk as id_mati');
		$this->db->join('penduduk_mati','penduduk_mati.id_penduduk_mati = suket_kematian.id_penduduk_mati','left');
		return $this->db->get_where('suket_kematian',['id_suket_kematian' => $id])->row_array();
	}

	public function addMati($data) {
		$this->db->insert('suket_kematian',$data);
	}

	public function editMati($id, $data) {
		$this->db->where('id_suket_kematian', $id);
		$this->db->update('suket_kematian', $data);
	}

	public function delMati($id) {
		$pm = $this->getMatiByID($id);

		

		$this->db->where('id_penduduk_mati', $pm['id_mati']);
		$this->db->delete('penduduk_mati');

		$this->db->where('id_suket_kematian', $id);
		$this->db->delete('suket_kematian');
	}
	// Surat Pindah
	public function getPindah() {
		$this->db->select('
			*, 
			suket_pindah.kelurahan_desa as kelurahan_desa_pindah,
			suket_pindah.kecamatan as kecamatan_pindah,
			suket_pindah.kabupaten_kota as kabupaten_kota_pindah');
		$this->db->join('penduduk','penduduk.id_penduduk = suket_pindah.id_penduduk','left');
		
		$this->db->order_by('nik','asc');
		return $this->db->get('suket_pindah')->result_array();
	}

	public function getPindahByID($id) {
		return $this->db->get_where('suket_pindah',['id_suket_pindah' => $id])->row_array();
	}

	public function addPindah($data) {
		$this->db->insert('suket_pindah',$data);
	}

	public function editPindah($id, $data) {
		$this->db->where('id_suket_pindah', $id);
		$this->db->update('suket_pindah', $data);
	}

	public function delPindah($id) {
		$this->db->where('id_suket_pindah', $id);
		$this->db->delete('keluarga_pindah');

		$this->db->where('id_suket_pindah', $id);
		$this->db->delete('suket_pindah');
	}
	public function getKelPindah($id) {  
		return $this->db->get_where('keluarga_pindah',['id_suket_pindah' => $id])->result_array();
	}
	public function addKelPindah($data) {
		$this->db->insert('keluarga_pindah',$data);
	}
	public function editKelPindah($id, $data) {
		$this->db->where('id_keluarga_pindah', $id);
		$this->db->update('keluarga_pindah', $data);
	}
	public function delKelPindah($id) {
		$this->db->where('id_keluarga_pindah', $id);
		$this->db->delete('keluarga_pindah');
	}
	// Izin Acara
	public function getAcara() {
		$this->db->join('penduduk','penduduk.id_penduduk = izin_acara.id_penduduk','left');
		$this->db->order_by('nik','asc');
		return $this->db->get('izin_acara')->result_array();
	}

	public function getAcaraByID($id) {
		return $this->db->get_where('izin_acara',['id_izin_acara' => $id])->row_array();
	}

	public function addAcara($data) {
		$this->db->insert('izin_acara',$data);
	}

	public function editAcara($id, $data) {
		$this->db->where('id_izin_acara', $id);
		$this->db->update('izin_acara', $data);
	}

	public function delAcara($id) {
		$this->db->where('id_izin_acara', $id);
		$this->db->delete('izin_acara');
	}

	// Izin Usaha
	public function getUsaha() {
		$this->db->join('penduduk','penduduk.id_penduduk = izin_usaha.id_penduduk','left');
		$this->db->order_by('nik','asc');
		return $this->db->get('izin_usaha')->result_array();
	}

	public function getUsahaByID($id) {
		return $this->db->get_where('izin_usaha',['id_izin_usaha' => $id])->row_array();
	}

	public function addUsaha($data) {
		$this->db->insert('izin_usaha',$data);
	}

	public function editUsaha($id, $data) {
		$this->db->where('id_izin_usaha', $id);
		$this->db->update('izin_usaha', $data);
	}

	public function delUsaha($id) {
		$this->db->where('id_izin_usaha', $id);
		$this->db->delete('izin_usaha');
	}
}
                        
/* End of file MyModel.php */
    
                        