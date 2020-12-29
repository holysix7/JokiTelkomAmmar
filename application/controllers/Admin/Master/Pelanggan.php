<?php

class Pelanggan extends CI_Controller
{
  function __construct(){
      parent::__construct();
      $this->load->model('Auth/Auth_model', 'm_auth');
      $this->load->model('MasterData/Supplier_model', 'm_supplier');
      $this->load->model('MasterData/Customer_model', 'm_customer');
      $this->load->model('MasterData/Karyawan_model', 'm_karyawan');
      $this->load->model('MasterData/Stok_model', 'm_gudang');
      $this->load->model('MasterData/Table_model', 'm_meja');
      if($this->session->userdata('login') != true){
          redirect('');
      }
  }

  //pelanggan
  public function index(){
      $name       = $this->session->userdata('name');
      $customers  = $this->m_customer->get_data();
      $this->load->view('Template/Header');
      $this->load->view('Admin/MasterData/pelanggan', compact('name', 'customers'));
  }

  public function createPelanggan(){
      $data = [
          'customer_name' => $this->input->post('customer_name'),
          'customer_phone'  => $this->input->post('customer_phone'),
          'customer_status'  => "Belum Makan"
      ];
      if($this->m_customer->insert($data)){
          $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Ditambahkan','success'));
      }else{
          $this->session->set_flashdata('alert_message', show_alert('<b class="text-danger"><i class="fa fa-check-circle"></i></b> Data Gagal Ditambahkan','danger'));
      }
      redirect('admin/pelanggan');
  }

  public function editPelanggan(){
      $data = $this->input->post();
      $id   = $data['id'];
      if($this->m_customer->update($data, $id)){
          $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Diubah','success'));
      }else{
          $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Diubah','danger'));
      }
      redirect('admin/pelanggan');
  }

  public function deletePelanggan($id){
      if($this->m_customer->delete($id)){
    $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Dihapus','success'));
  }else{
    $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Dihapus','danger'));
  }
      redirect('admin/pelanggan');
  }
}