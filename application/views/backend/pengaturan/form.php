
<?php $this->view('message')?>
<div class="card">
  <div class="card-body">
    <div class="card-title">
      <div class="d-flex align-items-center mb-3">
        <h4 class="pr-3"><?=$subpage.' '.$page?></h4>
      </div>
    </div>
    <hr/>
    <div class="form-body">
      <?php
      $attributes = array('onsubmit' => 'return tambah(this)');
      echo form_open_multipart('pengaturan/process',$attributes); ?>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="instansi">Nama Instansi</label>
        <div class="col-sm-10">
          <input type="text" value="<?=$row->instansi?>" name="instansi" id="instansi" class="form-control" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Logo Instansi</label><br>
        <div class="col-sm-10">
          <?php if ($row->logo != null){ ?>
            <img src="<?=base_url('upload/logo/'.$row->logo)?>" alt="Foto" style="width:100px" class="rounded ml-3 shadow p-1 mb-3">
          <?php } ?>
          <div class="input-group mb-3">
            <div class="input-group-prepend">	<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" value="<?=$row->logo?>" name="logo" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept="image/*" onchange="loadFile(event)">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>
            <small>(Biarkan kosong jika tidak <?=$subpage == 'Edit' ? 'diganti' : 'ada'?>) <b>Maks. 2MB</b></small>
            <br>
            <input type="hidden" name="old_logo" value="<?=$row->logo?>" readonly>
            <small>Pratinjau Foto:</small><br>
            <img src="" id="output" width="100px" class="rounded ml-3 shadow p-1"/>
            <script>
            var loadFile = function(event) {
              var output = document.getElementById('output');
              output.src = URL.createObjectURL(event.target.files[0]);
              output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
              }
            };
            </script>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="jam_masuk">Mulai Absen Masuk</label>
        <div class="col-sm-10">
          <input type="text" value="<?=$row->jam_masuk?>" name="jam_masuk" id="jam_masuk" class="form-control timepicker" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="bts_absen_masuk">Batas Absen Masuk</label>
        <div class="col-sm-10">
          <input type="text" value="<?=$row->bts_absen_masuk?>" name="bts_absen_masuk" id="bts_absen_masuk" class="form-control timepicker" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="bts_absen_pulang">Batas Absen Pulang</label>
        <div class="col-sm-10">
          <input type="text" value="<?=$row->bts_absen_pulang?>" name="bts_absen_pulang" id="bts_absen_pulang" class="form-control timepicker" required>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
          <button type="submit" name="<?=$subpage?>" class="btn btn-primary px-4"><span class="bx bx-save"></span> Simpan</button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
