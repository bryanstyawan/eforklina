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
								a.token
						FROM mr_request a
						LEFT JOIN mr_forensik b ON a.id_forensik = b.id
						LEFT JOIN mr_alur_perkara c ON a.id_alur_perkara= c.id
						LEFT JOIN mr_forensik d ON a.id_forensik = d.id						
						LEFT JOIN mr_alur_perkara e ON a.id_alur_perkara = e.id
						LEFT JOIN mr_services f ON a.token = f.token						
						WHERE a.status = '".$status."'
						".$sql_helper."";
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
