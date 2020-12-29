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
                    <h1 class="h3 mb-2 text-gray-800">Master Data Stok</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="float-left">
                                <a type="button" href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#exampleModal">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Tambah Stok</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No </th>
                                            <th>Nama Stok </th>
                                            <th>Jumlah Stok </th>
                                            <th>Harga Per Unit </th>
                                            <th class="text-center"><i class="fas fa-cogs"></i> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($stok as $stok){?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $stok['nama_stok'] ?></td>
                                            <td class="text-right"><?= $stok['jumlah_stok'] ?></td>
                                            <td class="text-right"><?= format_rp($stok['unit_price']) ?></td>
                                            <td class="text-center">
                                                <button href="javascript:void(0)" data-toggle="tooltip" title="Ubah" class="btn btn-warning"
                                                onclick="
                                                        edit(
                                                            '<?php echo $stok['id'] ?>',
                                                            '<?php echo $stok['nama_stok'] ?>',
                                                            '<?php echo $stok['jumlah_stok'] ?>',
                                                            '<?php echo $stok['unit_price'] ?>',
                                                            )">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <a onclick="return confirm('Hapus data ini ?')" href="<?php echo base_url("admin/gudang/delete/".$stok['id']) ?>" data-toggle="tooltip" title="Hapus" class="btn btn-danger">
                                                  <i class="fa fa-trash"></i>
                                                </a>             
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Stok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/gudang/add'); ?>" method="POST">
                    <div class="form-group">
                        <label>Nama Stok </label>
                        <input type="text" name="nama_stok" class="form-control" placeholder="Nama Stok" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Stok </label>
                        <input type="number" name="jumlah_stok" class="form-control" value="0" readonly>
                    </div>
                    <div class="form-group">
                        <label>Harga Per Unit </label>
                        <input type="number" name="unit_price" class="form-control" placeholder="Harga Per Unit" required>
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
                <h5 class="modal-title" id="exampleModalLabel">Ubah Stok</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('admin/gudang/edit'); ?>" method="POST">
                    <div class="form-group">
                        <label>Nama Stok </label>
                        <input type="hidden" name="id" id="e_id" class="form-control" placeholder="Nama Karyawan" required>
                        <input type="text" name="nama_stok" id="e_nama_stok" class="form-control" placeholder="Nama Stok" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Stok </label>
                        <input type="text" name="jumlah_stok" id="e_jumlah_stok" class="form-control" value="0" readonly required>
                    </div>
                    <div class="form-group">
                        <label>Harga Per Unit </label>
                        <input type="text" name="unit_price" id="e_unit_price" class="form-control" placeholder="Harga Per Unit" required>
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
function edit(id, nama_stok, jumlah_stok, unit_price){
  $('#e_id').val(id);
  $('#e_nama_stok').val(nama_stok);
  $('#e_jumlah_stok').val(jumlah_stok);
  $('#e_unit_price').val(unit_price);

  $('#editModal').modal('show'); 
}
</script>

</html>