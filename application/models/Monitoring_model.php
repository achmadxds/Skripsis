<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Monitoring_model extends CI_Model {

  public function monitoring($periode)
	{
		$this->db->select('tdaftars.*,
						   tmhs.MhsNama');
		$this->db->from('tdaftars');
		$this->db->join('tmhs', 'tmhs.MhsNim = tdaftars.DaftarsNIM');
		$this->db->where('DaftarsPeriodesId', $periode);
		$this->db->or_where('DaftarsPeriodesId2', $periode);
		$this->db->order_by('DaftarsNIM', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}
	

}

/* End of file Monitoring_model.php */
/* Location: ./application/models/Monitoring_model.php */