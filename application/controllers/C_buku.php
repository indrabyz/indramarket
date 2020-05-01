<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_buku extends CI_Controller {

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
		$data2['produk_nama'] = $this->M_order->caribarang();
		$this->load->view('result', $data2);
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
