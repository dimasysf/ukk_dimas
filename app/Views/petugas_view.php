<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
Data Petugas
<?= $this->endSection() ?>
<?= $this->Section('content') ?>
<div class="row">
    <div class="col">
        <div class="card-border-primary">
            <div class="card-header bg-primary">
                <a href="" data-toggle="modal" data-target="#fpetugas" data-petugas="" class="btn btn-outline-light">Petugas Baru</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped" id="petugas">
                    <tr>
                        <th>NO</th>
                        <th>Nama Petugas</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>telp</th>
                        <th>status</th>
                        <th>Opsi</th>
                    </tr>
                    <?php
                        $no=0;
                        foreach($petugas as $row){
                            $no++;  
                            $data = $row['nama_petugas'].",".$row['username'].",".$row['password'].",".$row['telp'].",".$row['status'].",".base_url('petugas/edit/'.$row['id_petugas']);
                            ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$row['nama_petugas']?></td>
                                <td><?=$row['username']?></td>
                                <td><?=$row['password']?></td>
                                <td><?=$row['telp']?></td>
                                <td><?=$row['status']?></td>
                                <td>
                                    <a href="" data-petugas="<?=$data?>" data-target="#fpetugas" data-toggle="modal" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                    <a href="<?=base_url('petugas/delete/'.$row['id_petugas'])?>" onclick="return confrim('Yakin dik')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
            <?php if (!empty(session()->getFlashdata("message"))) : ?>
                <div class="alert alert-success">
                    <?= session()->getFlashdata("message") ?>
                </div>
            <?php endif ?>
        </div>
    </div>
</div>

<div class="modal fade" id="fpetugas" tabindex="-1" aria-labelledby="modalPetugasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input data Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="frmpetugas" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_petugas">Nama Petugas</label>
                        <input type="text" name="nama_petugas" class="form-control" id="nama_petugas">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" class="form-control" id="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="telp">No Hp</label>
                        <input type="number" name="telp" class="form-control" id="telp">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="">Pilih Status</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                        </select>
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
<?=$this->endSection()?>

<?=$this->section("script")?>
<script>
    $(document).ready(function(){
        $("#fpetugas").on('show.bs.modal',function(event){
            var button = $(event.relatedTarget);
            var data = button.data('petugas');
            if(data != ""){
                const barisdata = data.split(",");
                $('#nama_petugas').val(barisdata[0]);
                $('#username').val(barisdata[1]);
                $('#password').val(barisdata[2]);
                $('#telp').val(barisdata[3]);
                $('#status').val(barisdata[4]);
                $('#frmpetugas').attr('action',barisdata[5]);
            }else{
                $('#nama_petugas').val('');
                $('#username').val('');
                $('#password').val('');
                $('#telp').val('');
                $('#status').val('');
                $('#frmpetugas').attr('action','/spetugas');
            }
        });
    });
</script>
<?=$this->endSection()?>