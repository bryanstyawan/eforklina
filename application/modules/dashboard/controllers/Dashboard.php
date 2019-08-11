<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model ('mdashboard', '', TRUE);
		date_default_timezone_set('Asia/Jakarta');
	}

	public function home()
	{
		$this->Globalrules->session_rule();
		$data['title']        = '';
		$data['admin1']       = $this->Allcrud->getData('mr_request',array('status'=>4))->num_rows();
		$data['admin2']       = $this->Allcrud->getData('mr_request',array('status'=>5))->num_rows();
		$data['schedule']     = $this->Allcrud->getData('mr_request',array('status'=>6))->num_rows();
		$data['team']         = $this->Allcrud->getData('mr_request',array('status'=>7))->num_rows();
		$data['verify_kabid'] = $this->Allcrud->getData('mr_request',array('status'=>8))->num_rows();
		$data['sk']           = $this->Allcrud->getData('mr_request',array('status'=>9))->num_rows();										
		$data['content']      = 'vdashboard';
		$this->load->view('templateAdmin',$data);
	}

	public function delete_common_notify($param=NULL)
	{
		# code...
		$data_notify = $this->mdashboard->get_data_notify_user($param,$this->session->userdata('sesUser'));
		if (count($data_notify) != 0) {
			# code...
			for ($i=0; $i < count($data_notify); $i++) {
				# code...
				$data_change = array(
					'status_read' => 1
				);
				$flag        = array('id'=>$data_notify[$i]->id);
				$res_data    = $this->Allcrud->editData('log_notifikasi',$data_change,$flag);
			}
		}
	}

	public function soon()
	{
		# code...
		$this->Globalrules->session_rule();
		$data['title']   = '';
		$data['content'] = 'dashboard/soon/index';
		$this->load->view('templateAdmin',$data);		
	}
}
