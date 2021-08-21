<?php $this->view('message')?>
<div class="card">
  <div class="card-body">
    <div class="card-title">
      <div class="d-flex align-items-center mb-3">
        <h4 class="pr-3"><?=$subpage.' '.$page?></h4>
        <div class="ml-auto">
          <a href="<?=site_url('profile/form')?>" class="btn btn-success"><span class="bx bx-edit"></span> Edit</a>
        </div>
      </div>
    </div>
    <hr/>
    <div class="row">
      <div class="col-12 col-lg-5 border-right">
        <div class="d-md-flex align-items-center">
          <div class="mb-md-0 mb-3">
            <?php if ($row->foto != null){ ?>
              <img src="<?=base_url('upload/foto/'.$row->foto)?>" class="rounded-circle shadow" width="130" height="130" alt="">
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
            <!-- <button type="button" class="btn btn-primary">Connect</button> -->
            <!-- <button type="button" class="btn btn-outline-secondary ml-2">Resume</button> -->
          </div>
        </div>
      </div>
      <div class="col-12 col-lg-7">
        <table class="table table-sm table-borderless mt-md-0 mt-3">
          <tbody>
            <tr>
              <th>Availability:</th>
              <td>Full-time (40hr/wk) <span class="badge badge-success">available</span>
              </td>
            </tr>
            <tr>
              <th>Age:</th>
              <td>27</td>
            </tr>
            <tr>
              <th>Location:</th>
              <td>Sankt, Petersburg, Russia</td>
            </tr>
            <tr>
              <th>Years experience:</th>
              <td>6</td>
            </tr>
          </tbody>
        </table>
        <div class="mb-3 mb-lg-0"> <a href="javascript:;" class="btn btn-sm btn-link"><i class="bx bxl-github"></i></a>
          <a href="javascript:;" class="btn btn-sm btn-link"><i class="bx bxl-twitter"></i></a>
          <a href="javascript:;" class="btn btn-sm btn-link"><i class="bx bxl-facebook"></i></a>
          <a href="javascript:;" class="btn btn-sm btn-link"><i class="bx bxl-linkedin"></i></a>
          <a href="javascript:;" class="btn btn-sm btn-link"><i class="bx bxl-dribbble"></i></a>
          <a href="javascript:;" class="btn btn-sm btn-link"><i class="bx bxl-stack-overflow"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
