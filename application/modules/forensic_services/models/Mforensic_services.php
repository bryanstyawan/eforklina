<?php
class Mforensic_services extends CI_Model {

	public function __construct () {
		parent::__construct();
	}

	public function get_all_request_in($token=NULL,$status)
	{
		# code...
		$sql_helper = "";
		if ($token != NULL) {
			# code...
			$sql_helper = "AND a.token = '".$token."'";
		}
		$sql = "SELECT 	b.name as name_forensik,
								c.name as name_alur_perkara,
								a.nama as name_jaksa,
								g.name as name_instansi,
								a.jabatan,
								a.nrp,
								a.telepon as telepon_jaksa,
								a.email as email_jaksa,
								d.name as name_services,
								e.name as name_perkara,
								f.no_surat as no_surat_service,
								f.tanggal_surat as tanggal_surat_service,
								f.identitas_pengawal as identitas_pengawal_service,
								f.keluhan_medis keluhan_medis_service,
								f.nama as name_termohon,
								f.tempat as tempat_lahir_termohon,
								f.tanggal_lahir as tanggal_lahir_termohon,
								f.suku as suku_termohon,
								f.agama as agama_termohon,
								f.pihak_keluarga pihak_keluarga_termohon,
								f.id_kewarganegaraan as warga_termohon,
								f.alamat as alamat_termohon,
								f.remarks_scheduling,
								f.date_scheduling,
								f.id_priority,
								a.token
						FROM mr_request a
						LEFT JOIN mr_forensik b ON a.id_forensik = b.id
						LEFT JOIN mr_alur_perkara c ON a.id_alur_perkara= c.id
						LEFT JOIN mr_forensik d ON a.id_forensik = d.id						
						LEFT JOIN mr_alur_perkara e ON a.id_alur_perkara = e.id
						LEFT JOIN mr_services f ON a.token = f.token
						LEFT JOIN mr_instansi g ON a.id_instansi = g.id												
						WHERE a.status = '".$status."'
						".$sql_helper."";
						// print_r($sql);die();
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

	public function get_all_files_in($token)
	{
		# code...
		$sql = "SELECT 	a.file, c.name as name_file_general, a.id as id_request_file, a.token
						FROM mr_request_file a
						LEFT JOIN mr_alur_perkara_berkas b ON a.id_alur_perkara_berkas = b.id
						LEFT JOIN mr_berkas c ON b.id_berkas = c.id
				WHERE a.token = '".$token."'";
				// print_r($sql);die();
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

	public function get_events()
	{
		# code...
		$set_date = date('Y').'-'.date('m');
		$sql = "SELECT  a.remarks_scheduling,
						a.date_scheduling,
						a.id_priority,
						a.token
					FROM mr_services a
					WHERE a.date_scheduling IS NOT NULL
					AND a.remarks_scheduling IS NOT NULL
					AND a.id_priority IS NOT NULL
					AND a.date_scheduling LIKE '%".$set_date."%'";
				// print_r($sql);die();
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
	
	public function get_dokter($token,$status)
	{
		# code...
		$sql = "SELECT a.id as id_team_dokter,
						b.name as name_dokter
				FROM mr_team_dokter a
				LEFT JOIN mr_dokter b ON a.id_dokter = b.id
				WHERE a.token = '".$token."'
				AND a.status = '".$status."'";
				// print_r($sql);die();
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
