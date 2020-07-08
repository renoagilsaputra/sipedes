<?php 

defined('BASEPATH') OR exit('No direct script access allowed');
                        
class MyModel extends CI_Model {
                        
	public function addPengaduan($data) {
		$this->db->insert('pengaduan', $data);
	}
                        
                            
                        
}
                        
/* End of file MyModel.php */
    
                        