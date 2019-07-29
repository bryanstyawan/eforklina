<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct ()
	{
		parent::__construct();
		$this->load->model ('Mhome', '', TRUE);
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		redirect('home/main');
	}

	public function main()
	{
		ini_set('date.timezone', 'Asia/Jakarta');
		date_default_timezone_set('Asia/Jakarta');
		if($this->session->userdata('session_login') == "")
		{
			//get user data
			$data['carousel'] = 'on'; 
			$data['content']  = "home/home/index";
			$this->load->view('home',$data);			
		}		
		else {
			# code...
			if ($this->session->userdata('session_role') != "") {
				# code...
				if ($this->session->userdata('session_role') != 7) {
					# code...
					redirect('dashboard/home');					
				} else {
					# code...
					redirect('home');					
				}								

			}
			else {
				# code...
				redirect('auth');							
			}

		}

	}

	public function request()
	{
		# code...
		$data['carousel']     = 'off'; 
		$data['content']      = "home/request/index";
		$data['layanan']      = $this->Allcrud->listData('mr_forensik')->result_array();
		$data['alur_proses']  = $this->Allcrud->listData('mr_alur_perkara')->result_array();		 		
		$this->load->view('home',$data);		
	}

	public function services($token)
	{
		# code...
		$data['carousel'] = 'off'; 
		$data['content']  = "home/services/index";
		$data['layanan']   = $this->Allcrud->listData('mr_forensik')->result_array();
		$data['info']      = $this->Mhome->get_request($token);
		$data['token']     = $token;
		if ($data['info'] != 0) {
			# code...
			$data['alur_perkara'] = $this->Mhome->get_alur_perkara_berkas($data['info'][0]->id_alur_perkara);
			if ($data['alur_perkara'] == 0) {
				# code...
				$data['alur_perkara'] = 0;				
			}
		} else {
			# code...
			$data['alur_perkara'] = 0;			
		}		 		
		$this->load->view('home',$data);		
	}	

	public function store_request($arg=NULL,$oid=NULL)
	{
		# code...
		$res_data    = 0;
		$text_status = '';
		$data_sender = array();
		if ($arg == NULL) {
			# code...
			$data_sender = $this->input->post('data_sender');
		}
		else {
			# code...
			$data_sender['crud'] = $arg;
			$data_sender['oid']  = $oid;
		}
		$data_store  = $this->Globalrules->trigger_insert_update($data_sender['crud']);
		if ($data_sender['crud'] ==  'insert') {
			# code...
			$data_store['id_forensik']     = $data_sender['f_permohonan'];
			$data_store['id_instansi']     = $data_sender['f_instansi_jaksa'];
			$data_store['nama']            = $data_sender['f_nama_jaksa'];
			$data_store['jabatan']         = $data_sender['f_jabatan_jaksa'];
			$data_store['nrp']             = $data_sender['f_nrp_jaksa'];
			$data_store['telepon']         = $data_sender['f_telepon_jaksa'];
			$data_store['email']           = $data_sender['f_email_jaksa'];			
			$data_store['id_alur_perkara'] = $data_sender['f_alur_perkara'];						
			$data_store['status']          = 1;
			$data_store['token']           = $this->Globalrules->randomCode(6);
			$res_data = $this->Allcrud->addData_with_return_id('mr_request',$data_store);
			if ($res_data['status'] == 1) {
				# code...
				$data_timeline = array(
					'id_token'          => $data_store['token'],
					'remarks'           => 'Mengajukan permohonan layanan',
					'audit_time_insert' => date('Y-m-d H:i:s'), 'audit_user_insert' => $this->session->userdata('_session_user')
				);
				$res_data = $this->Allcrud->addData('mr_timeline',$data_timeline);				
			}
			$text_status = $this->Globalrules->check_status_res($res_data,'Permohonan anda telah berhasil diajukan.');
		} elseif ($data_sender['crud'] == 'update') {
			# code...
			// $data_store['no_surat']                  = $data_sender['f_surat'];
			// $data_store['tanggal_surat']             = date('Y-m-d', strtotime($data_sender['f_tanggal_surat']));
			// $data_store['nama']                      = $data_sender['f_name'];
			// $data_store['tempat']                    = $data_sender['f_tempat'];
			// $data_store['tanggal_lahir']             = date('Y-m-d', strtotime($data_sender['f_tanggal_lahir']));
			// $data_store['suku']                      = $data_sender['f_suku'];
			// $data_store['agama']                     = $data_sender['f_agama'];
			// $data_store['pihak_keluarga']            = $data_sender['f_keluarga'];
			// $data_store['id_kewarganegaraan']        = $data_sender['f_warganegara'];										
			// $data_store['alamat']                    = $data_sender['f_alamat'];
			// $data_store['identitas_jaksa']           = $data_sender['f_jaksa'];
			// $data_store['identitas_pengawal']        = $data_sender['f_pengawal'];
			// $data_store['keluhan_medis']             = $data_sender['f_keluhan'];
			// $data_store['proses_hukum']              = $data_sender['f_proses_hukum'];			
			// $data_store['status']                    = 0;			
			// $res_data                                = $this->Allcrud->editData('mr_assessing',$data_store,array('id'=>$data_sender['oid']));
			// $text_status                             = $this->Globalrules->check_status_res($res_data,'Permohonan anda telah diubah telah berhasil diubah.');
		} elseif ($data_sender['crud'] == 'delete') {
			# code...
			$res_data          = $this->Allcrud->delData('mr_user',array('id'=>$data_sender['oid']));
			$text_status       = $this->Globalrules->check_status_res($res_data,'Data Pengguna telah berhasil dihapus.');			
		}

		$res = array
					(
						'status' => $res_data,
						'token'  => $data_store['token'],
						'text'   => $text_status
					);
		echo json_encode($res);				
	}

	public function verify($token=NULL)
	{
		# code...
		$data['carousel']  = 'off'; 
		$data['content']   = "home/request/verify";
		$data['layanan']   = $this->Allcrud->listData('mr_forensik')->result_array();
		$data['info']      = $this->Mhome->get_request($token);
		$data['token']     = $token;
		if ($data['info'] != 0) {
			# code...
			$data['alur_perkara'] = $this->Mhome->get_alur_perkara_berkas($data['info'][0]->id_alur_perkara);
			if ($data['alur_perkara'] == 0) {
				# code...
				$data['alur_perkara'] = 0;				
			}
		} else {
			# code...
			$data['alur_perkara'] = 0;			
		}
						 		
		$this->load->view('home',$data);		
	}	

	public function verifikasi_berkas($token)
	{
		# code...
		$res_data             = "";
		$text_status          = "";
		$data_store['status'] = 2;
		$get_data             = $this->Allcrud->getData('mr_request',array('token'=>$token))->result_array();				
		if ($get_data != array()) {
			# code...
			$res_data             = $this->Allcrud->editData('mr_request',$data_store,array('token'=>$token));		
			if ($res_data['status'] == 1) {
				# code...
				$data_timeline = array(
					'id_token'          => $token,
					'remarks'           => 'Unggah Dokumen Tahap 1',
					'audit_time_insert' => date('Y-m-d H:i:s'), 'audit_user_insert' => $this->session->userdata('_session_user')
				);
				$res_data = $this->Allcrud->addData('mr_timeline',$data_timeline);				
			}
			$text_status = $this->Globalrules->check_status_res($res_data,'Permohonan telah dikirim.');			
		}		

		$res = array
					(
						'status' => $res_data,
						'token'  => $token,
						'text'   => $text_status
					);
		echo json_encode($res);						
	}

	public function store_services($arg=NULL,$oid=NULL)
	{
		# code...
		$res_data    = 0;
		$text_status = '';
		$data_sender = array();
		if ($arg == NULL) {
			# code...
			$data_sender = $this->input->post('data_sender');
		}
		else {
			# code...
			$data_sender['crud'] = $arg;
			$data_sender['oid']  = $oid;
		}
		$data_store  = $this->Globalrules->trigger_insert_update($data_sender['crud']);
		if ($data_sender['crud'] == 'insert') {
			# code...
			$data_store['token']					 = $data_sender['f_token'];
			$data_store['no_surat']                  = $data_sender['f_nomor_surat'];
			$data_store['tanggal_surat']             = date('Y-m-d', strtotime($data_sender['f_tanggal_surat']));
			$data_store['identitas_pengawal']        = $data_sender['f_nama_pengawal'];
			$data_store['nama']                      = $data_sender['f_nama_termohon'];
			$data_store['tempat']                    = $data_sender['f_tempat_lahir_termohon'];
			$data_store['tanggal_lahir']             = date('Y-m-d', strtotime($data_sender['f_tanggal_lahir_termohon']));
			$data_store['suku']                      = $data_sender['f_suku_termohon'];
			$data_store['agama']                     = $data_sender['f_agama_termohon'];
			$data_store['pihak_keluarga']            = $data_sender['f_keluarga_termohon'];
			$data_store['id_kewarganegaraan']        = $data_sender['f_warga_termohon'];										
			$data_store['alamat']                    = $data_sender['f_alamat_termohon'];
			$data_store['keluhan_medis']             = $data_sender['f_keluhan_termohon'];
			$data_store['proses_hukum']              = $data_sender['f_proses_hukum_termohon'];			
			$data_store['status']                    = 3;

			$res_data = $this->Allcrud->editData('mr_request',array('status'=>3),array('token'=>$data_store['token']));			
			$res_data = $this->Allcrud->addData_with_return_id('mr_services',$data_store);
			if ($res_data['status'] == 1) {
				# code...
				$data_timeline = array(
					'id_token'          => $data_store['token'],
					'remarks'           => 'Mengisi data termohon',
					'audit_time_insert' => date('Y-m-d H:i:s'), 'audit_user_insert' => $this->session->userdata('_session_user')
				);
				$res_data = $this->Allcrud->addData('mr_timeline',$data_timeline);				
			}
			$text_status = $this->Globalrules->check_status_res($res_data,'Permohonan anda telah berhasil diajukan.');

			
		} elseif ($data_sender['crud'] == 'update') {
			# code...
			// $data_store['no_surat']                  = $data_sender['f_surat'];
			// $data_store['tanggal_surat']             = date('Y-m-d', strtotime($data_sender['f_tanggal_surat']));
			// $data_store['nama']                      = $data_sender['f_name'];
			// $data_store['tempat']                    = $data_sender['f_tempat'];
			// $data_store['tanggal_lahir']             = date('Y-m-d', strtotime($data_sender['f_tanggal_lahir']));;
			// $data_store['suku']                      = $data_sender['f_suku'];
			// $data_store['agama']                     = $data_sender['f_agama'];
			// $data_store['pihak_keluarga']            = $data_sender['f_keluarga'];
			// $data_store['id_kewarganegaraan']        = $data_sender['f_warganegara'];										
			// $data_store['alamat']                    = $data_sender['f_alamat'];
			// $data_store['identitas_jaksa']           = $data_sender['f_jaksa'];
			// $data_store['identitas_pengawal']        = $data_sender['f_pengawal'];
			// $data_store['keluhan_medis']             = $data_sender['f_keluhan'];
			// $data_store['proses_hukum']              = $data_sender['f_proses_hukum'];			
			// $data_store['status']                    = 0;			
			//             $res_data    = $this->Allcrud->editData('mr_assessing',$data_store,array('id'=>$data_sender['oid']));
			//             $text_status = $this->Globalrules->check_status_res($res_data,'Permohonan anda telah diubah telah berhasil diubah.');
		} elseif ($data_sender['crud'] == 'delete') {
			# code...
			$res_data          = $this->Allcrud->delData('mr_user',array('id'=>$data_sender['oid']));
			$text_status       = $this->Globalrules->check_status_res($res_data,'Data Pengguna telah berhasil dihapus.');			
		}

		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);		
	}
}
