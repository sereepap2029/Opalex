<?php
class M_maid extends CI_Model
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
            $query = $this->db->get_where('maid', array('id' => $temp_id));
            if ($query->num_rows() == 0) {
                $clam_id = $temp_id;
                $isuniq = TRUE;
            }
        } while (!$isuniq);
        
        return $clam_id;
    }

    function add_maid($data) {
        $this->db->insert('maid', $data);
    }
    function update_maid($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('maid', $data);
    }
    function delete_maid($id) { 
        $maid=$this->get_maid_by_id($id);

        @unlink("./media/maid/".$maid->thumb_pic);
        @unlink("./media/maid/".$maid->main_pic);
        $this->db->where('id', $id);
        $this->db->delete('maid');
    }
    function count_all() {
        $query = $this->db->query("SELECT COUNT(*) as r FROM maid;");
        return $query->result()[0]->r;
    }
    function get_all_maid($offset=0,$limit=0,$order_by="id",$type="asc",$filter = array()) {
        $g_list = array();
        $this->db->order_by($order_by, $type);
        if ($limit!=0) {
            $this->db->limit($limit, $offset);
        }
        foreach ($filter as $key => $value) {
            $this->db->like($key, $value);
        }
        $query = $this->db->get('maid');
        
        if ($query->num_rows() > 0) {
            $g_list = $query->result();
        }
        return $g_list;
    }

    function get_maid_by_id($id) {
        $business = new stdClass();
        $query = $this->db->get_where('maid', array('id' => $id));
        
        if ($query->num_rows() > 0) {
            $business = $query->result();
            $business = $business[0];
        }
        return $business;
    }
}
