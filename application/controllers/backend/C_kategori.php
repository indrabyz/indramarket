<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kategori extends CI_Controller {

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
		$data = $this->M_order->GetData('tbl_kategori','');
		$this->load->view('backend/kategori/index',array('data' => $data));

	}
	public function add()
	{
		$this->load->view('backend/kategori/form_tambah_kategori');
	}
	public function do_insert()
	{
		$nama_kategori = $_POST['nama_kategori'];
		
		$data_insert = array(
			'nama_kategori' => $nama_kategori,
			
		);
		$res = $this->M_order->InsertData('tbl_kategori',$data_insert);
		if($res>=1){
			$this->flashdata_succeed();
		}
		else{
			$this->flashdata_failed();
		}
	}
	public function do_edit($id){
        $get = $this->M_order->GetData("tbl_kategori ","where id = '$id'");
        $data = array(
            'id' => $id,
            'nama_kategori' => $get[0]['nama_kategori'],
            
        );
        
        $this->load->view('backend/kategori/form_edit_kategori',$data);
    }

	public function do_update(){

		$id = $this->input->post('id');
		
		$get = $this->M_order->GetData("tbl_kategori ","where id = '$id'");
		$where = array('id' => $id);
		$data = array(
			'nama_kategori' =>$this->input->post('nama_kategori') 
		);
		
		$res = $this->M_order->UpdateData('tbl_kategori',$data,$where);
		if($res>=1){
			$this->flashdata_succeed();
		}
		else{
			$this->flashdata_failed();
		}
	}
	public function do_delete($id){
		$where = array('id' => $id);
		$res = $this->M_order->DeleteData('tbl_kategori',$where);
		if($res>=1){
			$this->flashdata_succeed();
		}
		else{
			$this->flashdata_failed();
		}
	}

	public function flashdata_succeed(){
        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Action Succeed !!!</div></div>");
                redirect('backend/C_kategori/index');
    }
    public function flashdata_failed(){
        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Action Failed !!!</div></div>");
                redirect('backend/C_kategori/index');
    }
	
}
