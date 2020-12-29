<?php

Class Persediaan_model extends CI_Model {

    protected $table = 'tr_persediaan';

    public function get_data(){
        return $this->db->get($this->table)->result_array();
    }

    public function show($id){		
      // var_dump($id); die;
		return $this->db->get_where($this->table, ['id' => $id])->row();
    }
    
    public function join_persediaan(){
      $this->db->select('a.id, c.nama_stok, a.amount, a.total_price, a.purchase_date, a.expired_date, a.status, a.id_supplier, b.supplier_name');
      $this->db->join("md_supplier b", "a.id_supplier = b.id");
      $this->db->join("md_stok c", "a.id_stok = c.id");
      return $this->db->get("$this->table a")->result_array(); 
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
      $this->db->where('id', $id)
               ->update($this->table, $data);
      return true;
    }

}