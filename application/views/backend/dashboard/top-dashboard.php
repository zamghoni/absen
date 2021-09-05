<div class="row">
  <div class="col-12 col-lg-3">
    <div class="card radius-15 bg-voilet">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <h2 class="mb-0 text-white"><?=$pegawai->num_rows()?> <span class='font-14 text-white'>Pegawai</span> </h2>
          </div>
          <div class="ml-auto font-35 text-white"><i class="bx bx-user-check"></i>
          </div>
        </div>
        <div class="d-flex align-items-center">
          <div>
            <p class="mb-0 text-white">Jumlah Pegawai</p>
          </div>
          <!-- <div class="ml-auto font-14 text-white">+23.4%</div> -->
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-lg-3">
    <div class="card radius-15 bg-primary-blue">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <h2 class="mb-0 text-white"><?=$masuk->num_rows()?> <i class='bx bxs-down-arrow-alt font-14 text-white'></i> </h2>
          </div>
          <div class="ml-auto font-35 text-white"><i class="bx bx-calendar-check"></i>
          </div>
        </div>
        <div class="d-flex align-items-center">
          <div>
            <p class="mb-0 text-white">Data Kehadiran</p>
          </div>
          <div class="ml-auto font-14 text-white">Data hari ini</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-lg-3">
    <div class="card radius-15 bg-rose">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <h2 class="mb-0 text-white"><?=$terlambat->num_rows()?> <i class='bx bxs-up-arrow-alt font-14 text-white'></i> </h2>
          </div>
          <div class="ml-auto font-35 text-white"><i class="bx bx-calendar-x"></i>
          </div>
        </div>
        <div class="d-flex align-items-center">
          <div>
            <p class="mb-0 text-white">Terlamat Absensi</p>
          </div>
          <div class="ml-auto font-14 text-white">Data hari ini</div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-12 col-lg-3">
    <div class="card radius-15 bg-warning">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div>
            <h2 class="mb-0 text-dark" id="clocknow"></h2>
          </div>
          <div class="ml-auto font-35 text-dark"><i class="bx bx-timer"></i>
          </div>
        </div>
        <div class="d-flex align-items-center">
          <div>
            <p class="mb-0 text-dark"><span id="datenow"></span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end row-->
