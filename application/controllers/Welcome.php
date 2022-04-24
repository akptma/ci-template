<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


	private function _header()
	{
		return $this->load->view('layouts/backend/header');
	}

	private function _footer()
	{

		return $this->load->view('layouts/backend/footer');
	}

	public function index()
	{
		$data  = [
			'view'  => '<h1>ok oc<h1>',
			'title' => 'Dashboard',
		];
		$this->_header();
		$this->load->view('backend/dashboard/index', $data);
		$this->_footer();
	}
}
