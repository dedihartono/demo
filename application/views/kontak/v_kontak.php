<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-sm-4">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> Form kontak</h3>
              </div>
              <div class="panel-body">
                  <form action="#">
                      <div class="form-group">
                        <label for="nama">Nama kontak</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="">
                        <input type="hidden" name="id_kontak" id="id_kontak" value="">
                      </div>
                      <div class="form-group">
                        <label for="no_hp">No Handphone</label>
                       <input type="text" class="form-control" name="no_hp" id="no_hp">
                      </div>
                      <div class="form-group">
                        <label for="email">E-mail</label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="example@mail.com">
                    </div>
                      <div class="form-group">
                        <button type="button" name="simpankontak" id="simpankontak" class="btn btn-primary">Simpan</button>
                        <button type="button" name="resetkontak"  id="resetkontak" class="btn btn-warning">Reset</button>                        
                      </div>
                      <div class="form-group">
                        <button type="button" name="updatekontak" id="updatekontak" class="btn btn-info" disabled="true">Update</button>
                      </div>
                  </form>
              </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-8">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list"></span> Daftar kontak</h3>
              </div>
              <div class="panel-body">
                  <table id='table' class="table table-bordered">
                      <th>No</th>
                      <th>Nama kontak</th>
                      <th>No Handphone</th>
                      <th>Email</th>
                      <th>Aksi</th>
                      <tbody id="daftarkontak">
                          <?php
                          $no = 1;
                          foreach ($kontak->result() as $result) {
                              ?>
                              <tr>
                                  <td><?php echo $no;?></td>
                                  <td><?php echo $result->nama;?></td>
                                  <td><?php echo $result->no_hp;?></td>
                                  <td><?php echo $result->email;?></td>
                                  <td>
                                      <button type="button" class="btn btn-sm btn-info" data-idkontak="<?php echo $result->id_kontak;?>" name="editkontak<?php echo $result->id_kontak;?>" id="editkontak"><span class="glyphicon glyphicon-edit"></span></button>
                                      <button type="button" class="btn btn-sm btn-danger" data-idkontak="<?php echo $result->id_kontak;?>" name="deletekontak<?php echo $result->id_kontak;?>" id="deletekontak"><span class="glyphicon glyphicon-trash"></span></button>
                                  </td>
                              </tr>
                              <?php
                              $no++;
                          }
                           ?>
                      </tbody>
                  </table>
              </div>
            </div>
        </div>
    </div>
</div>

<script>

    $(document)
        .on('click', '#simpankontak', simpankontak)
        .on('click', '#resetkontak', resetkontak)
        .on('click', '#updatekontak', updatekontak)
        .on('click', '#editkontak', editkontak)
        .on('click', '#deletekontak', deletekontak);

        function simpankontak() 
        {
            var datakontak = {
                'nama'  : $('#nama').val(),
                'no_hp' : $('#no_hp').val(),
                'email' : $('#email').val(),
            };
            
            $.ajax({
                'url'       : '<?php echo base_url();?>kontak/create',
                'data'      : datakontak,
                'dataType'  : 'JSON',
                'type'      : 'POST',
                
                success : function (data, status) {
                        if (data.status!='error') {
                            
                            window.location.href = '<?php echo base_url();?>';
                            
                            resetkontak();
                        }
                        else {
                            alert(data.msg);
                        }
                    },
                error : function(x,t,m) 
                {
                    alert(x.responseText);
                }
            })
        }

        function resetkontak() 
        {
            $('#nama').val('');
            $('#no_hp').val('');
            $('#email').val('');
            $('#simpankontak').attr('disabled', false);
            $('#updatekontak').attr('disabled', true);    
        }

        function editkontak() {//edit kontak
        
            var id = $(this).data('idkontak');
            var datakontak = {'id_kontak':id};
            console.log(datakontak);
            $('input[name=editkontak'+id+']').attr('disabled',true);//biar ga di klik dua kali, maka di disabled
            
            $.ajax({
                url         : '<?php echo base_url();?>kontak/edit',
                data        : datakontak,
                dataType    : 'JSON',
                type        : 'POST',

                success : function(data,status){
                    if (data.status!='error') {
                        $('input[name=editkontak'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
                        $('#simpankontak').attr('disabled',true);
                        $('#updatekontak').attr('disabled',false);
                        $.each(data.msg, function(k,v){
                            $('#id_kontak').val(v['id_kontak']);
                            $('#nama').val(v['nama']);
                            $('#no_hp').val(v['no_hp']);
                            $('#email').val(v['email']);
                        })
                    }else{
                        alert(data.msg);
                        $('input[name=editkontak'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
                    }
                },
                error : function(x,t,m){
                    alert(x.responseText);
                    $('input[name=editkontak'+id+']').attr('disabled',false);//disabled di set false, karena transaksi berhasil
                }
        })
    }

        function updatekontak() 
        {
            var datakontak = {
                'nama'      : $('#nama').val(),
                'no_hp'     : $('#no_hp').val(),
                'email'     : $('#email').val(),
                'id_kontak' :$('#id_kontak').val()
            };console.log(datakontak);

            $.ajax({
                url         : '<?php echo site_url();?>kontak/update',
                data        : datakontak,
                dataType    : 'JSON',
                type        : 'POST',

                success : function(data,status){
                    if (data.status!='error') {

                        window.location.href = '<?php echo base_url();?>';
                        resetkontak();//form langsung dikosongkan pas selesai input data
                    }
                    else {
                        alert(data.msg);
                    }
                },
                error : function(x,t,m)
                {
                    alert(x.responseText);
                }
            })
        }

    function deletekontak() {//delete kontak
        if (confirm("Anda yakin akan menghapus data kontak ini?")) {
            var id = $(this).data('idkontak');
            var datakontak = {'id_kontak':id};console.log(datakontak);
            $.ajax({
                url : '<?php echo base_url("kontak/delete");?>',
                data : datakontak,
                dataType : 'json',
                type : 'POST',
                success : function(data,status){
                    if (data.status!='error') {
                        window.location.href = '<?php echo base_url();?>';
                        resetkontak();//form langsung dikosongkan pas selesai input data
                    }else{
                        alert(data.msg);
                    }
                },
                error : function(x,t,m){
                    alert(x.responseText);
                }
            })
        }
    }



</script>