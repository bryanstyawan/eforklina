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
					   c.name as name_alur_perkara,
					   d.name as name_instansi,
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
						f.alamat as alamat_termohon					   
				FROM mr_request a
				LEFT JOIN mr_forensik b ON a.id_forensik = b.id
				LEFT JOIN mr_alur_perkara c ON a.id_alur_perkara = c.id
				LEFT JOIN mr_instansi d ON a.id_instansi = d.id								
				LEFT JOIN mr_services f ON a.token = f.token
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
					   b.name as name_file,
					   a.id as id_alur_berkas_perkara					   
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
