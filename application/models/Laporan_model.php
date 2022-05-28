<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {
	
	
	public function list_periode()
	{
		$this->db->select('*');
		$this->db->from('tperiodes');
		$this->db->order_by('PeriodesId', 'desc');
		$query = $this->db->get();
		return $query->result_array();
	}

   public function laporan_skripsi($periode)
   {
      $this->db->select('tdaftars.*,
						 tmhs.MhsNim,
						 tmhs.MhsNama');
		$this->db->from('tdaftars');
		$this->db->join('tmhs', 'tdaftars.DaftarsNIM = tmhs.MhsNim');
		$this->db->where('DaftarsPeriodesId', $periode);
        $this->db->or_where('DaftarsPeriodesId2', $periode);
		$this->db->order_by('MhsNim', 'desc');
		$query = $this->db->get();
		return $query->result_array();
   }

  //  public function laporan_skripsi($firstdate, $lastdate)
  //  {
  //     $this->db->select('tdaftars.*,
		// 				 tmhs.MhsNim,
		// 				 tmhs.MhsNama');
		// $this->db->from('tdaftars');
		// $this->db->join('tmhs', 'tdaftars.DaftarsNIM = tmhs.MhsNim');
		// $this->db->where('DaftarsTglSelesai >=', $firstdate);
  //       $this->db->where('DaftarsTglSelesai <=', $lastdate);
		// $this->db->order_by('MhsNim', 'desc');
		// $query = $this->db->get();
		// return $query->result_array();
  //  }

 //   public function laporan_skripsii($periode)
	// {
	// 	$this->db->select('tdaftars.*,
	// 					 tmhs.MhsNim,
	// 					 tmhs.MhsNama');
	// 	$this->db->from('tdaftars');
	// 	$this->db->join('tmhs', 'tdaftars.DaftarsNIM = tmhs.MhsNim');
	// 	$this->db->where('DaftarsPeriodesId',$periode);
	// 	$this->db->or_where('DaftarsPeriodesId',$periode);
	// 	$this->db->order_by('MhsNim', 'desc');
	// 	$query = $this->db->get();
	// 	return $query->result_array();
	// }

   


	

}

/* End of file Laporan_model.php */
/* Location: ./application/models/Laporan_model.php */