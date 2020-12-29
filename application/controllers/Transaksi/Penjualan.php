<?php

class Penjualan extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Auth/Auth_model', 'm_auth');
        $this->load->model('MasterData/Customer_model', 'm_pelanggan');
        $this->load->model('MasterData/Stok_model', 'm_stok');
        $this->load->model('MasterData/Menu_model', 'm_menu');
        $this->load->model('MasterData/Level_Pedas_model', 'm_pedas');
        $this->load->model('MasterData/Table_model', 'm_meja');
        $this->load->model('MasterData/Kuah_model', 'm_kuah');
        $this->load->model('Transaksi/Penjualan_model', 'm_penjualan');
        if($this->session->userdata('login') != true){
          redirect('');
        }
    }

    //dashboard
    public function index(){
        date_default_timezone_set("Asia/Jakarta");
        $date         = date('Y-m-d H:i:s');
        $name         = $this->session->userdata('name');
        $role         = $this->session->userdata('role');
        $penjualan    = $this->m_penjualan->get_data_join();
        $pelanggan    = $this->m_pelanggan->get_data_status();
        $meja         = $this->m_meja->get_data_status();
        $menu         = $this->m_menu->get_data();
        $lvPedas      = $this->m_pedas->get_data();
        $kuah         = $this->m_kuah->get_data();
        // var_dump($penjualan); die;
        $this->load->view('Template/Header');
        $this->load->view('Transaksi/Penjualan/index', compact('name', 'date', 'role', 'penjualan', 'pelanggan', 'menu', 'meja', 'lvPedas', 'kuah'));
    }
    
    public function addPenjualan(){
      $date = date_default_timezone_set("Asia/Jakarta");
      $idMenu     = $this->input->post('id_menu');
      $okelah     = $this->m_menu->show($idMenu);
      $getBahan1  = $okelah->id_bahan_1 != null ? $this->m_stok->show($okelah->id_bahan_1) : null;
      $getBahan2  = $okelah->id_bahan_2 != null ? $this->m_stok->show($okelah->id_bahan_2) : null;
      $getBahan3  = $okelah->id_bahan_3 != null ? $this->m_stok->show($okelah->id_bahan_3) : null;
      $getBahan4  = $okelah->id_bahan_4 != null ? $this->m_stok->show($okelah->id_bahan_4) : null;
      $getBahan5  = $okelah->id_bahan_5 != null ? $this->m_stok->show($okelah->id_bahan_5) : null;
      $jumlah     = intVal($this->input->post('jumlah'));
      $jumlah_stok1 = [
          'jumlah_stok' => intVal($getBahan1->jumlah_stok) - $jumlah
      ];
      $jumlah_stok2 = [
          'jumlah_stok' => intVal($getBahan2->jumlah_stok) - $jumlah
      ];
      $jumlah_stok3 = [
          'jumlah_stok' => $getBahan3 > 0 ? intVal($getBahan3->jumlah_stok) - $jumlah : null
      ];
      $jumlah_stok4 = [
          'jumlah_stok' => $getBahan4 > 0 ? intVal($getBahan4->jumlah_stok) - $jumlah : null
      ];
      $jumlah_stok5 = [
          'jumlah_stok' => $getBahan5 > 0 ? intVal($getBahan5->jumlah_stok) - $jumlah : null
      ];
      
      $idMeja     = $this->input->post('id_meja');
      $dataMeja   = [
        "table_status" => 'Sedang Diisi',
      ];
      $total_harga    = $jumlah * intVal($okelah->harga_menu);
      $data = [
        'id_pelanggan'       => $this->input->post('id_pelanggan'),
        'id_menu'            => $this->input->post('id_menu'),
        'id_pedas'           => $this->input->post('id_pedas'),
        'id_kuah'            => $this->input->post('id_kuah'),
        'id_meja'            => $this->input->post('id_meja'),
        'jumlah'             => $jumlah,
        'total_harga'        => $total_harga,
        'tanggal_penjualan'  => $this->input->post('tanggal_penjualan'),
        'status_penjualan'  => $this->input->post('status_penjualan')
      ];
      if($this->m_meja->update($dataMeja, $idMeja) && $this->m_penjualan->insert($data) && $this->m_stok->update($jumlah_stok1, $getBahan1->id) && $this->m_stok->update($jumlah_stok2, $getBahan2->id) && $this->m_stok->update($jumlah_stok3, $getBahan3->id) && $this->m_stok->update($jumlah_stok4, $getBahan4->id) && $this->m_stok->update($jumlah_stok5, $getBahan5->id)){
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Ditambahkan','success'));
      }else{
        $this->session->set_flashdata('alert_message', show_alert('<b class="text-danger"><i class="fa fa-check-circle"></i></b> Data Gagal Ditambahkan','danger'));
      }
      redirect('transaksi/penjualan');
    }

  public function updatePenjualan(){
    $id_meja = $this->input->post('id_meja');
    $id_penjualan = $this->input->post('id_penjualan');
    $data = [
      "table_status" => $this->input->post('table_status')
    ];
    $dataPenjualan = [
      'status_penjualan'  => $this->input->post('status_penjualan')
    ];
    // var_dump($id_meja); die;
    if($this->m_penjualan->update($dataPenjualan, $id_penjualan) && $this->m_meja->update($data, $id_meja)){
      $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Diubah','success'));
    }else{
      $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Diubah','danger'));
    }
    redirect('transaksi/penjualan');
  }
  public function deletePenjualan($id){
    $show = $this->m_persediaan->show($id);
    if($this->m_persediaan->delete($id)){
    $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Dihapus','success'));
  }else{
    $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Dihapus','danger'));
  }
    redirect('transaksi/penjualan');
  }
}