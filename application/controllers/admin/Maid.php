<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maid extends CI_Controller {

	public function __construct() {
        parent::__construct();      
        $this->load->model('m_admin');  
        $this->load->model('m_maid');  
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
		$offset=($page-1)*12;
		$data['maid_list'] = $this->m_maid->get_all_maid($offset,12);
		$rowcount=$this->m_maid->count_all();
		$pagecount=($rowcount/12);
		if (($rowcount%12!=0)) {
			$pagecount+1;
		}
		$data['pagecount']=$pagecount;
		$data['pagenum']=$page;
		$this->load->view('admin/header',$data);
		$this->load->view('admin/maid_list',$data);
		$this->load->view('admin/footer',$data);
	}

	private function create_ins_array($id,$post,$edit=false,$obj=null)
  {
  	print_r($post);
    $data_ins = array(
        'id' => $id,
        'maid_name' => $post['maid_name'],
        'maid_description' => $post['maid_description'],
        'maid_short_des' => $post['maid_short_des'],        
        
      );
    if (isset($post['maid_list_des'])) {
	    foreach ($post['maid_list_des'] as $key => $value) {
	    	if ($key==0) {
	    		$data_ins['maid_list_des']=$value;
	    	}else{
	    		$data_ins['maid_list_des'].="-and-".$value;
	    	}
	    }
	}
		if (isset($post['thumb_pic'])) {
				$pic_val=$post['thumb_pic'];
                    $pos = strpos($pic_val, "old_file_picture__");
                    if ($pos === false) {
                    	if ($edit) {
                    		@unlink("./media/maid/".$obj->thumb_pic);
                    	}
                        //echo "in here 1 ";
                        $item_id=$id."-".time();                        
                        $ext=explode(".", $pic_val);
                        $new_ext=$ext[count($ext)-1];
                        $new_filename=$item_id."_thumb.".$new_ext;
                        $file = './media/temp/'.$pic_val;
                        $newfile = "./media/maid/".$new_filename;
                        if (!is_dir("./media/maid/")) {
                                mkdir("./media/maid/");
                            }                        
                        if (!copy($file, $newfile)) {
                            echo "failed to copy $file...\n".$file." to ".$newfile;
                            @unlink("./media/temp/".$pic_val);
                            @unlink("./media/temp/thumbnail/".$pic_val);
                        }else{   
                        	$data_ins['thumb_pic']=$new_filename;
                            @unlink("./media/temp/".$pic_val);
                            @unlink("./media/temp/thumbnail/".$pic_val);                            
                        }
                      }            
        }
        if (isset($post['main_pic'])) {
				$pic_val=$post['main_pic'];
                    $pos = strpos($pic_val, "old_file_picture__");
                    if ($pos === false) {
                    	if ($edit) {
                    		@unlink("./media/maid/".$obj->main_pic);
                    	}
                        //echo "in here 1 ";
                        $item_id=$id."-".time();                        
                        $ext=explode(".", $pic_val);
                        $new_ext=$ext[count($ext)-1];
                        $new_filename=$item_id."_main.".$new_ext;
                        $file = './media/temp/'.$pic_val;
                        $newfile = "./media/maid/".$new_filename;
                        if (!is_dir("./media/maid/")) {
                                mkdir("./media/maid/");
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
			$this->m_maid->delete_maid($id);
			?>
				        <script type="text/javascript">
				        	alert("ลบข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('admin/maid');?>","_self");            
				        </script>
				    <?
		}else{
			?>
				        <script type="text/javascript">
				        	alert("ไม่มีสิทธิลบข้อมูล");
				            window.open("<?echo site_url('admin/maid');?>","_self");            
				        </script>
				    <?
		}
	}
	public function create()
	{
		if (isset($_POST['maid_name'])&&!isset($_POST['edit'])) {
				$id=$this->m_maid->generate_id();
				$data_up=$this->create_ins_array($id,$_POST);
					$this->m_maid->add_maid($data_up);
					?>
				        <script type="text/javascript">
				        	alert("บันทึกข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('admin/maid');?>","_self");            
				        </script>
				    <?

		}
		if (isset($_POST['maid_name'])&&isset($_POST['edit'])) {
				$id=$_POST['edit'];
				$maid=$this->m_maid->get_maid_by_id($id);
				$data_up=$this->create_ins_array($id,$_POST,true,$maid);
					$this->m_maid->update_maid($data_up,$id);
					?>
				        <script type="text/javascript">
				        	alert("บันทึกข้อมูลเรียบร้อยแล้ว");
				            window.open("<?echo site_url('admin/maid');?>","_self");            
				        </script>
				    <?
		}
		$id=$this->uri->segment(4,'');
		$maid=$this->m_maid->get_maid_by_id($id);
		$data['page'] = 'maid';
		if (isset($maid->maid_name)) {
			$data['maid']=$maid;
			$data['edit']=$maid->id;
		}
		$this->load->view('admin/header',$data);
		$this->load->view('admin/create_maid',$data);
		$this->load->view('admin/footer',$data);
	}
}
