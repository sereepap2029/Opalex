<?php
class M_banner extends CI_Model
{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("m_stringlib");
    }
    
    function generate_id() {
        $isuniq = FALSE;
        $clam_id = '';
        do {
            $temp_id = $this->m_stringlib->uniqueAlphaNum10();
            $query = $this->db->get_where('banner', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }

    function add_banner($data) {
        $this->db->insert('banner', $data);
    }
    function update_banner($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('banner', $data);
    }
    function delete_banner($id) { 
        $banner=$this->get_banner_by_id($id);
        @unlink("./media/banner/".$banner->main_pic);
        $this->db->where('id', $id);
        $this->db->delete('banner');
    }
    function count_all() {
        $query = $this->db->query("SELECT COUNT(*) as r FROM banner;");
        return $query->result()[0]->r;
    }
    function get_all_banner($offset=0,$limit=0,$order_by="sort_order",$type="asc",$filter = array()) {
        $g_list = array();
        $this->db->order_by($order_by, $type);
        if ($limit!=0) {
            $this->db->limit($limit, $offset);
        }
        foreach ($filter as $key => $value) {
            $this->db->where($key, $value);
        }
        $query = $this->db->get('banner');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }

    function get_banner_by_id($id) {
        $business = new stdClass();
        $query = $this->db->get_where('banner', array('id' => $id));
        
        if ($query->num_rows() > 0) {
            $business = $query->result();
            $business = $business[0];
        }
        return $business;
    }
}
