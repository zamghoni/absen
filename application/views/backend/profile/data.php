<?php $this->view('message')?>
<div class="card">
  <div class="card-body">
    <div class="card-title">
      <div class="d-flex align-items-center mb-3">
        <h4 class="pr-3"><?=$subpage.' '.$page?></h4>
        <div class="ml-auto">
          <!-- <a href="<?=site_url('profile/form')?>" class="btn btn-success"><span class="bx bx-edit"></span> Edit</a> -->
        </div>
      </div>
    </div>
    <hr/>
    <div class="row">
      <div class="col-12 col-lg-4 border-right">
        <div class="d-md-flex align-items-center">
          <div class="mb-md-0 mb-3">
            <?php if ($row->foto != null){ ?>
              <a href="<?=base_url('upload/foto/'.$row->foto)?>" data-lightbox="<?=$row->foto?>" title="Foto <?=ucfirst($row->username)?>">
                <img src="<?=base_url('upload/foto/'.$row->foto)?>" class="rounded-circle shadow" width="130" height="130" alt=""></a>
              <?php } else { ?>
                <img src="https://via.placeholder.com/110x110" class="rounded-circle shadow" width="130" height="130" alt="">
              <?php } ?>
            </div>
            <div class="ml-md-4 flex-grow-1">
              <div class="d-flex align-items-center mb-1">
                <h4 class="mb-0"><?=$row->nama_lengkap?></h4>
                <!-- <p class="mb-0 ml-auto">$44/hr</p> -->
              </div>
              <p class="mb-0 text-muted"><?=$pengaturan->instansi?></p>
              <p class="text-primary"><span class="bx bx-award"></span> <?php if ($row->role == 0) { ?>
                <span class='badge badge-secondary'>User</span>
              <?php } else { ?>
                <span class='badge badge-primary'>Admin</span>
              <?php } ?></p>
            </div>
          </div>
          <br>
          <div class="card shadow-none border mb-0">
            <div class="card-body">
              <h5 class="mb-1">Profile</h5>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <p class="mb-0">Nama Lengkap : <a href="javascript:;"><?=$row->nama_lengkap?></a>
                </p>
              </li>
              <li class="list-group-item">
                <p class="mb-0"></i> Username : <a href="javascript:;"><?=$row->username?></a>
                </p>
              </li>
              <li class="list-group-item">
                <p class="mb-0"></i> Hak Akses : <a href="javascript:;"><?php if ($row->role == 0) { ?>
                  <span class='badge badge-secondary'>User</span>
                <?php } else { ?>
                  <span class='badge badge-primary'>Admin</span>
                <?php } ?></a>
              </p>
            </li>
            <li class="list-group-item">
              <p class="mb-0"></i> Update Terakhir : <a href="javascript:;"><?php if ($row->diubah != null){
                echo $row->diubah;
              }else{
                echo "Belum melakukan update";
              } ?></a>
            </p>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-12 col-lg-8">
      <br>
      <ul class="nav nav-pills">
        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#profile"><span class="p-tab-name">Edit Profile</span><i class='bx bx-donate-blood font-24 d-sm-none'></i></a>
        </li>
        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#password"><span class="p-tab-name">Ubah Kata Sandi</span><i class='bx bx-message-edit font-24 d-sm-none'></i></a>
        </li>
      </ul>
      <div class="tab-content mt-3">
        <div class="tab-pane fade show active" id="profile">
          <div class="card shadow-none border mb-0 radius-15">
            <div class="card-body">
              <div class="d-sm-flex align-items-center mb-3">
                <h4 class="mb-0">Edit Profile</h4>
              </div>
              <hr>
              <div class="form-body">
                <?php
                $attributes = array('onsubmit' => 'return tambah(this)');
                echo form_open_multipart('profile/process',$attributes); ?>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label" for="nama_lengkap">Nama Lengkap</label>
                  <input type="hidden" name="id" value="<?=$this->fungsi->user_login()->id?>">
                  <div class="col-sm-9">
                    <input type="text" value="<?=$row->nama_lengkap?>" name="nama_lengkap" id="nama_lengkap" class="form-control" required oninvalid="this.setCustomValidity('Masukkan Nama Lengkap disini')" oninput="setCustomValidity('')">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label" for="username">Username</label>
                  <div class="col-sm-9">
                    <input type="text" value="<?=$row->username?>" name="username" id="username" class="form-control" required
                    oninvalid="this.setCustomValidity('Masukkan Username disini')" oninput="setCustomValidity('')">
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Foto</label><br>
                  <div class="col-sm-9">
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
                  <label class="col-sm-3 col-form-label"></label>
                  <div class="col-sm-9">
                    <button type="submit" name="update" class="btn btn-primary px-4"><span class="bx bx-save"></span> Update</button>
                  </div>
                </div>
                <?php echo form_close(); ?>
              </div>
            </div>
          </div>
        </div>
          <div class="tab-pane fade" id="password">
            <div class="card shadow-none border mb-0 radius-15">
              <div class="card-body">
                <div class="form-body">
                  <div class="d-sm-flex align-items-center mb-3">
                    <h4 class="mb-0">Ubah Kata Sandi</h4>
                  </div>
                  <hr>
                  <div class="form-body">
                    <?php
                    $attributes = array('onsubmit' => 'return tambah(this)');
                    echo form_open_multipart('profile/ubah_password',$attributes); ?>
                    <input type="hidden" name="id" value="<?=$this->fungsi->user_login()->id?>">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="old_password" >Kata Sandi Lama</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Masukkan Kata sandi lama anda">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="password" >Kata Sandi Baru</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Kata sandi baru">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label" for="konf_password">Konfirmasi Kata Sandi Baru</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="konf_password" id="konf_password" placeholder="Masukkan Konfirmasi kata sandi baru">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"></label>
                      <div class="col-sm-9">
                        <button type="submit" name="updatesandi" class="btn btn-primary px-4"><span class="bx bx-save"></span> Update</button>
                      </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <script>
  function tambah(form) {
    if (form.old_password.value=='') {
      Lobibox.notify('warning', {
    		pauseDelayOnHover: true,
    		size: 'mini',
    		rounded: true,
    		delayIndicator: true,
    		icon: 'bx bx-error',
    		continueDelayOnInactiveTab: false,
    		position: 'top right',
    		msg: 'Kata Sandi Lama harus diisi!'
    	});
      return false;
    } else
    if (form.password.value=='') {
      Lobibox.notify('warning', {
    		pauseDelayOnHover: true,
    		size: 'mini',
    		rounded: true,
    		delayIndicator: true,
    		icon: 'bx bx-error',
    		continueDelayOnInactiveTab: false,
    		position: 'top right',
    		msg: 'Kata Sandi Baru harus diisi!'
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
    		msg: 'Konfirmasi Kata Sandi Baru harus diisi!'
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
    		msg: 'Konfirmasi Kata Sandi Baru tidak sama dengan Kata Sandi Baru'
    	});
      return false;
    } else {
      return true;
    };
  }
  </script>
