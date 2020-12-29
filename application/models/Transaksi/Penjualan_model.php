<?php

Class Penjualan_model extends CI_Model {

    protected $table = 'tr_penjualan';

    public function get_data(){
        return $this->db->get($this->table)->result_array();
    }

    public function get_data_join(){
      $this->db->join("md_pelanggan b", "b.id = a.id_pelanggan");
      $this->db->join("md_menu c", "c.id = a.id_menu");
      $this->db->join("md_lv_pedas d", "d.id = a.id_pedas");
      $this->db->join("md_table e", "e.id = a.id_meja");
      $this->db->join("md_kuah f", "f.id = a.id_kuah");
      return $this->db->get("$this->table a")->result_array();
    }

    public function show($id){		
  		return $this->db->get_where($this->table, ['id' => $id])->row();
    }

    public function insert($data){
        return $this->db->insert($this->table, $data);
    }

    public function delete($id){
		$this->db->where('id', $id)
				 ->delete($this->table);
  
		if($this->db->affected_rows() > 0){
		   return true;
		}
		return false;
    }

    public function update($data, $id){
      $this->db->where('id_penjualan', $id)
               ->update($this->table, $data);
      return true;
    }

}