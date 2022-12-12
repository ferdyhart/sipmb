<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pmb', 'm_pmb');
	}
	public function index()
	{
		$this->load->view('index/index');
	}
	public function pendaftar()
	{
		// $pendaftar = $this->m_pmb->listpendaftar();
		// var_dump($pendaftar);

		$prodi = $this->m_pmb->listprodi();
		
		$this->load->view('index/pendaftar');
	}
}
