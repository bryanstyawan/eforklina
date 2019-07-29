<?php

class Mhome extends CI_Model {

 	public function __construct () {
		parent::__construct();

	}

	public function get_request($token)
	{
		# code...
		$sql = "SELECT a.*,
					   b.name as name_forensik,
					   c.name as name_alur_perkara					   
				FROM mr_request a
				LEFT JOIN mr_forensik b ON a.id_forensik = b.id
				LEFT JOIN mr_alur_perkara c ON a.id_alur_perkara = c.id				
				WHERE a.token = '".$token."'
				";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return 0;
		}
	}	

	public function get_alur_perkara_berkas($id)
	{
		# code...
		$sql = "SELECT a.*,
					   b.name as name_file					   
				FROM mr_alur_perkara_berkas a
				LEFT JOIN mr_berkas b ON a.id_berkas = b.id
				WHERE a.id_alur_perkara = '".$id."'
				";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return 0;
		}		
	}
}
