<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {

	// function __construct()
	// {
	// 	 parent::__construct();
	// 	 // if ($this->session->userdata('level')!=="1") {
 //   //          redirect('login'); }
 //   //       $this->load->helper('form','url');
	// 	 $this->load->model('M_order');
	// }
	
	public function index()
	{
		$data = $this->M_order->GetData("tb_user ","where level = '2'");
		$this->load->view('backend/user/index',array('data' => $data));

	}
	public function add()
	{
		$this->load->view('backend/user/form_tambah_user');
	}
	public function register()
	{
		$this->load->view('form_register');
	}

	public function login()
	{
		$this->load->view('backend/login');
	}

	public function do_insert()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$no_telp = $_POST['no_telp'];
		$level = 2;
		
		$data_insert = array(
			'username' => $username,
			'password' => $password,
			'email' => $email,
			'no_telp' => $no_telp,
			'level' => $level,
			
		);
		$res = $this->M_order->InsertData('tb_user',$data_insert);
		if($res>=1){
			$this->flashdata_succeed();
		}
		else{
			$this->flashdata_failed();
		}

	}
	public function do_insert1()
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$no_telp = $_POST['no_telp'];
		$level = 2;
		
		$data_insert = array(
			'username' => $username,
			'password' => $password,
			'email' => $email,
			'no_telp' => $no_telp,
			'level' => $level,
			
		);
		$res = $this->M_order->InsertData('tb_user',$data_insert);
		if($res>=1){
			$this->flashdata_succeed1();
		}
		else{
			$this->flashdata_failed1();
		}
	}
	public function do_edit($id){
        $get = $this->M_order->GetData("tb_user ","where id = '$id'");
        $data = array(
            'id' => $id,
            'username' => $get[0]['username'],
            'password' => $get[0]['password'],
            'email' => $get[0]['email'],
            'no_telp' => $get[0]['no_telp'],
            
        );
        
        $this->load->view('backend/user/form_edit_user',$data);
    }

	public function do_update(){

		$id = $this->input->post('id');
		
		$get = $this->M_order->GetData("tb_user ","where id = '$id'");
		$where = array('id' => $id);
		$data = array(
			'username' =>$this->input->post('username'),
			'password' =>$this->input->post('password') 
		);
		
		$res = $this->M_order->UpdateData('tb_user',$data,$where);
		if($res>=1){
			$this->flashdata_succeed();
		}
		else{
			$this->flashdata_failed();
		}
	}
	public function do_delete($id){
		$where = array('id' => $id);
		$res = $this->M_order->DeleteData('tb_user',$where);
		if($res>=1){
			$this->flashdata_succeed();
		}
		else{
			$this->flashdata_failed();
		}
	}

	public function flashdata_succeed(){
        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Action Succeed !!!</div></div>");
                redirect('backend/C_user/index');
    }
    public function flashdata_failed(){
        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Action Failed !!!</div></div>");
                redirect('backend/C_user/index');
    }
    public function flashdata_succeed1(){
        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Action Succeed !!!</div></div>");
                redirect('Cart');
    }
    public function flashdata_failed1(){
        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Action Failed !!!</div></div>");
                redirect('Cart');
    }
	
}
