<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid"></div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Warga</h3>
                        </div>
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Tambah</button>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="card-body p-0">
                                    <table class="table table-bordered" id="datatables">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat</th>
                                                <th>No Rumah</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($warga = $query_warga->fetch_object()) {
                                            ?>
                                                <tr>
                                                    <td style="width: 10px"><?= $i ?></td>
                                                    <td><?= $warga->nik ?></td>
                                                    <td><?= $warga->nama ?></td>
                                                    <td><?= $warga->kelamin ?></td>
                                                    <td><?= $warga->alamat ?></td>
                                                    <td><?= $warga->no_rumah ?></td>
                                                    <td><?= $warga->status ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-view" data-id="<?= $warga->id; ?>" data-nik="<?= $warga->nik; ?>" data-nama="<?= $warga->nama; ?>" data-kelamin="<?= $warga->kelamin; ?>" data-alamat="<?= $warga->alamat; ?>" data-no_rumah="<?= $warga->no_rumah ?>" data-status="<?= $warga->status; ?>"><i class="fa fa-eye"></i></a>
                                                        <a href="#" class="btn btn-info btn-edit" data-id="<?= $warga->id; ?>" data-nik="<?= $warga->nik; ?>" data-nama="<?= $warga->nama; ?>" data-kelamin="<?= $warga->kelamin; ?>" data-alamat="<?= $warga->alamat; ?>" data-no_rumah="<?= $warga->no_rumah ?>" data-status="<?= $warga->status; ?>"><i class="fa fa-marker"></i></a>
                                                        <a href="#" class="btn btn-danger btn-delete" data-id="<?= $warga->id; ?>"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                                $i++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($_SESSION['role'] == 'admin') {
                        ?>
                         <div class="card-footer">
                            <a href="../laporan/warga.php" class="btn btn-primary">Cetak Data Warga</a>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Add Product-->
<form action="" method="post">
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Warga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" name="nik" placeholder="NIK" required>
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" name="kelamin" placeholder="Jenis Kelamin" required>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                    </div>

                    <div class="form-group">
                        <label>No Rumah</label>
                        <input type="text" class="form-control" name="no_rumah" placeholder="No Rumah" required>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control" name="status" placeholder="Status" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="save"  class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Add Product-->

<!-- Modal Edit Product-->
<form action="" method="post">
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Warga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control nik" name="nik" placeholder="NIK">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control nama" name="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control kelamin" name="kelamin" placeholder="Jenis Kelamin">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control alamat" name="alamat" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label>No Rumah</label>
                        <input type="text" class="form-control no_rumah" name="no_rumah" placeholder="No Rumah">
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control status" name="status" placeholder="Status">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="update" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal Edit Product-->
<form>
    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lihat Warga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control nik" name="nik" placeholder="NIK" disabled>
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control nama" name="nama" placeholder="Nama" disabled>
                    </div>

                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control kelamin" name="kelamin" placeholder="Jenis Kelamin" disabled>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control alamat" name="alamat" placeholder="Alamat" disabled>
                    </div>

                    <div class="form-group">
                        <label>No Rumah</label>
                        <input type="text" class="form-control no_rumah" name="no_rumah" placeholder="No Rumah" disabled>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <input type="text" class="form-control status" name="status" placeholder="Status" disabled>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Edit Product-->

<!-- Modal Delete Product-->
<form action="" method="post">
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Warga</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Apa anda yakin ingin menghapus data warga?</h5>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" class="id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" name="delete" class="btn btn-primary">Ya</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- End Modal Delete Product-->

<script src="../templates/plugins/jquery/jquery.min.js"></script>
<script src="../templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('.btn-edit').on('click', function() {
            const id = $(this).data('id');
            const nik = $(this).data('nik');
            const nama = $(this).data('nama');
            const kelamin = $(this).data('kelamin');
            const alamat = $(this).data('alamat');
            const no_rumah = $(this).data('no_rumah');
            const status = $(this).data('status');
            $('.id').val(id);
            $('.nik').val(nik);
            $('.nama').val(nama);
            $('.kelamin').val(kelamin);
            $('.alamat').val(alamat);
            $('.no_rumah').val(no_rumah);
            $('.status').val(status);
            $('#editModal').modal('show');
        });

        $('.btn-view').on('click', function() {
            const id = $(this).data('id');
            const nik = $(this).data('nik');
            const nama = $(this).data('nama');
            const kelamin = $(this).data('kelamin');
            const alamat = $(this).data('alamat');
            const no_rumah = $(this).data('no_rumah');
            const status = $(this).data('status');
            $('.id').val(id);
            $('.nik').val(nik);
            $('.nama').val(nama);
            $('.kelamin').val(kelamin);
            $('.alamat').val(alamat);
            $('.no_rumah').val(no_rumah);
            $('.status').val(status);
            $('#viewModal').modal('show');
        });

        $('.btn-delete').on('click', function() {
            const id = $(this).data('id');
            $('.id').val(id);
            $('#deleteModal').modal('show');
        });
        $('#datatables').DataTable();

    });
</script>