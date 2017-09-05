<div class="container">
  <div class="row">
      <div class="col-md-12">
        <div class="">
          <?php echo anchor('web/tambah', 'Tambah', array('class'=>'btn btn-primary')) ;?>
        </div>
        <h3><?php echo $title;?></h3>
        <hr>
        <table class="table table-bordered">
          <tr>
            <th width="5%">No</th>
            <th>Nama</th>
            <th>No Handphone</th>
            <th>E - Mail</th>
            <th width="20%">Aksi</th>
          </tr>

          <?php
          $n = 1;
          foreach ($kontak as $row) { ?>

          <tr>
            <td><?php echo $n++;?></td>
            <td><?php echo $row->nama;?></td>
            <td><?php echo $row->no_hp;?></td>
            <td><?php echo $row->email;?></td>
            <td>
              <?php echo anchor('web/edit/'.$row->id_kontak, 'Edit', array('class'=>'btn btn-success')) ;?>
              <?php echo anchor('web/proses_delete/'.$row->id_kontak, 'Hapus', array('class'=>'btn btn-danger', 'onclick'=>'return hapus()')) ;?>
            </td>
          </tr>
          <?php } ?>
        </table>
      </div>
  </div>
</div>
