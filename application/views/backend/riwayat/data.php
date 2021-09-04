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
      <table id="example2" class="table table-striped table-bordered" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Lengkap</th>
            <th>Absen Masuk</th>
            <th>Absen Pulang</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no=1;
          foreach($row->result()as $key => $data) {?>
            <tr>
              <td><?=$no?></td>
              <td><?=$data->nama_lengkap?></td>
              <td><?=$data->username?></td>
              <td><?php if ($data->role == 0) { ?>
                <a href="<?=site_url('user/admin/'.$data->id)?>" title="Klik untuk merubah"><span class='badge badge-secondary'>User</span></a>
              <?php } else { ?>
                <a href="<?=site_url('user/user/'.$data->id)?>" title="Klik untuk merubah"><span class='badge badge-primary'>Admin</span></a>
              <?php } ?></td>
              <td width="65px"><?php if($data->foto != null) { ?>
                <a href="<?=base_url('upload/foto/'.$data->foto)?>" data-lightbox="<?=$data->foto?>" class="btn btn-sm btn-outline-primary" title="Foto <?=ucfirst($data->username)?>">
                  <i class="bx bx-show-alt"></i></a><br>
                <?php } else { ?>
                  <i class="bx bx-hide"></i>
                <?php } ?>
              </td>
              <td class="actions-hover actions-fade">
                <a href="<?=site_url('user/edit/'.$data->id)?>" title="Edit" class="btn btn-sm btn-success"><i class="bx bx-edit"></i></a>
                <a href="<?=site_url('user/del/'.$data->id)?>" title="Hapus" class="btn btn-sm btn-danger hapus text-white"><i class="bx bx-trash"></i></a>
              </td>
            </tr>
            <?php
            $no++;
          } ?>
        </tbody>
        <tfoot>
          <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Username</th>
            <th>Role</th>
            <th>Foto</th>
            <th>Aksi</th>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
