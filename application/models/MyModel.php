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
		$this->db->update('izin_acara');
	}
}
                        
/* End of file MyModel.php */
    
                        