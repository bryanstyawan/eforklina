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
		$data['carousel']         = 'off'; 
		$data['content']          = "home/request/index";
		$data['layanan']          = $this->Allcrud->listData('mr_forensik')->result_array();
		$data['instansi']         = $this->Allcrud->listData('mr_instansi')->result_array();				
		$data['alur_proses']      = $this->Allcrud->listData('mr_alur_perkara')->result_array();
		$data['penjamin_biaya']   = $this->Allcrud->listData('mr_penjamin_biaya')->result_array();				 		
		$this->load->view('home',$data);		
	}

	public function services($token)
	{
		# code...
		$data['carousel']  = 'off'; 
		$data['content']   = "home/services/index";
		$data['negara']    = $this->Allcrud->listData('mr_negara')->result_array();
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

	public function services_files($token)
	{
		# code...
		$data['carousel'] = 'off'; 
		$data['content']  = "home/services_files/index";
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
			$data_store['id_forensik']       = $data_sender['f_permohonan'];
			$data_store['id_penjamin_biaya'] = $data_sender['f_penjamin_biaya'];			
			$data_store['id_instansi']       = ($data_sender['f_instansi_jaksa'] == 'others') ? '0' : $data_sender['f_instansi_jaksa'];
			$data_store['nama']              = $data_sender['f_nama_jaksa'];
			$data_store['jabatan']           = $data_sender['f_jabatan_jaksa'];
			$data_store['nrp']               = $data_sender['f_nrp_jaksa'];
			$data_store['telepon']           = $data_sender['f_telepon_jaksa'];
			$data_store['email']             = $data_sender['f_email_jaksa'];			
			$data_store['id_alur_perkara']   = $data_sender['f_alur_perkara'];						
			$data_store['status']            = 1;
			$data_store['token']             = $this->Globalrules->randomCode(6);
			$res_data = $this->Allcrud->addData_with_return_id('mr_request',$data_store);
			if ($res_data['status'] == 1) {
				# code...
				$data_timeline = array(
					'token'          => $data_store['token'],
					'remarks'           => 'Mengajukan permohonan layanan',
					'audit_time_insert' => date('Y-m-d H:i:s'), 'audit_user_insert' => $this->session->userdata('_session_user')
				);
				$res_data = $this->Allcrud->addData('mr_timeline',$data_timeline);				
			}
			$text_status = $this->Globalrules->check_status_res($res_data,'Permohonan anda telah berhasil diajukan.');
		} elseif ($data_sender['crud'] == 'update') {
			# code...
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
			$data_timeline = array(
				'token'             => $token,
				'remarks'           => 'Unggah Dokumen Tahap 1',
				'audit_time_insert' => date('Y-m-d H:i:s'), 'audit_user_insert' => $this->session->userdata('_session_user')
			);
			$res_data    = $this->Allcrud->addData('mr_timeline',$data_timeline);
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

	public function verifikasi_berkas_1($token)
	{
		# code...
		$res_data             = "";
		$text_status          = "";
		$data_store['status'] = 4;
		$get_data             = $this->Allcrud->getData('mr_request',array('token'=>$token))->result_array();				
		if ($get_data != array()) {
			# code...
			$res_data             = $this->Allcrud->editData('mr_request',$data_store,array('token'=>$token));		
			$data_timeline = array(
				'token'             => $token,
				'remarks'           => 'Unggah Dokumen Tahap 2',
				'audit_time_insert' => date('Y-m-d H:i:s'), 'audit_user_insert' => $this->session->userdata('_session_user')
			);
			$res_data    = $this->Allcrud->addData('mr_timeline',$data_timeline);				
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
			$data_store['jenis_kelamin']			 = $data_sender['f_jenis_kelamin_termohon'];
			$data_store['pihak_keluarga']            = $data_sender['f_keluarga_termohon'];
			$data_store['id_kewarganegaraan']        = $data_sender['f_warga_termohon'];										
			$data_store['alamat']                    = $data_sender['f_alamat_termohon'];
			$data_store['keluhan_medis']             = $data_sender['f_keluhan_termohon'];
			$data_store['proses_hukum']              = $data_sender['f_proses_hukum_termohon'];			
			$data_store['status']                    = 4;
			$res_data = $this->Allcrud->editData('mr_request',array('status'=>4),array('token'=>$data_store['token']));			
			$res_data = $this->Allcrud->addData_with_return_id('mr_services',$data_store);
			if ($res_data['status'] == 1) {
				# code...
				$data_timeline = array(
					'token'          => $data_store['token'],
					'remarks'           => 'Mengisi data termohon',
					'audit_time_insert' => date('Y-m-d H:i:s'), 'audit_user_insert' => $this->session->userdata('_session_user')
				);
				$res_data = $this->Allcrud->addData('mr_timeline',$data_timeline);				
			}
			$text_status = $this->Globalrules->check_status_res($res_data,'Permohonan anda telah berhasil diajukan.');

			$this->load->library('email');
			$get_request = $this->Allcrud->getData('mr_request',array('token'=>$token))->result_array();			

			$subject = 'Permohonan layanan forensik klinik';
			$message = '<p>Terima kasih telah melakukan permohonan layanan forensik klinik [E-forklina].</p>
						<p>Selanjutnya akan proses oleh tim forensik klinik.</p>
						';
			
			// Get full html:
			$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
				<title>' . html_escape($subject) . '</title>
				<style type="text/css">
					body {
						font-family: Arial, Verdana, Helvetica, sans-serif;
						font-size: 16px;
					}
				</style>
			</head>
			<body>
			' . $message . '
			</body>
			</html>';
			// Also, for getting full html you may use the following internal method:
			//$body = $this->email->full_html($subject, $message);
			
			$result = $this->email
			->from('it.rsuadhyaksa.co.id@gmail.com')
			->reply_to('it.rsuadhyaksa.co.id@gmail.com')    // Optional, an account where a human being reads.
				->to($get_request[0]['email'])
				->subject($subject)
				->message($body)
				->send();
			
			
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

	public function track_request()
	{
		# code...
		$data['carousel']         = 'off'; 
		$data['content']          = "home/request_track/index";
		$this->load->view('home',$data);		
	}

	public function search_request($token=NULL)
	{
		# code...
		$data['list'] = $this->Allcrud->getData('mr_request',array('token'=>$token))->result_array();				
		$this->load->view('home/request_track/result',$data);
	}

	public function route($token=NULL)
	{
		# code...
		$get_data = $this->Allcrud->getData('mr_request',array('token'=>$token))->result_array();					
		if ($get_data != array()) {
			# code...
			switch ($get_data[0]['status']) {
				case 1:
					# code...
					redirect('home/verify/'.$token);
					break;
				case 2:
					# code...
					redirect('home/services/'.$token);					
					break;
				// case 3:
				// 	# code...
				// 	redirect('home/services_files/'.$token);										
				// 	break;
				default:
					# code...
					redirect('home/request_end/'.$token);					
					break;
			}
		}		
	}

	public function request_end($token=NULL)
	{
		# code...
		$data['carousel'] = 'off'; 
		$data['content']  = "home/request_track/end";
		$this->load->view('home',$data);					
	}	

	public function upload_step_1($token,$id)
	{
		# code...
		$id_pekerjaan            = "";
		$file_pendukung          = "";
		$res_data                = "";
		$text_status             = "";
		$config['upload_path']   = FCPATH."/public/request/".$token."/";
		$config['allowed_types'] = 'pdf|docx|doc|jpg|jpeg|png|ppt|pptx';
		$config['max_size']      = '15000';
		$data                    = "";
		$this->load->library('upload', $config);
		
		if(!is_dir("public/request/".$token."/"))
		{
			mkdir("public/request/".$token."/", 0755);
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
        }

		$data = array
						(
							'id_alur_perkara_berkas' => $id,
							'file'                   => $dataupload['file_name'],
							'token'                  => $token
						);

		$check_data = $this->Allcrud->getData('mr_request_file',array('token'=>$token,'id_alur_perkara_berkas'=>$id))->result_array();						
		if ($check_data != array()) {
			# code...
			$path_to_file = $config['upload_path'].$check_data[0]['file'];			
			if ($check_data[0]['file'] != '' || $check_data[0]['file'] != NULL) {
				# code...
				$param_file_exists = 0;
				if (file_exists($path_to_file)) {
					# code...
					$param_file_exists = 1;
					if(unlink($path_to_file)) {
						// echo 'deleted successfully';
					}
					else {
						echo 'errors occured';
					}							
				}
				else {
					# code...
					$param_file_exists = 0;				
				}				
			}

			$res_data    = $this->Allcrud->editData('mr_request_file',$data,array('id_alur_perkara_berkas'=>$id,'token'=>$token));			
		} 
		else 
		{
			# code...
			$res_data_id = $this->Allcrud->addData('mr_request_file',$data);						
		}
		

		if ($text_status == '<p>You did not select a file to upload.</p>') {
			# code...
			$res_data = 1;
			$text_status = "";
		}

		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);		
	}

	public function user()
	{
		# code...
		$data['carousel'] = 'off'; 
		$data['content']  = "home/home/index";
		$this->load->view('home',$data);		
	}
}
