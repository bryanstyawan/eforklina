<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct ()
	{
		parent::__construct();
		$this->load->model ('Mhome', '', TRUE);
		$this->load->model ('mlogin', '', TRUE);
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		redirect('home/main');
	}

	public function main()
	{
		// print_r($this->session->userdata('session_role'));die();	
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
		$data['carousel'] = 'off'; 
		$data['content']  = "home/request/index";
		$data['layanan']  = $this->Allcrud->listData('mr_forensik')->result_array();; 		
		$this->load->view('home',$data);		
	}

	public function services()
	{
		# code...
		$data['carousel'] = 'off'; 
		$data['content']  = "home/services/index";
		$data['layanan']  = $this->Allcrud->listData('mr_forensik')->result_array();; 		
		$this->load->view('home',$data);		
	}	
}
