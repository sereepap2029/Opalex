<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	public function __construct() {
        parent::__construct();      
        $this->load->model('m_admin');  
        $this->load->model('m_banner');  
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
	public function index()
	{
		$data['page'] = 'user';
		$page=(int)$this->uri->segment(3,"1");
		$data['banner_list'] = $this->m_banner->get_all_banner();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/banner_list',$data);
		$this->load->view('admin/footer',$data);
	}

	private function create_ins_array($id,$post,$edit=false,$obj=null)
  {
  	print_r($post);
    $data_ins = array(
        'id' => $id,
        'title' => $post['title'],
        'des' => $post['des'],
        'sort_order' => 999,
      );
		
        if (isset($post['main_pic'])) {
				$pic_val=$post['main_pic'];
                    $pos = strpos($pic_val, "old_file_picture__");
                    if ($pos === false) {
                    	if ($edit) {
                    		@unlink("./media/banner/".$obj->main_pic);
                    	}
                        //echo "in here 1 ";
                        $item_id=$id."-".time();                        
                        $ext=explode(".", $pic_val);
                        $new_ext=$ext[count($ext)-1];
                        $new_filename=$item_id."_main.".$new_ext;
                        $file = './media/temp/'.$pic_val;
                        $newfile = "./media/banner/".$new_filename;
                        if (!is_dir("./media/banner/")) {
                                mkdir("./media/banner/");
                            }                        
                        if (!copy($file, $newfile)) {
                            echo "failed to copy $file...\n".$file." to ".$newfile;
                            @unlink("./media/temp/".$pic_val);
                            @unlink("./media/temp/thumbnail/".$pic_val);
                        }else{   
                        	$data_ins['main_pic']=$new_filename;
                            @unlink("./media/temp/".$pic_val);
                            @unlink("./media/temp/thumbnail/".$pic_val);                            
                        }
                      }            
        }
    return $data_ins;

  }
	public function delete()
	{
		$id=$this->uri->segment(4,'');
		if (isset($this->user_data->perm['delete'])) {
			$this->m_banner->delete_banner($id);
			?>
				        <script type="text/javascript">
				        	alert("ลบข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('admin/banner');?>","_self");            
				        </script>
				    <?
		}else{
			?>
				        <script type="text/javascript">
				        	alert("ไม่มีสิทธิลบข้อมูล");
				            window.open("<?echo site_url('admin/banner');?>","_self");            
				        </script>
				    <?
		}
	}
	public function create()
	{
		if (isset($_POST['title'])&&!isset($_POST['edit'])) {
				$id=$this->m_banner->generate_id();
				$data_up=$this->create_ins_array($id,$_POST);
					$this->m_banner->add_banner($data_up);
					?>
				        <script type="text/javascript">
				        	alert("บันทึกข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('admin/banner');?>","_self");            
				        </script>
				    <?

		}
		if (isset($_POST['title'])&&isset($_POST['edit'])) {
				$id=$_POST['edit'];
				$banner=$this->m_banner->get_banner_by_id($id);
				$data_up=$this->create_ins_array($id,$_POST,true,$banner);
					$this->m_banner->update_banner($data_up,$id);
					?>
				        <script type="text/javascript">
				        	alert("บันทึกข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('admin/banner');?>","_self");            
				        </script>
				    <?
		}
		$id=$this->uri->segment(4,'');
		$banner=$this->m_banner->get_banner_by_id($id);
		$data['page'] = 'Banner';
		if (isset($banner->title)) {
			$data['banner']=$banner;
			$data['edit']=$banner->id;
		}
		$this->load->view('admin/header',$data);
		$this->load->view('admin/create_banner',$data);
		$this->load->view('admin/footer',$data);
	}

	public function ajax_sort()
	{
		header('Content-Type: application/json');
        $json = array();
        $json['flag']="OK";
        $sort_order=0;
        foreach ($_POST['sort'] as $key => $value) {
        	$sort_order+=1;
        	$up_dat = array(
	        		'sort_order' => $sort_order, 
	        );
	        $this->m_banner->update_banner($up_dat,$value);
        }	
		echo json_encode($json);		    
	}
}
