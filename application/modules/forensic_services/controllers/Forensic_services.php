<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forensic_services extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model ('Mforensic_services', '', TRUE);
	}
	
	public function request()
	{
		$this->Globalrules->session_rule();						
		$data['title']     = 'Permohonan';
		$data['content']   = 'forensic_services/request/index';
		$data['list']	   = $this->Mforensic_services->get_all_request_in(NULL,3);
		$data['timeline']  = array();		
		$data['role_user'] = $this->Allcrud->listData('user_role');
		$this->load->view('templateAdmin',$data);
	}

	public function verification_admin($token)
	{
		# code...
		$data['token']	   = $token;
		$data['list']	   = $this->Mforensic_services->get_all_request_in($token,3);
		$this->load->view('forensic_services/request/admin/index',$data);						
	}

	public function next_step($token,$status)
	{
		# code...
		$data_sender          = $this->input->post('data_sender');		
		$res_data             = "";
		$text_status          = "";
		$data_store['status'] = $status;
		$get_data             = $this->Allcrud->getData('mr_request',array('token'=>$token))->result_array();				
		if ($get_data != array()) {
			# code...
			$res_data             = $this->Allcrud->editData('mr_request',$data_store,array('token'=>$token));
			$res_data             = $this->Allcrud->editData('mr_services',$data_store,array('token'=>$token));					
			if ($res_data['status'] == 1) {
				# code...
				$data_timeline = array(
					'token'          => $token,
					'remarks'           => $data_sender['remarks'],
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

	public function propose_team()
	{
		$this->Globalrules->session_rule();						
		$data['title']     = 'Permohonan - Usulan Tim';
		$data['content']   = 'forensic_services/propose/index';
		$data['list']	   = $this->Mforensic_services->get_all_request_in(NULL,4);
		$data['timeline']  = array();		
		$data['role_user'] = $this->Allcrud->listData('user_role');
		$this->load->view('templateAdmin',$data);
	}

	public function propose_team_process($token)
	{
		$data['token']	   = $token;
		$data['list']	   = $this->Mforensic_services->get_all_request_in($token,4);
		$this->load->view('forensic_services/propose/detail/index',$data);
	}


	public function verify_kabid()
	{
		$this->Globalrules->session_rule();						
		$data['title']     = 'Permohonan - Verifikasi Kabid Ke Direktur';
		$data['content']   = 'forensic_services/verify_kabid/index';
		$data['list']	   = $this->Mforensic_services->get_all_request_in(NULL,5);
		$data['timeline']  = array();		
		$data['role_user'] = $this->Allcrud->listData('user_role');
		$this->load->view('templateAdmin',$data);
	}

	public function verify_kabid_process($token)
	{
		$data['token']	   = $token;
		$data['list']	   = $this->Mforensic_services->get_all_request_in($token,5);
		$this->load->view('forensic_services/verify_kabid/detail/index',$data);
	}

	public function assign_letter()
	{
		$this->Globalrules->session_rule();						
		$data['title']     = 'Permohonan - Menetapkan Surat';
		$data['content']   = 'forensic_services/assign_letter/index';
		$data['list']	   = $this->Mforensic_services->get_all_request_in(NULL,6);
		$data['timeline']  = array();		
		$data['role_user'] = $this->Allcrud->listData('user_role');
		$this->load->view('templateAdmin',$data);
	}
	
	public function assign_letter_process($token)
	{
		$data['token']	   = $token;
		$data['list']	   = $this->Mforensic_services->get_all_request_in($token,6);
		$this->load->view('forensic_services/assign_letter/detail/index',$data);
	}
	
	public function scheduling()
	{
		$this->Globalrules->session_rule();						
		$data['title']     = 'Permohonan -  Memberi Jadwal';
		$data['content']   = 'forensic_services/scheduling/index';
		$data['list']	   = $this->Mforensic_services->get_all_request_in(NULL,7);
		$data['timeline']  = array();		
		$data['role_user'] = $this->Allcrud->listData('user_role');
		$this->load->view('templateAdmin',$data);
	}
	
	public function scheduling_process($token)
	{
		$data['token']	   = $token;
		$data['list']	   = $this->Mforensic_services->get_all_request_in($token,7);
		$this->load->view('forensic_services/scheduling/detail/index',$data);
	}	












	
	public function services()
	{
		$this->Globalrules->session_rule();						
		$data['title']     = 'Layanan';
		$data['content']   = 'forensic_services/services/index';
		$data['timeline']  = $this->Allcrud->getData('mr_forensik_menu',array('id_parent'=>1),array('priority','ASC'))->result_array();
		if ($this->session->userdata('_session_role') == 4) 
		{
			$data['list']      = $this->Allcrud->getData('mr_assessing',array('audit_user_insert' => $this->session->userdata('_session_user')),array('audit_time_insert','DESC'));			
		}
		else
		{
			$data['list']      = $this->Allcrud->getData('mr_assessing',array('status !=' => ' 0'),array('audit_time_insert','DESC'));									
		}
		$data['role_user'] = $this->Allcrud->listData('user_role');
		$this->load->view('templateAdmin',$data);
	}	

	public function store($arg=NULL,$oid=NULL)
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
			$data_store['no_surat']                  = $data_sender['f_surat'];
			$data_store['tanggal_surat']             = date('Y-m-d', strtotime($data_sender['f_tanggal_surat']));
			$data_store['nama']                      = $data_sender['f_name'];
			$data_store['tempat']                    = $data_sender['f_tempat'];
			$data_store['tanggal_lahir']             = date('Y-m-d', strtotime($data_sender['f_tanggal_lahir']));;
			$data_store['suku']                      = $data_sender['f_suku'];
			$data_store['agama']                     = $data_sender['f_agama'];
			$data_store['pihak_keluarga']            = $data_sender['f_keluarga'];
			$data_store['id_kewarganegaraan']        = $data_sender['f_warganegara'];										
			$data_store['alamat']                    = $data_sender['f_alamat'];
			$data_store['identitas_jaksa']           = $data_sender['f_jaksa'];
			$data_store['identitas_pengawal']        = $data_sender['f_pengawal'];
			$data_store['keluhan_medis']             = $data_sender['f_keluhan'];
			$data_store['proses_hukum']              = $data_sender['f_proses_hukum'];			
			$data_store['status']                    = 0;

			$res_data = $this->Allcrud->addData_with_return_id('mr_assessing',$data_store);
			if ($res_data['status'] == 1) {
				# code...
				$data_timeline = array(
					'id_forensik'       => 1,
					'id_forensik_slave' => $res_data['id'],
					'remarks'           => 'Mengajukan permohonan Assessing',
					'audit_time_insert' => date('Y-m-d H:i:s'), 'audit_user_insert' => $this->session->userdata('_session_user')
				);
				$res_data = $this->Allcrud->addData('mr_timeline',$data_timeline);				
			}
			$text_status = $this->Globalrules->check_status_res($res_data['status'],'Permohonan anda telah berhasil diajukan.');
		} elseif ($data_sender['crud'] == 'update') {
			# code...
			$data_store['no_surat']                  = $data_sender['f_surat'];
			$data_store['tanggal_surat']             = date('Y-m-d', strtotime($data_sender['f_tanggal_surat']));
			$data_store['nama']                      = $data_sender['f_name'];
			$data_store['tempat']                    = $data_sender['f_tempat'];
			$data_store['tanggal_lahir']             = date('Y-m-d', strtotime($data_sender['f_tanggal_lahir']));;
			$data_store['suku']                      = $data_sender['f_suku'];
			$data_store['agama']                     = $data_sender['f_agama'];
			$data_store['pihak_keluarga']            = $data_sender['f_keluarga'];
			$data_store['id_kewarganegaraan']        = $data_sender['f_warganegara'];										
			$data_store['alamat']                    = $data_sender['f_alamat'];
			$data_store['identitas_jaksa']           = $data_sender['f_jaksa'];
			$data_store['identitas_pengawal']        = $data_sender['f_pengawal'];
			$data_store['keluhan_medis']             = $data_sender['f_keluhan'];
			$data_store['proses_hukum']              = $data_sender['f_proses_hukum'];			
			$data_store['status']                    = 0;			
			            $res_data    = $this->Allcrud->editData('mr_assessing',$data_store,array('id'=>$data_sender['oid']));
			            $text_status = $this->Globalrules->check_status_res($res_data,'Permohonan anda telah diubah telah berhasil diubah.');
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

	public function get_data($id,$arg=NULL,$table)
	{
		# code...
		$data       = $this->Allcrud->getData($table,array('id'=>$id));		
		if ($arg == 'ajax') {
			# code...
			$res_status = "";
			$res_text   = "";
			$res_data   = "";
			if ($data->result_array() != array()) {
				# code...
				$res_data   = $data->result_array();
				$res_status = 1;
				$res_text   = '';
			}
			else {
				# code...
				$res_data   = $data->result_array();
				$res_status = $res_data;
				$res_text   = 'Data tidak ditemukan';
			}

			$res = array
						(
							'status' => $res_status,
							'data'   => $res_data,
							'text'   => $res_text
						);
			echo json_encode($res);					
		}
		elseif($arg == 'result_array') {
			# code...
			return $data->result_array();
		}
		else {
			# code...
			return $data;			
		}
	}

	public function upload($oid)
	{
		# code...
		$res_data                = "";
		$text_status             = "";
		$dataupload              = "";
		$user                    = $this->session->userdata('_session_user');
		$config['upload_path']   = FCPATH."/public/assessing/".$user."/";
		$config['allowed_types'] = 'pdf|csv|docx|doc|xlsx|xls|jpg|jpeg|png|ppt|pptx';
		$config['max_size']      = '3000';
		$data                    = "";
		$this->load->library('upload', $config);
		
		if(!is_dir("public/assessing/".$user."/"))
		{
			mkdir("public/assessing/".$user."/", 0755);
		}

        if ( ! $this->upload->do_upload('file')){
			$res_data       = 0;
			$text_status    = $this->upload->display_errors();
			$file_pendukung = "";
        }
        else
        {
			$res_data       = 1;
			$dataupload     = $this->upload->data();
			$status         = "success";
			$text_status    = $dataupload['file_name']." berhasil diupload";
			$file_pendukung = $this->upload->data('file_name');

			$data = array
							(
								'berkas' => $dataupload['file_name'],
								'status' => 1
							);
			$res_data    = $this->Allcrud->editData('mr_assessing',$data,array('id'=>$oid));									

			$data_timeline = array(
				'id_forensik'       => 1,
				'id_forensik_slave' => $oid,
				'remarks'           => 'Mengunggah berkas permohonan',
				'audit_time_insert' => date('Y-m-d H:i:s'), 'audit_user_insert' => $this->session->userdata('_session_user')
			);
			$res_data = $this->Allcrud->addData('mr_timeline',$data_timeline);			
        }


		if ($text_status == '<p>You did not select a file to upload.</p>') {
			# code...
			$res_data = 1;
			$text_status = "";
		}

		$res = array
					(
						// 'id'     => $res_data_id,
						'status' => $res_data,
						'text'   => $text_status
						// 'filename' => $dataupload['file_name']
					);
		echo json_encode($res);		 
	}

	public function proses_1($id)
	{
		# code...
		$data['list'] = $this->get_data($id,'result_array','mr_assessing');
		$this->load->view('assessing/assessing/forensik/proses_1/index',$data);
	}

	public function proses_2($id)
	{
		# code...
		$data_store['status'] = 2;			
		$res_data    = $this->Allcrud->editData('mr_assessing',$data_store,array('id'=>$id));
		$text_status = $this->Globalrules->check_status_res($res_data,'Permohonan anda telah diubah telah berhasil diubah.');

		$data_timeline = array(
			'id_forensik'       => 1,
			'id_forensik_slave' => $id,
			'remarks'           => 'TIM FORENSIK KLINIK melaporkan kepada Direktur RSU Adhyaksa tentang Permohonan Assessing ',
			'audit_time_insert' => date('Y-m-d H:i:s'), 'audit_user_insert' => $this->session->userdata('_session_user')
		);
		$res_data = $this->Allcrud->addData('mr_timeline',$data_timeline);		

		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);				
	}	

	public function proses_permintaan_layanan_direktur($id)
	{
		# code...
		$data['list'] = $this->get_data($id,'result_array','mr_assessing');
		$this->load->view('assessing/assessing/direktur/proses_1/index',$data);		
	}

	public function proses_3_dir($id)
	{
		# code...
		$data_store['status'] = 3;			
		$res_data    = $this->Allcrud->editData('mr_assessing',$data_store,array('id'=>$id));
		$text_status = $this->Globalrules->check_status_res($res_data,'Status telah disimpan.');

		$data_timeline = array(
			'id_forensik'       => 1,
			'id_forensik_slave' => $id,
			'remarks'           => 'Direktur RSU Adhyaksa telah menyetujui Permohonan Assessing ',
			'audit_time_insert' => date('Y-m-d H:i:s'), 'audit_user_insert' => $this->session->userdata('_session_user')
		);
		$res_data = $this->Allcrud->addData('mr_timeline',$data_timeline);		

		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);		
	}

	public function proses_permintaan_layanan_direktur_1($id)
	{
		# code...
		$data['list'] = $this->get_data($id,'result_array','mr_assessing');
		$this->load->view('assessing/assessing/direktur/prepare/index',$data);				
	}	

}