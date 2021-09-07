<?php $this->view('message')?>
<?php $this->view('backend/dashboard/top-dashboard'); ?>
<div class="card-deck">
  <div class="card radius-15">
    <div class="card-body">
      <div class="d-flex align-items-center">
        <div>
          <h5 class="mb-0">Absensi</h5>
        </div>
      </div>
      <hr>
      <div class="ml-auto">
        <script type="text/javascript">
          function currentTime() {
            var date = new Date(); /* creating object of Date class */
            var hour = date.getHours();
            var min = date.getMinutes();
            var sec = date.getSeconds();
            hour = updateTime(hour);
            min = updateTime(min);
            sec = updateTime(sec);
            document.getElementById("clocknow").innerText = hour + " : " + min + " : " + sec; /* adding time to the div */

            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

            var curWeekDay = days[date.getDay()]; // get day
            var curDay = date.getDate(); // get date
            var curMonth = months[date.getMonth()]; // get month
            var curYear = date.getFullYear(); // get year
            var date = curWeekDay + ", " + curDay + " " + curMonth + " " + curYear; // get full date
            document.getElementById("datenow").innerHTML = date;

            var t = setTimeout(function() {
                currentTime()
            }, 1000); /* setting timer */
        }

        function updateTime(k) {
            if (k < 10) {
                return "0" + k;
            } else {
                return k;
            }
        }

        if (document.getElementById("clocknow")) {
            currentTime(); /* calling currentTime() function to initiate the process */
        }
        </script>
      </div>
      <div class="row mt-3">
        <div class="col-12 col-lg-6">
          <div class="card radius-15 mx-0">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div>
                  <p class="mb-0">Absensi Masuk</p>
                </div>
                  <div class="ml-auto btn btn-sm btn-primary"><span><i class="bx bx-user-x"></i> Belum Absen</span>
                </div>
              </div>
                <h4 class="mb-0">00:00:00</h4>
              <?php
              echo form_open_multipart('absensi/hadir'); ?>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label" for="keterangan_absen">Pilih Absensi</label>
                <div class="col-sm-8">
                    <select class="form-control" id="keterangan_absen" name="keterangan_absen" required oninvalid="this.setCustomValidity('Pilih Absensi disini')" oninput="setCustomValidity('')">
                    <?php $keterangan_absen = $this->input->post('keterangan_absen') ? $this->input->post('keterangan_absen') : $row->keterangan_absen ?>
                    <option value="">- Pilih -</option>
                    <option value="Bekerja Di Kantor" <?=$keterangan_absen == 'Bekerja Di Kantor' ? 'selected' : null?>> Bekerja Di Kantor </option>
                    <option value="Bekerja Di Rumah atau WFH" <?=$keterangan_absen == 'Bekerja Di Rumah atau WFH' ? 'selected' : null?>> Bekerja Di Rumah atau WFH </option>
                    <option value="Izin" <?=$keterangan_absen == 'Izin' ? 'selected' : null?>> Izin </option>
                    <option value="Sakit" <?=$keterangan_absen == 'Sakit' ? 'selected' : null?>> Sakit </option>
                    <option value="Cuti" <?=$keterangan_absen == 'Cuti' ? 'selected' : null?>> Cuti </option>
                    </select>
                </div>
              </div>
              <?php if(date('H:is') >= $pengaturan->jam_masuk){ ?>
              <div class="form-group row">
                <label class="col-sm-4 col-form-label"></label>
                <div class="col-sm-8">
                  <button type="submit" name="absen_masuk" class="btn btn-sm btn-primary px-4" title="Simpan data absen masuk"><span class="bx bx-save"></span> Simpan Absen Masuk</button>
                </div>
              </div>
              <?php } ?>
              <p class="text-danger">Mulai Absen Masuk pada pukul <?=$pengaturan->jam_masuk?> WIB s.d pukul <?=$pengaturan->bts_absen_masuk?> WIB apabila tombol simpan absensi belum tampil, silahkan <a href="javascript:window.location.reload(true)">Klik Disini</a></p>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="card radius-15 mx-0">
            <div class="card-body">
              <div class="d-flex align-items-center">
                <div>
                  <p class="mb-0">Absensi Pulang</p>
                </div>
                  <div class="ml-auto btn btn-sm btn-primary"><span> <i class="bx bx-user-x"></i> Belum Absen</span>
                </div>
              </div>
                <h4 class="mb-0">00:00:00</h4>
                <p class="text-danger">Batas Absensi pulang dapat diases sampai pukul <?=$pengaturan->bts_absen_pulang?> WIB</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
