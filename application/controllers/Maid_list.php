<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maid_list extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data_head["page"]="home";
		$data_head["title"]="Cleaning Service";
		$this->load->view('meta',$data_head);
		$this->load->view('header',$data_head);
		$this->load->view('service');
		$this->load->view('footer');
	}
}
