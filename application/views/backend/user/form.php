<?php $this->view('message')?>
<div class="card">
  <div class="card-body">
    <div class="card-title">
      <div class="d-flex align-items-center mb-3">
        <h4 class="pr-3"><?=$subpage.' '.$page?></h4>
        <div class="ml-auto">
          <a href="javascript:history.back()" class="btn btn-warning"><span class="bx bx-arrow-back"></span> Kembali</a>
        </div>
      </div>
    </div>
    <hr/>
    <div class="form-body">
      <?php
      $attributes = array('onsubmit' => 'return tambah(this)');
      echo form_open_multipart('user/process',$attributes); ?>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="nama_lengkap">Nama Lengkap</label>
        <input type="hidden" name="id" value="<?=$row->id?>">
        <div class="col-sm-10">
          <input type="text" value="<?=$row->nama_lengkap?>" name="nama_lengkap" id="nama_lengkap" class="form-control" required
            oninvalid="this.setCustomValidity('Masukkan Nama Lengkap disini')" oninput="setCustomValidity('')">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="username">Username</label>
        <div class="col-sm-10">
          <input type="text" value="<?=$row->username?>" name="username" id="username" class="form-control" required
            oninvalid="this.setCustomValidity('Masukkan Username disini')" oninput="setCustomValidity('')">
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="password" >Kata Sandi</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="password" id="password">
          <small>(<?=$subpage == 'Edit' ? 'Biarkan kosong jika password tidak diganti' : 'Silahkan password di isi'?>)</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="konf_password">Konfirmasi Kata Sandi</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="konf_password" id="konf_password">
          <small>(<?=$subpage == 'Edit' ? 'Biarkan kosong jika password tidak diganti' : 'Silahkan konfirmasi password di isi sama dengan password'?>)</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label" for="role">Hak Akses</label>
        <div class="col-sm-10">
            <select class="single-select" id="role" name="role">
            <?php $role = $this->input->post('role') ? $this->input->post('role') : $row->role ?>
            <option value="">- Pilih -</option>
            <option value="0" <?=$role == '0' ? 'selected' : null?>> User </option>
            <option value="1" <?=$role == '1' ? 'selected' : null?>> Admin </option>
            </select>
        </div>
      </div>
      <div class="form-group row">
        <label class="col-sm-2 col-form-label">Foto</label><br>
        <div class="col-sm-10">
          <?php if ($row->foto != null){ ?>
            <img src="<?=base_url('upload/foto/'.$row->foto)?>" alt="Foto" style="width:100px" class="rounded ml-3 shadow p-1 mb-3">
          <?php } ?>
          <div class="input-group mb-3">
            <div class="input-group-prepend">	<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
              <input type="file" value="<?=$row->foto?>" name="foto" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" accept="image/*" onchange="loadFile(event)">
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>
            <small>(Biarkan kosong jika tidak <?=$subpage == 'Edit' ? 'diganti' : 'ada'?>) <b>Maks. 2MB</b></small>
            <br>
            <input type="hidden" name="old_foto" value="<?=$row->foto?>" readonly>
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
        <label class="col-sm-2 col-form-label"></label>
        <div class="col-sm-10">
          <button type="submit" name="<?=$subpage?>" class="btn btn-primary px-4"><span class="bx bx-save"></span> Simpan</button>
        </div>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
<!-- end -->
<?php if ($subpage == "Tambah") {?>
  <script>
  function tambah(form) {
    if (form.password.value=='') {
      Lobibox.notify('warning', {
    		pauseDelayOnHover: true,
    		size: 'mini',
    		rounded: true,
    		delayIndicator: true,
    		icon: 'bx bx-error',
    		continueDelayOnInactiveTab: false,
    		position: 'top right',
    		msg: 'Password Harus Diisi!'
    	});
      return false;
    } else if (form.konf_password.value=='') {
      Lobibox.notify('warning', {
    		pauseDelayOnHover: true,
    		size: 'mini',
    		rounded: true,
    		delayIndicator: true,
    		icon: 'bx bx-error',
    		continueDelayOnInactiveTab: false,
    		position: 'top right',
    		msg: 'Konfirmasi Password Harus Diisi!'
    	});
      return false;
    } else if (form.konf_password.value!=form.password.value) {
      Lobibox.notify('warning', {
    		pauseDelayOnHover: true,
    		size: 'mini',
    		rounded: true,
    		delayIndicator: true,
    		icon: 'bx bx-error',
    		continueDelayOnInactiveTab: false,
    		position: 'top right',
    		msg: 'Konfirmasi Password tidak sesuai!'
    	});
      return false;
    }else {
      return true;
    };
  }
  </script>
<?php } ?>
<?php if ($subpage == "Edit") {?>
  <script>
  function tambah(form) {
    if (form.konf_password.value!=form.password.value) {
      Lobibox.notify('warning', {
    		pauseDelayOnHover: true,
    		size: 'mini',
    		rounded: true,
    		delayIndicator: true,
    		icon: 'bx bx-error',
    		continueDelayOnInactiveTab: false,
    		position: 'top right',
    		msg: 'Konfirmasi Password tidak sesuai!'
    	});
      return false;
    } else  {
      return true;
    };
  }
  </script>
<?php } ?>
