<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct() {
        parent::__construct();   
        $this->load->model('m_admin');
        $this->load->model('m_time');
        if (!$this->session->has_userdata('stu_keyword')) {
             	$this->session->set_userdata('stu_keyword', "");
        }
        if (!$this->session->has_userdata('start_date')) {
             	$this->session->set_userdata('start_date', "");
        }
        if (!$this->session->has_userdata('end_date')) {
             	$this->session->set_userdata('end_date', "");
        }
        if (!$this->session->has_userdata('limit')) {
             	$this->session->set_userdata('limit', 12);
        }     
    }
	public function index()
	{
		$data['page'] = 'home';
		$this->load->view('admin/login',$data);
	}
	public function dashboard()
	{
		if ($this->session->userdata('id')) {
            $user_data = $this->m_admin->get_admin_by_id($this->session->userdata('id'));
            if (isset($user_data->username)) {
                $this->user_data = $user_data;
            }
            else {
                redirect('main/logout');
            }
        }
        else {
            redirect('main/logout');
        }
		$data['page'] = 'home';
		$data['month_name_arr'] = $this->m_stringlib->month_name_arr;
		$data['day_name_arr'] = $this->m_stringlib->day_name_arr;
		$this->load->view('admin/header',$data);
		$this->load->view('admin/dashboard',$data);
		$this->load->view('admin/footer',$data);

	}
	private function quick_sort($array)
	{
		// find array size
		$length = count($array);
		
		// base case test, if array of length 0 then just return array to caller
		if($length <= 1){
			return $array;
		}
		else{
		
			// select an item to act as our pivot point, since list is unsorted first position is easiest
			$pivot = $array[0];
			
			// declare our two arrays to act as partitions
			$left = $right = array();
			
			// loop and compare each item in the array to the pivot value, place item in appropriate partition
			for($i = 1; $i < count($array); $i++)
			{
				if($array[$i]->quick_sort_data < $pivot->quick_sort_data){
					$left[] = $array[$i];
				}
				else{
					$right[] = $array[$i];
				}
			}
			
			// use recursion to now sort the left and right lists
			return array_merge($this->quick_sort($left), array($pivot), $this->quick_sort($right));
		}
	}
	public function login()
	{	
	$data['error_msg2']='Please login with your username and password';

	if(isset($_POST['username']))
		{
			$user_data=$this->m_admin->get_by_username_password($_POST['username'],$_POST['password']);
			//echo $_POST['login_name']." asdasd ".$_POST['password'];
			if (isset($user_data->username)) {
				$this->session->set_userdata('username', $user_data->username);
				$this->session->set_userdata('id', $user_data->id);
				redirect('admin/main/dashboard');

			}else{			
				$this->load->view('login',$data);
				$this->session->sess_destroy();
			}			
		}else{
			$this->load->view('login',$data);
			$this->session->sess_destroy();
		}	
		
	}
	public function logout()
	{		
		$this->session->set_userdata('username', '');
		$this->session->set_userdata('id', '');
		$this->session->sess_destroy();
		redirect('main');
	}
}
