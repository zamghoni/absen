<style>
table{
  border-radius: .2rem;
}
#tabel1 {
    margin-left: 15px;
    color: #444;
    border-collapse: collapse;
    border: 1px solid #f2f5f7;
    font-size: 14px;
}

#tabel1 tr th {
    background: #284063;
    color: #fff;
    font-weight: normal;
    line-height: 20px;
}

#tabel1, th, td {
    padding: 3px 6px;
    border: 1px solid #f2f5f7;
}

#tabel1 tr:nth-child(odd) {
    background-color: #f2f2f2;
}
p {
  text-align: center;
}

</style>
<img src="assets/backend/img/kop.png" style="width: 100%">
<h3><center>Laporan Absensi<br>MI Muhammadiyah Debong Wetan</center></h3>
<?php if ($this->input->post('dari_tgl')){ ?>
  <p><center>Periode:
    <?=date_indo($this->input->post('dari_tgl')); ?> s.d
    <?=date_indo($this->input->post('sampai_tgl')); ?>
  </center></p>
<?php } ?>
<?php if ($this->input->post('id_user')){ ?>
  <p><center>Nama Lengkap:
    <?php foreach ($user->result() as $key => $data){ ?>
      <?php if ($data->id == $this->input->post('id_user')){ ?>
        <span class="badge badge-primary" title="<?=$data->nama_lengkap?>"> <?=$data->nama_lengkap?></span>
      <?php } ?>
    <?php } ?>
  </p>
<?php } ?>
<br>
<div class="card-body">
  <div class="table-responsive">
    <table  class="table table-bordered table-hover" id="tabel1" width="100%" cellspacing="0" >
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Lengkap</th>
          <th>Tanggal</th>
          <th>Absensi Masuk</th>
          <th>Absensi Keluar</th>
          <th>Keterangan</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php $no=1;
        foreach($row->result()as $key => $data) {
            ?>
            <?php  $date = date('Y-m-d', strtotime($data->tgl_absen));?>
            <tr>
              <td><?=$no; ?></td>
              <td><?=$data->nama_lengkap?></td>
              <td><?=date_indo($data->tgl_absen)?></td>
              <td><?=$data->absen_masuk?></td>
              <td><?=$data->absen_pulang?></td>
              <td><?=$data->keterangan_absen?></td>
            <?php  if ($data->absen_masuk >= $pengaturan->bts_absen_masuk) { ?>
              <td>Absen Masuk Terlambat</td>
            <?php } else { ?>
              <td>Sudah Absen</td>
            <?php } ?>
            </tr>
            <?php
            $no++;
          }
          ?>
        </tbody>
      </table>
      <br><br>
      <?php $date = date('Y-m-d'); ?>
      <center>
        <strong>Dicetak pada :</strong> <?=longdate_indo($date); ?> <br> <strong>Pukul :</strong> <?=date('H:i:s') ?>
      </center>
