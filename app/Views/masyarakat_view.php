<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
Data Masyarakat
<?= $this->endSection() ?>
<?= $this->Section('content') ?>

<div class="row">
    <div class="col">
        <div class="card-border-primary">
            <!-- <div class="card-header bg-primary">
                <a href="" data-toggle="modal" data-target="#fmasyarakat" data-masyarakat=""
                    class="btn btn-outline-light">Masyarakat baru</a>
            </div> -->
            <div class="card-body">
                <table class="table table-bordered table-striped" id="masyarakat">
                    <tr>
                        <th>NO</th>
                        <th>Nik</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>No hp</th>
                        <th>Opsi</th>
                    </tr>
                    <?php
                    $no = 0;
                    foreach ($masyarakat as $row) {
                        $no++;
                        $data = $row['nik'] . "," . $row['nama'] . "," . $row['username'] . "," . $row['password'] . "," . $row['telp'] . "," . base_url('masyarakat/edit/' . $row['id_masyarakat']);
                        ?>
                        <tr>
                            <td>
                                <?= $no ?>
                            </td>
                            <td>
                                <?= $row['nik'] ?>
                            </td>
                            <td>
                                <?= $row['nama'] ?>
                            </td>
                            <td>
                                <?= $row['username'] ?>
                            </td>
                            <td>
                                <?= $row['password'] ?>
                            </td>
                            <td>
                                <?= $row['telp'] ?>
                            </td>
                            <td>
                                <a href="" data-masyarakat="<?= $data ?>" data-target="#fmasyarakat" data-toggle="modal"
                                    class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('masyarakat/delete/' . $row['id_masyarakat']) ?>"
                                    onclick="return confrim('Yakin dik')" class="btn btn-danger"><i
                                        class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <?php if (!empty(session()->getFlashdata("message"))): ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata("message") ?>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>

<div class="modal fade" id="fmasyarakat" tabindex="-1" aria-labelledby="modalMasyarakatLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input data Masyarakat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="frmmasyarakat" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="number" name="nik" class="form-control" id="nik">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="uername" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="telp">No Hp</label>
                        <input type="number" name="telp" class="form-control" id="telp">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i>Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section("script") ?>
<script>
    $(document).ready(function () {
        $("#fmasyarakat").on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var data = button.data('masyarakat');
            if (data != "") {
                const barisdata = data.split(",");
                $('#nik').val(barisdata[0]);
                $('#nama').val(barisdata[1]);
                $('#username').val(barisdata[2]);
                $('#password').val(barisdata[3]);
                $('#telp').val(barisdata[4]);
                $('#frmmasyarakat').attr('action', barisdata[5]);
            } else {
                $('#nik').val('');
                $('#nama').val('');
                $('#username').val('');
                $('#password').val('');
                $('#telp').val('');
                $('#frmmasyarakat').attr('action', '/smasyarakat');
            }
        });
    });
</script>
<?= $this->endSection() ?>