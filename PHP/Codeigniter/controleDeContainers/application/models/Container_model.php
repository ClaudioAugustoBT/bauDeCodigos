<?php

class Container_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    // SELECT

    public function select_all_containers()
    {
        $this->db->from("tb_container");
        $result = $this->db->get();
        return $result->result();
    }

    public function select_container()
    {
    }

    public function select_all_tipos_containers()
    {
        $this->db->from("tb_tipo_container");
        $result = $this->db->get();
        return $result->result();
    }

    public function insert($data)
    {
        $this->db->insert("tb_container", $data);
    }

    public function update($id, $data)
    {
        $this->db->where("cd_container", $id);
        $this->db->update("tb_container", $data);
    }

}
