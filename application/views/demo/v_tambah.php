<div class="container">
  <div class="row">
      <div class="col-md-12">
          <h3><?php echo $title;?></h3>
          <hr>
        <form class="form-horizontal" action="<?php echo base_url();?>web/proses_tambah" method="post">
          <div class="form-group">
							<label class="col-sm-2 control-label">Nama</label>
							<div class="col-sm-8">
								<input type="text" required placeholder="Your name .." class="form-control" name="nama">
							</div>
						</div>
            <div class="form-group">
							<label class="col-sm-2 control-label">No Hp</label>
							<div class="col-sm-8">
								<input type="text" required placeholder="cth. 0833323xxx" class="form-control" name="no_hp">
							</div>
						</div>
            <div class="form-group">
							<label class="col-sm-2 control-label">E-mail</label>
							<div class="col-sm-8">
								<input type="text" required placeholder="example@mail.com" class="form-control" name="email">
							</div>
						</div>
            <div class="form-group">
              <div class="col-sm-2">
              </div>
              <div class="col-sm-8">
                <button class="btn btn-primary" type="submit" name="button">Simpan</button>
              </div>
  					</div>
        </form>
      </div>
  </div>
</div>
