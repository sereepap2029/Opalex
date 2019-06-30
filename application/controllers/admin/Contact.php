<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct() {
        parent::__construct();      
        $this->load->model('m_admin');  
        $this->load->model('m_contact');  
        if ($this->session->userdata('id')) {
            $user_data = $this->m_admin->get_admin_by_id($this->session->userdata('id'));
            if (isset($user_data->username)&&isset($user_data->perm['data'])) {
                $this->user_data = $user_data;
            }
            else {
                redirect('admin/main/logout');
            }
        }
        else {
            redirect('admin/main/logout');
        }
    }

	private function create_ins_array($id,$post)
  {
  	print_r($post);
    $data_ins = array(
        'id' => $id,
        'gal_header' => $post['gal_header'],
        'gal_des' => $post['gal_des'],
        'phone' => $post['phone'],
        'mobile' => $post['mobile'],
        'email' => $post['email'],
        'facebook' => $post['facebook'],
        'twister' => $post['twister'],
        'lat' => $post['lat'],
        'lon' => $post['lon'],
      );
    return $data_ins;

  }
	public function index()
	{
		if (isset($_POST['gal_header'])&&isset($_POST['edit'])) {
				$id=$_POST['edit'];
				$data_up=$this->create_ins_array($id,$_POST);
					$this->m_contact->update_contact($data_up,$id);
					?>
				        <script type="text/javascript">
				        	alert("บันทึกข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('admin/contact');?>","_self");            
				        </script>
				    <?
		}
		$id=$this->uri->segment(4,'');
		$contact=$this->m_contact->get_contact();
		$data['page'] = 'Banner';
		if (isset($contact->gal_header)) {
			$data['contact']=$contact;
			$data['edit']=$contact->id;
		}
		$this->load->view('admin/header',$data);
		$this->load->view('admin/v_contact',$data);
		$this->load->view('admin/footer',$data);
	}

	
}
