<?php

class Persediaan extends CI_Controller
{
    function __construct(){
        parent::__construct();
        $this->load->model('Auth/Auth_model', 'm_auth');
        $this->load->model('MasterData/Supplier_model', 'm_supplier');
        $this->load->model('Transaksi/Persediaan_model', 'm_persediaan');
        $this->load->model('MasterData/Stok_model', 'm_stok');
        if($this->session->userdata('login') != true){
            redirect('');
        }
    }

    //dashboard
    public function index(){
        date_default_timezone_set("Asia/Jakarta");
        $date =  date('Y-m-d');
        $checkData   = date("Y-m-d", strtotime("+1 month"));
        // var_dump($checkData); die;
        $name        = $this->session->userdata('name');
        $role        = $this->session->userdata('role');
        $stok        = $this->m_stok->get_data();
        $suppliers   = $this->m_supplier->get_data();
        $persediaans = $this->m_persediaan->join_persediaan();
        $inputTgl = "<input type='date' name='expired_date' class='form-control' placeholder='Tanggal Kadaluarsa' required min='".$checkData."'>";
        // var_dump($inputTgl); die;
        $this->load->view('Template/Header');
        $this->load->view('Transaksi/Persediaan/index', compact('name', 'persediaans', 'suppliers', 'date', 'role', 'stok', 'checkData', 'inputTgl'));
    }
    
    public function add(){
        $date = date_default_timezone_set("Asia/Jakarta");
        $idStok = $this->input->post('id_stok');
        $stok = $this->m_stok->show($idStok);
        $unit_price = intVal($stok->unit_price);
        $amount         = $this->input->post('amount');
        $total_price    = $unit_price * intVal($amount);
        $expired_date   = $this->input->post('expired_date');
        $data = [
            'id_supplier'   => $this->input->post('id_supplier'),
            'id_stok'       => $this->input->post('id_stok'),
            'amount'        => $amount,
            'total_price'   => $total_price,
            'purchase_date' => date('Y-m-d'),
            'expired_date'  => $expired_date,
            'status'        => 'Belum Disetujui'
        ];
        if($this->m_persediaan->insert($data)){
            $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Ditambahkan','success'));
        }else{
            $this->session->set_flashdata('alert_message', show_alert('<b class="text-danger"><i class="fa fa-check-circle"></i></b> Data Gagal Ditambahkan','danger'));
        }
        redirect('transaksi/persediaan');
    }

    public function delete($id){
        $show = $this->m_persediaan->show($id);
        if($this->m_persediaan->delete($id)){
			$this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Dihapus','success'));
		}else{
			$this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Dihapus','danger'));
		}
        redirect('transaksi/persediaan');
    }

    public function update(){
        $id   = $this->input->post('id');
        $nama_stok = $this->input->post('nama_stok');
        $stok = $this->m_stok->getByName($nama_stok);
        $jumlah_stok = intVal($stok->jumlah_stok);
        $jumlah = $this->input->post('amount');
        $totalPcs = $jumlah_stok + intVal($jumlah);
        if($this->input->post('status') == 'Disetujui'){
            $dataStok = [
                'id' => $stok->id,
                'nama_stok' => $nama_stok,
                'jumlah_stok' => $totalPcs,
                'unit_price'  => $stok->unit_price
            ];
            $updateStok = $this->m_stok->updateByName($dataStok, $nama_stok);
        }
        $data = [
            'id'            => $this->input->post('id'),
            'id_supplier'   => $this->input->post('id_supplier'),
            'amount'        => $this->input->post('amount'),
            'total_price'   => $this->input->post('total_price'),
            'purchase_date' => $this->input->post('purchase_date'),
            'expired_date'  => $this->input->post('expired_date'),
            'status'        => $this->input->post('status')
        ];
        // var_dump($data); die;
        if($this->m_persediaan->update($data, $id)){
            $this->session->set_flashdata('alert_message', show_alert('<b class="text-success"><i class="fa fa-check-circle"></i></b> Data Berhasil Diubah','success'));
        }else{
            $this->session->set_flashdata('alert_message', show_alert('<i class="fa fa-close"></i> Data Gagal Diubah','danger'));
        }
        redirect('transaksi/persediaan');
    }
}