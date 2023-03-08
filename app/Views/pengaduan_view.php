<?=$this->extend('layouts/admin')?>
<?=$this->section('title')?>
Data pengaduan
<?=$this->endSection()?>
<?=$this->section('content')?>
<div class="col">
  <div class="card">
    <div class="card-header">
      <?php
        if(session()->get('level')=='masyarakat'){
        ?>
          <a href="#" data-toggle="modal" data-target="#modalPengaduan" class="btn btn-primary">Tambah pengaduan</a>
        <?php }?>
    </div>
    <div class="card-body">
      <table class="table table-striped table-bordered">
        <tr>
          <th>NO</th>
          <th>Tanggal Pengaduan</th>
          <th>NIK</th>
          <th>Isi Laporan</th>
          <th>Foto</th>
          <th>Opsi</th>
        </tr>
        <?php
          $no=0;
          foreach($pengaduan as $row){
            $data = $row['tgl_pengaduan'].",".$row['nik'].",".$row['isi_laporan'].$row['foto'].",".$row['status'].",".base_url('pengaduan/'.$row['id_pengaduan']);
            $no++;
            ?>
            <tr>
              <td><?=$no?></td>
              <td><?=$row['tgl_pengaduan']?></td>
              <td><?=$row['nik']?></td>
              <td><?=$row['isi_laporan']?></td>
              <td><?=$row['foto']?></td>
              <td><?=$row['status']?></td>
            </tr>
            <?php
          }
        ?>
      </table>
    </div>
    <div class="modal fade" id="modalPengaduan" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5>Tambah Petugas</h5>
          </div>
          <form action="/tambahpengaduan" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Isi Laporan</label>
              <textarea class="form-control" name="isi_laporan" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
              <label for="foto">Foto</label>
              <input type="file" name="foto" id="foto" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><Simpan class="fas fa-save"></Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <div class="modal fade" id="modalTanggapan" aria-hidden="true">
      <div class="modal-content">
        <div class="modal-header">
          <form action="/tanggapi" method="post">
            <input type="hidden" name="id_pengaduan" id="id_pengaduan">
            <div class="modal-body">
              <div class="form-group">
                <label for="">Tanggapan</label>
                <textarea name="tanggapan" id="" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<?=$this->endSection()?>
<?=$this->section('script')?>
<script>
  $(document).ready(function(){
    $('#modalTanggapan').on('show.bs.modal',function(e){
      var button = $(e.relatedTarget);
      var data = button.data('pengaduan');
      var aduan = button.data('aduan');
      $('#id_pengaduan').val(data);
      if (aduan=="selesai")
      {
        var query="id_pengaduan="+data;
        // alert(query);
        $('#btstanggapan').hide();
        $.ajax({
          url:"/getTanggapan",
          type:"GET",
          dataType:"json",
          success:function(data)
          {
            // alert(data)
            $('#tanggapans').val(data[0].tanggapan);
          },
          error:function(error)
          {
            console.log(error);
          }
        });
        $('#tanggapans').val();
      }
      else
      {
        $('#btstanggapan').show();
        $('#tanggapans').val("");
      }
    });
  });
</script>
<?=$this->endSection()?>