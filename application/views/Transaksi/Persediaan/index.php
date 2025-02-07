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
                    <h1 class="h3 mb-2 text-gray-800">Data Persediaan</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="float-left">
                                <a type="button" href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#exampleModal">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Tambah Persediaan</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No </th>
                                            <th>Nama Supplier </th>
                                            <th>Nama Bahan </th>
                                            <th>Jumlah </th>
                                            <th>Total Harga </th>
                                            <th>Tanggal Pembelian </th>
                                            <th>Tanggal Kadaluarsa </th>
                                            <th>Status </th>
                                            <th class="text-center"><i class="fas fa-cogs"></i> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($persediaans as $perse){?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $perse['supplier_name'] ?></td>
                                            <td><?= $perse['nama_stok'] ?></td>
                                            <td class="text-center"><?= $perse['amount'] ?> Pcs</td>
                                            <td class="text-right" style="width:11%"><?= format_rp($perse['total_price']) ?></td>
                                            <td><?= date("d-m-Y", strtotime($perse['purchase_date'])) ?></td>
                                            <td><?= date("d-m-Y", strtotime($perse['expired_date'])) ?></td>
                                            <td style="width:11%">
                                                <?php if($perse['status'] == 'Disetujui'){ ?>
                                                <span class="badge badge-success" style="height: 20px width: 20px">
                                                    <?= $perse['status'] ?>
                                                </span>
                                                <?php }elseif($perse['status'] == 'Belum Disetujui'){ ?>
                                                <span class="badge badge-warning" style="height: 20px width: 20px">
                                                    <?= $perse['status'] ?>
                                                </span>
                                                <?php }else{ ?>
                                                <span class="badge badge-danger" style="height: 20px width: 20px">
                                                    <?= $perse['status'] ?>
                                                </span>
                                                <?php } ?>
                                            </td>
                                            <td style="width:11%" class="text-center">
                                                <?php if($role == 'superadmin' && $perse['status'] != 'Disetujui' && $perse['status'] != 'Tidak Disetujui'){ ?>
                                                <button href="javascript:void(0)" data-toggle="tooltip" title="Ubah" class="btn btn-warning"
                                                onclick="
                                                        edit(
                                                            '<?php echo $perse['id'] ?>',
                                                            '<?php echo $perse['id_supplier'] ?>',
                                                            '<?php echo $perse['supplier_name'] ?>',
                                                            '<?php echo $perse['nama_stok'] ?>',
                                                            '<?php echo $perse['amount'] ?>',
                                                            '<?php echo $perse['total_price'] ?>',
                                                            '<?php echo $perse['purchase_date'] ?>',
                                                            '<?php echo $perse['expired_date'] ?>',
                                                            '<?php echo $perse['status'] ?>',
                                                            )">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <?php } ?>
                                                <?php if($perse['status'] != 'Disetujui'){ ?>
                                                <a onclick="return confirm('Hapus data ini ?')" href="<?php echo base_url("transaksi/persediaan/delete/".$perse['id']) ?>" data-toggle="tooltip" title="Hapus" class="btn btn-danger">
                                                  <i class="fa fa-trash"></i>
                                                </a>             
                                                <?php } ?>
                                            </td>
                                        </tr>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Persediaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('transaksi/persediaan/add'); ?>" method="POST">
                    <div class="form-group">
                        <label>Nama Supplier </label>
                        <select required class="form-control" name="id_supplier" id="jenis_pembayaran">
                        <?php foreach ($suppliers as $supplier) { ?>
                            <option value="<?= $supplier['id'] ?>"><?= $supplier['supplier_name'] ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Bahan </label>
                        <select name="id_stok" class="form-control" placeholder="Nama Bahan" required>
                            <?php foreach($stok as $row){ ?>
                                <option value="<?= $row['id'] ?>"><?= $row['nama_stok'] ?></option>
                            <?php } ?>
                        </select>
                    </div>  
                    <div class="form-group">
                        <label>Jumlah </label>
                        <input type="number" name="amount" class="form-control" placeholder="Jumlah" required min=1>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kadaluarsa </label>
                        <?= $inputTgl ?>
                        <!-- <input type="date" name="expired_date" class="form-control" placeholder="Tanggal Kadaluarsa" required min="<?php $checkData ?>"> -->
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
                <h5 class="modal-title" id="exampleModalLabel">Ubah Data Persediaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('transaksi/persediaan/update'); ?>" method="POST">
                    <div class="form-group">
                        <label>Nama Supplier </label>
                        <input type="hidden" name="id" id="e_id" class="form-control" placeholder="Nama Karyawan" required readonly>
                        <input type="hidden" name="id_supplier" id="e_id_supplier" class="form-control" placeholder="Nama Karyawan" required readonly>
                        <input type="text" name="" id="e_supplier_name" class="form-control" placeholder="Nama Karyawan" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Bahan </label>
                        <input type="text" name="nama_stok" id="nama_stok" class="form-control" value="karyawan" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Jumlah </label>
                        <input type="number" name="amount" id="e_amount" class="form-control" placeholder="Password" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Total Harga </label>
                        <input type="number" name="total_price" id="e_total_price" class="form-control" placeholder="Password" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pembelian </label>
                        <input type="date" name="purchase_date" id="e_purchase_date" class="form-control" placeholder="Password" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kadaluarsa </label>
                        <input type="date" name="expired_date" id="e_expired_date" class="form-control" placeholder="Password" required readonly>
                    </div>
                    <div class="form-group">
                        <label>Status </label>
                        <select class="form-control" name="status" id="e_status">
                            <option value="Disetujui">Setujui</option>
                            <option value="Tidak Disetujui">Tidak Disetujui</option>
                        </select>
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
function edit(id, id_supplier, supplier_name, nama_stok, amount, total_price, purchase_date, expired_date, status){
  $('#e_id').val(id);
  $('#e_id_supplier').val(id_supplier);
  $('#e_supplier_name').val(supplier_name);
  $('#nama_stok').val(nama_stok);
  $('#e_amount').val(amount);
  $('#e_total_price').val(total_price);
  $('#e_purchase_date').val(purchase_date);
  $('#e_expired_date').val(expired_date);
  $('#e_status').append(status);

  $('#editModal').modal('show'); 
}
</script>

</html>