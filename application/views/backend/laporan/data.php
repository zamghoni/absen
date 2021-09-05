<?php $this->view('message')?>
<div class="card-deck">
  <div class="card radius-15">
    <div class="card-body">
      <div class="d-flex align-items-center">
        <div>
          <h5 class="mb-0">Download Laporan Absensi</h5>
        </div>
      </div>
      <hr>
      <div class="row mt-3">
        <div class="col-12 col-lg-12">
          <div class="card radius-15 mx-0">
            <div class="card-body">
                <div class="col-12 row">
                  <div class="col-md-3">
                    <?php echo form_open_multipart('laporan/process'); ?>
                    <div class="form-group">
                      <label class="col-form-label" for="dari_tgl">Dari Tanggal:</label>
                      <input type="date" name="dari_tgl" class="form-control" id="dari_tgl" <?php if ($this->input->post('dari_tgl')) { ?>
                        value="<?=$this->input->post('dari_tgl');?>"
                      <?php } ?>>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="col-form-label" for="sampai_tgl">Sampai Tanggal:</label>
                      <input type="date" name="sampai_tgl" class="form-control" id="sampai_tgl" <?php if ($this->input->post('sampai_tgl')) { ?>
                        value="<?=$this->input->post('sampai_tgl');?>"
                      <?php } ?>>
                    </div>
                  </div>

                  <?php if ($this->fungsi->user_login()->role != 0){ ?>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="col-form-label" for="id_user">User :</label>
                        <select class="form-control" name="id_user" id="id_user">
                          <option value="">- Pilih User -</option>
                          <?php
                          $no = 1;
                          foreach ($user->result() as $key => $data) { ?>
                            <option value="<?=$data->id?>" <?=$data->id == $this->input->post('id_user') ? 'selected' : null?>> <?=$data->nama_lengkap?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  <?php } ?>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label class="col-form-label">Proses :</label> <br>
                      <button type="submit" name="reset" class="btn btn-sm btn-outline-secondary m-1"><i class="bx bx-reset"></i> Reset</button>
                      <button type="submit" name="filter" title="Filter Data" class="btn btn-sm btn-primary m-1"><i class="bx bx-filter-alt"></i> Filter</button> <br>
                      <button type="submit" name="export" title="Export Excel" class="btn btn-sm btn-success m-1"><i class="bx bx-spreadsheet"></i> Excel</button>
                      <button type="submit" name="cetak" title="Cetak PDF" class="btn btn-sm btn-danger m-1"><i class="bx bx-file"></i> PDF</button>
                    </div>
                  </div>
                  <p class="text-danger">Apabila range tanggal tidak di isi maka file akan merekap semua data Absensi</p>
                </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table id="example" class="table table-sm table-bordered table-hover" style="width:100%">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Lengkap</th>
              <th>Tanggal</th>
              <th>Absen Masuk</th>
              <th>Absen Pulang</th>
              <th>Keterangan</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1;
            foreach($row->result()as $key => $data) {
              if ($this->fungsi->user_login()->role != 0) { ?>
                <!-- riwayat halaman admin -->
                <tr>
                  <td><?=$no?></td>
                  <td><?=$data->nama_lengkap?></td>
                  <td><?=date_indo($data->tgl_absen)?></td>
                  <td><?=$data->absen_masuk?> WIB</td>
                  <td><?php if ($data->absen_pulang == null){?>
                    Belum Absen Pulang
                  <?php } else { ?>
                    <?=$data->absen_pulang?> WIB
                  <?php } ?>
                  </td>
                  <td><?=$data->keterangan_absen?></td>
                  <td><?php if ($data->absen_masuk >= $pengaturan->bts_absen_masuk){ ?>
                    <div class="badge badge-danger">Absen Masuk Terlambat</div>
                  <?php }else{ ?>
                    <div class="badge badge-success">Sudah Absen</div>
                  <?php } ?>
                  </td>
                </tr>
              <?php $no++; } else if ($data->id_user == $this->fungsi->user_login()->id) { ?>
                <!-- riwayat halaman user -->
              <tr>
                <td><?=$no?></td>
                <td><?=$data->nama_lengkap?></td>
                <td><?=date_indo($data->tgl_absen)?></td>
                <td><?=$data->absen_masuk?> WIB</td>
                <td><?php if ($data->absen_pulang == null){?>
                  Belum Absen Pulang
                <?php } else { ?>
                  <?=$data->absen_pulang?> WIB
                <?php } ?>
                </td>
                <td><?=$data->keterangan_absen?></td>
                <td><?php if ($data->absen_masuk >= $pengaturan->bts_absen_masuk){ ?>
                  <div class="badge badge-danger">Absen Masuk Terlambat</div>
                <?php }else{ ?>
                  <div class="badge badge-success">Sudah Absen</div>
                <?php } ?>
                </td>
              </tr>
              <?php
              $no++;
              }
            }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
