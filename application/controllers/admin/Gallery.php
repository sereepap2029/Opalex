<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	public function __construct() {
        parent::__construct();      
        $this->load->model('m_admin');
        $this->load->model('m_gallery');
        if ($this->session->userdata('id')) {
            $user_data = $this->m_admin->get_admin_by_id($this->session->userdata('id'));
            if (isset($user_data->username)&&isset($user_data->perm['data'])) {
                $this->user_data = $user_data;
            }
            else {
                redirect('main/logout');
            }
        }
        else {
            redirect('main/logout');
        }
    }   

	public function index()
	{
		$data['page'] = 'user';
		if (isset($_POST['del_pic'])) {
            foreach ($_POST['del_pic'] as $key => $value) {
                $this->m_gallery->del_pic($value);
            }			
		}
		if (isset($_POST['pic_detail'])) {
            $sort_order=0;
            foreach ($_POST['pic_detail'] as $key => $value) {
                $sort_order+=1;
                    $pos = strpos($value, "old_file_picture__");
                    if ($pos === false) {
                        //echo "in here 1 ";
                        $item_id=$this->m_gallery->gen_pic_id();                        
                        $ext=explode(".", $value);
                        $new_ext=$ext[count($ext)-1];
                        $new_filename=$item_id.".".$new_ext;
                        $file = './media/temp/'.$value;
                        $newfile = "./media/gallery/".$new_filename;
                        if (!is_dir("./media/gallery/")) {
                                mkdir("./media/gallery/");
                            }
                        $item_data = array(
                        'id' => $item_id, 
                        'sort_order' => $sort_order, 
                        'filepath' => $new_filename 
                        );
                        if (!copy($file, $newfile)) {
                            echo "failed to copy $file...\n".$file." to ".$newfile;
                            @unlink("./media/temp/".$value);
                            @unlink("./media/temp/thumbnail/".$value);
                        }else{
                        	$this->m_gallery->add_pic($item_data);   
                            @unlink("./media/temp/".$value);
                            @unlink("./media/temp/thumbnail/".$value);                            
                        }
                      }else{
                        $id=explode("__", $value);
                        //echo "in here";
                        $item_id=$id[1];
                        $item_data = array(
                            'sort_order' => $sort_order, 
                        );
                        $this->m_gallery->update_pic($item_data,$item_id);
                        
                      }                
                
            }
        }
        $data['item']=$this->m_gallery->get_item();

		$this->load->view('admin/header',$data);
		$this->load->view('admin/v_gallery',$data);
		$this->load->view('admin/footer',$data);
	}
}
