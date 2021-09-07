<style>
#tabel1 {
    margin-left: 5px;
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
p.left{
  text-align: left;
  margin-left: 15px
}
#left{
  text-align: left;
  margin-left: 400px;
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
  <p class="left">Nama Lengkap:
    <?php foreach ($user->result() as $key => $data){ ?>
      <?php if ($data->id == $this->input->post('id_user')){ ?>
        <span class="badge badge-primary" title="<?=$data->nama_lengkap?>"> <?=$data->nama_lengkap?></span>
      <?php } ?>
    <?php } ?>
  </p>
<?php } ?>
<?php if ($this->fungsi->user_login()->role == 0) { ?>
  <p class="left">Nama Lengkap: <?=$this->fungsi->user_login()->nama_lengkap?> </p>
<?php } ?>
<div class="card-body">
  <div class="table-responsive">
    <table  class="table table-bordered table-hover atas" id="tabel1" width="100%" cellspacing="0" >
      <thead>
        <tr>
          <th>No</th>
          <?php if ($this->fungsi->user_login()->role == 1){ ?>
            <th>Nama Lengkap</th>
          <?php } ?>
          <th>Hari, Tanggal</th>
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
              <?php if ($this->fungsi->user_login()->role == 1){ ?>
              <td><?=$data->nama_lengkap?></td>
              <?php } ?>
              <td><?=longdate_indo($data->tgl_absen)?></td>
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
      <?php if ($this->fungsi->user_login()->role == 1){ ?>
        <p id="left">Tegal, <?=date_indo($date)?> <br>
        Kepala MI Muhammadiyah Debong Wetan</p>
        <img src="assets/backend/img/ttd.png" height="180px" style="margin-left:275px">
        <p id="left" style="margin-top:-70px"><b><u>Khafidz Mujtahid</u></b></p>
    <?php } ?>

      <center>
        <strong>Dicetak pada :</strong> <?=longdate_indo($date); ?> <br> <strong>Pukul :</strong> <?=date('H:i:s') ?>
      </center>
