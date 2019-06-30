<?php
class M_contact extends CI_Model
{
    
    public function __construct() {
        parent::__construct();
        $this->load->model("m_stringlib");
    }    

    function update_contact($data, $id) {
        $this->db->where('id', $id);
        $this->db->update('contact', $data);
    }
    function get_contact() {
        $business = new stdClass();
        $query = $this->db->get_where('contact');
        
        if ($query->num_rows() > 0) {
            $business = $query->result();
            $business = $business[0];
        }
        return $business;
    }
}
