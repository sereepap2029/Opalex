<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

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
	public function __construct() {
        parent::__construct();       
        $this->load->model('m_banner'); 
        $this->load->model('m_contact');  
        $this->load->model('m_gallery');
        $this->load->model('m_maid');
    }
	public function index()
	{
		$data_head["page"]="home";
		$data_head["title"]="Cleaning Service";
		$data['contact']=$this->m_contact->get_contact();
		$data['item']=$this->m_gallery->get_item();
		$data['maid_list'] = $this->m_maid->get_all_maid();
		shuffle($data['maid_list']);
		$data['banner_list'] = $this->m_banner->get_all_banner();
		$data_head["contact"]=$data['contact'];
		$this->load->view('meta',$data_head);
		$this->load->view('header',$data_head);
		$this->load->view('home',$data);
		$this->load->view('footer',$data_head);
	}
}
