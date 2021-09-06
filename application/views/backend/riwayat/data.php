<?php $this->view('message')?>
<div class="card">
  <div class="card-body">
    <div class="card-title">
      <div class="d-flex align-items-center mb-3">
        <h4 class="pr-3"><?=$subpage.' '.$page?></h4>
      </div>
    </div>
    <hr/>
    <div class="table-responsive">
      <table id="example" class="table table-striped table-bordered table-sm table-hover" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Tanggal</th>
            <th>Absen Masuk</th>
            <th>Absen Pulang</th>
            <th>Status</th>
            <th>Aksi</th>
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
                <td><?php if ($data->absen_masuk >= $pengaturan->bts_absen_masuk){ ?>
                  <div class="badge badge-danger">Absen Masuk Terlambat</div>
                <?php }else{ ?>
                  <div class="badge badge-success">Sudah Absen</div>
                <?php } ?>
                </td>
                <td class="actions-hover actions-fade">
                  <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal<?=$data->id_absensi?>" title="Detail"><i class="bx bx-detail"></i></button>
    							<!-- Modal -->
    							<div class="modal fade" id="exampleModal<?=$data->id_absensi?>" tabindex="-1" role="dialog" aria-hidden="true">
    								<div class="modal-dialog modal-dialog-centered">
    									<div class="modal-content">
    										<div class="modal-header">
    											<h5 class="modal-title">Detail Absensi</h5>
    											<button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
    											</button>
    										</div>
    										<div class="modal-body">
                          <table class="table table-borderless table-striped table-sm table-hover">
                            <tr>
                              <td>Nama Lengkap</td>
                              <td>:</td>
                              <td><?=$data->nama_lengkap?></td>
                            </tr>
                            <tr>
                              <td>Hari,Tanggal Absensi</td>
                              <td>:</td>
                              <td><?=longdate_indo($data->tgl_absen)?></td>
                            </tr>
                            <tr>
                              <td>Absen Masuk</td>
                              <td>:</td>
                              <td><?=$data->absen_masuk?> WIB</td>
                            </tr>
                            <tr>
                              <td>Absen Pulang</td>
                              <td>:</td>
                              <td><?php if ($data->absen_pulang == null){?>
                                Belum Absen Pulang
                              <?php } else { ?>
                                <?=$data->absen_pulang?> WIB
                              <?php } ?></td>
                            </tr>
                            <tr>
                              <td>Status Kehadiran</td>
                              <td>:</td>
                              <td><?php if ($data->absen_masuk >= $pengaturan->bts_absen_masuk){ ?>
                                <div class="badge badge-danger">Absen Masuk Terlambat</div>
                              <?php }else{ ?>
                                <div class="badge badge-success">Sudah Absen</div>
                              <?php } ?></td>
                            </tr>
                            <tr>
                              <td>Keterangan Absen</td>
                              <td>:</td>
                              <td><?=$data->keterangan_absen?></td>
                            </tr>
                          </table>
                        </div>
    										<div class="modal-footer">
    											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    										</div>
    									</div>
    								</div>
    							</div>
                  <a href="<?=site_url('riwayat/del/'.$data->id_absensi)?>" title="Hapus" class="btn btn-sm btn-danger hapus text-white"><i class="bx bx-trash"></i></a>
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
              <td><?php if ($data->absen_masuk >= $pengaturan->bts_absen_masuk){ ?>
                <div class="badge badge-danger">Absen Masuk Terlambat</div>
              <?php }else{ ?>
                <div class="badge badge-success">Sudah Absen</div>
              <?php } ?>
              </td>
              <td class="actions-hover actions-fade">
                <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal<?=$data->id_absensi?>" title="Detail"><i class="bx bx-detail"></i></button>
  							<!-- Modal -->
  							<div class="modal fade" id="exampleModal<?=$data->id_absensi?>" tabindex="-1" role="dialog" aria-hidden="true">
  								<div class="modal-dialog modal-dialog-centered">
  									<div class="modal-content">
  										<div class="modal-header">
  											<h5 class="modal-title">Detail Absensi</h5>
  											<button type="button" class="close" data-dismiss="modal" aria-label="Close">	<span aria-hidden="true">&times;</span>
  											</button>
  										</div>
  										<div class="modal-body">
                        <table class="table table-borderless table-striped table-sm table-hover">
                          <tr>
                            <td>Nama Lengkap</td>
                            <td>:</td>
                            <td><?=$data->nama_lengkap?></td>
                          </tr>
                          <tr>
                            <td>Hari,Tanggal Absensi</td>
                            <td>:</td>
                            <td><?=longdate_indo($data->tgl_absen)?></td>
                          </tr>
                          <tr>
                            <td>Absen Masuk</td>
                            <td>:</td>
                            <td><?=$data->absen_masuk?> WIB</td>
                          </tr>
                          <tr>
                            <td>Absen Pulang</td>
                            <td>:</td>
                            <td><?php if ($data->absen_pulang == null){?>
                              Belum Absen Pulang
                            <?php } else { ?>
                              <?=$data->absen_pulang?> WIB
                            <?php } ?></td>
                          </tr>
                          <tr>
                            <td>Status Kehadiran</td>
                            <td>:</td>
                            <td><?php if ($data->absen_masuk >= $pengaturan->bts_absen_masuk){ ?>
                              <div class="badge badge-danger">Absen Masuk Terlambat</div>
                            <?php }else{ ?>
                              <div class="badge badge-success">Sudah Absen</div>
                            <?php } ?></td>
                          </tr>
                          <tr>
                            <td>Keterangan Absen</td>
                            <td>:</td>
                            <td><?=$data->keterangan_absen?></td>
                          </tr>
                        </table>
                      </div>
  										<div class="modal-footer">
  											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  										</div>
  									</div>
  								</div>
  							</div>
              </td>
            </tr>
            <?php
            $no++;
            }
          }?>
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Lengkap</th>
            <th>Absen Masuk</th>
            <th>Absen Pulang</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
