<?php

/**
* 
*/
class Login extends CI_Controller
{
	function __construct() {
        parent::__construct();
        if ($this->session->userdata('level')=="1") {
            redirect('backend/Admin'); }

    }
	
	public function index(){
		
		$this->load->view('backend/login');
	}
	public function auth() {
		$data = array('username' => $this->input->post('username'),
						'password' => $this->input->post('password')
			);
		$this->load->model('m_login'); // load model_user
		$hasil = $this->m_login->cek_user($data);
		if ($hasil->num_rows() >= 1) {
			foreach ($hasil->result() as $sess) {
				$sess_data['id'] = $sess->id;
				
				$sess_data['username'] = $sess->username;				
				$sess_data['level'] = $sess->level;
				$this->session->set_userdata($sess_data);
			}
			if ($this->session->userdata('level')=='1') {
				redirect('backend/Admin');
			}
				
		}
		else {
			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
		}
	}
}