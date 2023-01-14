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
                            <h3 class="card-title">Data Iuran</h3>
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
                                                <th>Keterangan</th>
                                                <th>Tanggal</th>
                                                <th>Bulan</th>
                                                <th>Tahun</th>
                                                <th>Jumlah</th>
                                                <th>Nama Warga</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($iuran = $query_iuran->fetch_object()) {
                                            ?>
                                                <tr>
                                                    <td style="width: 10px"><?= $i ?></td>
                                                    <td><?= $iuran->keterangan ?></td>
                                                    <td><?= $iuran->tanggal ?></td>
                                                    <td><?= $iuran->bulan ?></td>
                                                    <td><?= $iuran->tahun ?></td>
                                                    <td><?= $iuran->jumlah ?></td>
                                                    <td><?= $iuran->user_nama ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary btn-view" data-id="<?= $iuran->id; ?>" data-keterangan="<?= $iuran->keterangan; ?>" data-tanggal="<?= $iuran->tanggal; ?>" data-bulan="<?= $iuran->bulan; ?>" data-tahun="<?= $iuran->tahun; ?>" data-jumlah="<?= $iuran->jumlah; ?>" data-warga_id="<?= $iuran->warga_id; ?>" data-user_nama="<?= $iuran->nama; ?>"><i class="fa fa-eye"></i></a>
                                                        <a href="#" class="btn btn-info btn-edit" data-id="<?= $iuran->id; ?>" data-keterangan="<?= $iuran->keterangan; ?>" data-tanggal="<?= $iuran->tanggal; ?>" data-bulan="<?= $iuran->bulan; ?>" data-tahun="<?= $iuran->tahun; ?>" data-jumlah="<?= $iuran->jummlah; ?>" data-warga_id="<?= $iuran->warga_id; ?>" data-user_nama="<?= $iuran->nama; ?>"><i class="fa fa-marker"></i></a>
                                                        <a href="#" class="btn btn-danger btn-delete" data-id="<?= $iuran->id; ?>"><i class="fa fa-trash"></i></a>
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
                            <a href="../laporan/iuran/semua_warga.php" class="btn btn-info">Cetak Data Semua Warga</a>
                            <a href="../laporan/iuran/warga_sudah_iuran.php" class="btn btn-primary">Cetak Data Warga Sudah Iuran</a>
                            <a href="../laporan/iuran/warga_belum_iuran.php" class="btn btn-success">Cetak Data Warga Belum Iuran</a>
                            <a href="../laporan/iuran/jumlah_kas.php" class="btn btn-secondary">Cetak Data Jumlah Kas</a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Iuran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Warga</label>
                            <select name="warga_id" id="warga_id" class="form-control" required>
                            <option value="">-- Pilih Warga --</option>
                            <?php
                            $sql_warga = "SELECT * from warga";
                            $query_warga = mysqli_query($conn, $sql_warga);
                            while ($warga = $query_warga->fetch_object()) {
                            ?>
                            <option value="<?= $warga->id; ?>"><?= $warga->nik; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Iuran</label>
                            <select name="iuran" id="iuran" class="form-control" required>
                            <option value="">-- Pilih Iuran --</option>
                            <option value="1">Kas</option>
                            <option value="2">Sampah</option>
                            <option value="3">Sumbangan</option>
                        </select>
                    <?php
                        if ($_SESSION['role'] == 'admin') {
                    ?>
                       <div class="form-group">
                        <label>User</label>
                            <select name="warga_id" id="warga_id" class="form-control" required>
                            <option value="">-- Pilih User --</option>
                            <?php
                            $sql_user = "SELECT * from users";
                            $query_user = mysqli_query($conn, $sql_user);                            
                            while ($user = $query_user->fetch_object()) {
                            ?>
                            <option value="<?= $user->id; ?>"><?= $user->nama; ?></option>
                            <?php } ?>
                        </select>
                        </div>
                    <?php
                        }
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="save" class="btn btn-primary">Simpan</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Edit Iuran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Warga</label>
                            <select name="warga_id" id="warga_id" class="form-control warga_id" required>
                            <option value="">-- Pilih Warga --</option>
                            <?php
                            $sql_warga = "SELECT * from warga";
                            $query_warga = mysqli_query($conn, $sql_warga);
                            while ($warga = $query_warga->fetch_object()) {
                            ?>
                            <option value="<?= $warga->id; ?>"><?= $warga->nik; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Iuran</label>
                            <select name="iuran" id="iuran" class="form-control iuran" required>
                            <option value="">-- Pilih Iuran --</option>
                            <option value="1">Kas</option>
                            <option value="2">Sampah</option>
                            <option value="3">Sumbangan</option>
                        </select>
                    </div>
                    <?php
                       if ($_SESSION['role'] == 'admin') {
                    ?>
                    <div class="form-group">
                        <label>User</label>
                            <select name="warga_id" id="warga_id" class="form-control warga_id" required>
                            <option value="">-- Pilih User --</option>
                            <?php
                            $sql_user = "SELECT * from users";
                            $query_user = mysqli_query($conn, $sql_user);                            
                            while ($user = $query_user->fetch_object()) {
                            ?>
                            <option value="<?= $user->id; ?>"><?= $user->nama; ?></option>
                            <?php } ?>
                        </select>
                     </div>
                    <?php
                        }
                    ?>
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
                    <h5 class="modal-title" id="exampleModalLabel">Lihat Iuran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" class="form-control tanggal" name="tanggal" placeholder="Keterangan" disabled>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="text" class="form-control tanggal" name="tanggal" placeholder="Tanggal Lokasi" disabled>
                    </div>
                    <div class="form-group">
                        <label>Bulan</label>
                        <input type="text" class="form-control bulan" name="bulan" placeholder="Bulan" disabled>
                    </div>
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="text" class="form-control tahun" name="tahun" placeholder="Tahun" disabled>
                    </div>
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="text" class="form-control jumlah" name="jumlah" placeholder="Jumlah" disabled>
                    </div>
                    <div class="form-group">
                        <label>ID Warga</label>
                        <input type="text" class="form-control warga_id" name="warga_id" placeholder="ID Warga" disabled>
                    </div>
                
                    <?php
                        if ($_SESSION['role'] == 'admin') {
                    ?>
                        <div class="form-group">
                            <label>User</label>
                            <input type="text" class="form-control user_nama" name="user_nama" placeholder="User Nama" disabled>
                        </div>
                    <?php
                        }
                    ?>
                   
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
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Iuran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Apa anda yakin ingin menghapus data iuran?</h5>
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
            const keterangan = $(this).data('keterangan');
            const tanggal = $(this).data('tanggal');
            const bulan = $(this).data('bulan');
            const tahun = $(this).data('tahun');
            const jumlah = $(this).data('jumlah');
            const warga_id = $(this).data('warga_id');
            $('.id').val(id);
            $('.keterangan').val(keterangan);
            $('.tanggal').val(tanggal);
            $('.bulan').val(bulan);
            $('.tahun').val(tahun);
            $('.jumlah').val(jumlah);
            $('.warga_id').val(warga_id);
            $('#editModal').modal('show');
        });

        $('.btn-view').on('click', function() {
            const id = $(this).data('id');
            const keterangan = $(this).data('keterangan');
            const tanggal = $(this).data('tanggal');
            const bulan = $(this).data('bulan');
            const tahun = $(this).data('tahun');
            const jumlah = $(this).data('jumlah');
            const warga_id = $(this).data('warga_id');
            $('.id').val(id);
            $('.keterangan').val(keterangan);
            $('.tanggal').val(tanggal);
            $('.iuran').val(iuran == 1 ? "Kas" : (iuran== 2 ? "Sampah" : (iuran== 3 ?"Rusak")));
            $('.user_nama').val(user_nama);
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