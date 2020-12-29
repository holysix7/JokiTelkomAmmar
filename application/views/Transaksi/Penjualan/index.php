<!DOCTYPE html>
<html lang="en">

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php $this->load->view('Template/Sidebar') ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php $this->load->view('Template/alertMessage') ?>
                <!-- Topbar -->
                <?php $this->load->view('Template/Topbar') ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Data Penjualan</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="float-left">
                                <a type="button" href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#exampleModal">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Tambah Penjualan</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No </th>
                                            <th>Nama Pelanggan </th>
                                            <th>Nomor Meja </th>
                                            <th>Nama Menu </th>
                                            <th>Level Pedas </th>
                                            <th>Jenis Kuah </th>
                                            <th>Jumlah </th>
                                            <th>Total Harga </th>
                                            <th>Tanggal Penjualan </th>
                                            <th>Status Meja </th>
                                            <th class="text-center"><i class="fas fa-cogs"></i> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                            foreach ($penjualan as $row){
                                            if($row['status_penjualan'] == 'Show'){
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['customer_name'] ?></td>
                                            <td><?= $row['table_number'] ?></td>
                                            <td><?= $row['nama_menu'] ?></td>
                                            <td><?= $row['lvl_pedas'] ?></td>
                                            <td><?= $row['nama_kuah'] ?></td>
                                            <td class="text-center"><?= $row['jumlah'] ?> Pcs</td>
                                            <td class="text-right" style="width:11%"><?= format_rp($row['total_harga']) ?></td>
                                            <td style="width:16%"><?= date("d-M-Y h:i:s", strtotime($row['tanggal_penjualan'])) ?></td>
                                            <td class="text-center">
                                            <?php if($row['table_status'] == 'Sedang Diisi'){ ?>
                                                <span class="badge badge-primary" style="height: 20px width: 20px">
                                                    <?= $row['table_status'] ?>
                                                </span>
                                            <?php }else{ ?>
                                                <span class="badge badge-warning" style="height: 20px width: 20px">
                                                    <?= $row['table_status'] ?>
                                                </span>
                                            <?php } ?>
                                            </td>
                                            <td style="width:11%" class="text-center">
                                                <button href="javascript:void(0)" data-toggle="tooltip" title="Ubah" class="btn btn-warning"
                                                onclick="
                                                        edit(
                                                            '<?php echo $row['id_penjualan'] ?>',
                                                            '<?php echo $row['id_meja'] ?>',
                                                            '<?php echo $row['customer_name'] ?>',
                                                            '<?php echo $row['nama_menu'] ?>',
                                                            '<?php echo $row['lvl_pedas'] ?>',
                                                            '<?php echo $row['table_number'] ?>',
                                                            '<?php echo $row['jumlah'] ?>',
                                                            '<?php echo $row['total_harga'] ?>',
                                                            '<?php echo date('d-M-Y h:i:s', strtotime($row['tanggal_penjualan'])) ?>',
                                                            )">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <!-- <a onclick="return confirm('Hapus data ini ?')" href="<?php echo base_url("transaksi/penjualan/delete/".$row['id']) ?>" data-toggle="tooltip" title="Hapus" class="btn btn-danger">
                                                  <i class="fa fa-trash"></i>
                                                </a>              -->
                                            </td>
                                        </tr>
                                            <?php } ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <!-- Button trigger modal -->
<!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('transaksi/penjualan/add'); ?>" method="POST">
                    <div class="form-group">
                        <label>Nama Pelanggan </label>
                        <select required class="form-control" name="id_pelanggan">
                        <?php foreach ($pelanggan as $rowPelanggan) { ?>
                          <?php if(count($rowPelanggan) > 0){ ?>
                            <option value="<?= $rowPelanggan['id'] ?>"><?= $rowPelanggan['customer_name'] ?></option>
                          <?php } ?>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nomor Meja</label>
                        <select name="id_meja" class="form-control" placeholder="Nomor Meja" required>
                            <?php foreach($meja as $rowMeja){ ?>
                                <option value="<?= $rowMeja['id'] ?>"><?= $rowMeja['table_number'] ?> - <?= $rowMeja['table_status'] ?></option>
                            <?php } ?>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label>Nama Menu</label>
                        <select name="id_menu" class="form-control" placeholder="Nama Bahan" required>
                            <?php foreach($menu as $rowMenu){ ?>
                                <option value="<?= $rowMenu['id'] ?>"><?= $rowMenu['nama_menu'] ?></option>
                            <?php } ?>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label>Level Pedas</label>
                        <select name="id_pedas" class="form-control" placeholder="Nama Bahan">
                                <option value="">-- Pilih --</option>
                            <?php $i = 1; foreach($lvPedas as $rowPedas){ ?>
                                <option value="<?= $rowPedas['id'] ?>"><?= $rowPedas['lvl_pedas'] ?> - <?= $i++ ?></option>
                            <?php } ?>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label>Jenis Kuah</label>
                        <select name="id_kuah" class="form-control" placeholder="Nama Bahan">
                                <option value="">-- Pilih --</option>
                            <?php $i = 1; foreach($kuah as $rowKuah){ ?>
                                <option value="<?= $rowKuah['id'] ?>"><?= $rowKuah['nama_kuah'] ?></option>
                            <?php } ?>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label>Jumlah </label>
                        <input type="number" name="jumlah" class="form-control" placeholder="Jumlah" required min=1>
                        <input type="hidden" name="tanggal_penjualan" class="form-control" value="<?= $date ?>">
                        <input type="hidden" name="status_penjualan" class="form-control" value="Show">
                    </div>
                <hr>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Penjualan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('transaksi/penjualan/update'); ?>" method="POST">
                    <div class="form-group">
                        <label>Nama Pelanggan </label>
                        <input type="hidden" name="id_penjualan" id="e_id" class="form-control" placeholder="Nama Karyawan" required readonly>
                        <input type="hidden" name="id_meja" id="e_id_meja" class="form-control" placeholder="Nama Karyawan" required readonly>
                        <input type="hidden" name="status_penjualan" id="e_status_penjualan" class="form-control" value="Hidden" required readonly>
                        <input type="text" name="" id="e_customer_name" class="form-control" placeholder="Nama Pelanggan" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Menu </label>
                        <input type="text" name="" id="e_nama_menu" class="form-control" value="karyawan" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Level Pedas </label>
                        <input type="text" name="" id="e_lvl_pedas" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Nomor Meja </label>
                        <input type="number" name="" id="e_table_number" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Jumlah </label>
                        <input type="number" name="" id="e_jumlah" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Total Harga </label>
                        <input type="number" name="" id="e_total_harga" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Penjualan </label>
                        <input type="text" name="" id="e_tanggal_penjualan" class="form-control" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Status Meja </label>
                        <input type="text" name="table_status" id="e_table_status" value="Tidak Diisi" class="form-control" required readonly>
                    </div>
                <hr>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">
function edit(id_penjualan, id_meja, customer_name, nama_menu, lvl_pedas, table_number, jumlah, total_harga, tanggal_penjualan){
  $('#e_id').val(id_penjualan);
  $('#e_id_meja').val(id_meja);
  $('#e_customer_name').val(customer_name);
  $('#e_nama_menu').val(nama_menu);
  $('#e_lvl_pedas').val(lvl_pedas);
  $('#e_table_number').val(table_number);
  $('#e_jumlah').val(jumlah);
  $('#e_total_harga').val(total_harga);
  $('#e_tanggal_penjualan').val(tanggal_penjualan);

  $('#editModal').modal('show'); 
}
</script>

</html>