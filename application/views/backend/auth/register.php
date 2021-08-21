<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title><?=$page?> - Absensi Online</title>
  <!--favicon-->
  <link rel="icon" href="<?=base_url('assets/backend/')?>images/favicon-32x32.png" type="image/png" />

  <link rel="stylesheet" href="<?=base_url('assets/backend/')?>plugins/notifications/css/lobibox.min.css" />
  <!-- loader-->
  <link href="<?=base_url('assets/backend/')?>css/pace.min.css" rel="stylesheet" />
  <script src="<?=base_url('assets/backend/')?>js/pace.min.js"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="<?=base_url('assets/backend/')?>css/bootstrap.min.css" />
  <!-- Icons CSS -->
  <link rel="stylesheet" href="<?=base_url('assets/backend/')?>css/icons.css" />
  <!-- App CSS -->
  <link rel="stylesheet" href="<?=base_url('assets/backend/')?>css/app.css" />
</head>

<body class="bg-register">
  <!-- wrapper -->
  <div class="wrapper">
    <div class="section-authentication-register d-flex align-items-center justify-content-center">
      <div class="row">
        <div class="col-12 col-lg-10 mx-auto">
          <div class="card radius-15">
            <div class="row no-gutters">
              <div class="col-lg-6">
                <div class="card-body p-md-5">
                  <div class="text-center">
                    <img src="<?=base_url('assets/backend/')?>images/logo-icon.png" width="80" alt="">
                    <h3 class="mt-4 font-weight-bold">Registrasi Akun</h3>
                  </div>
                  <?php $this->view('message'); ?>
                  <?php $attributes = array('onsubmit' => 'return tambah(this)');
                  echo form_open_multipart('auth/daftar',$attributes); ?>
                  <div class="form-group mt-4">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Zamghoni Mukhoxxx" autofocus required oninvalid="this.setCustomValidity('Masukkan Nama lengkap anda disini')" oninput="setCustomValidity('')">
                  </div>
                  <div class="form-group mt-4">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required oninvalid="this.setCustomValidity('Masukkan username anda disini')" oninput="setCustomValidity('')">
                  </div>
                  <div class="form-group">
                    <label>Kata Sandi</label>
                    <div class="input-group" id="show_hide_password">
                      <input class="form-control border-right-0" type="password" name="password" placeholder="*******" required
                        oninvalid="this.setCustomValidity('Masukkan kata sandi anda disini')" oninput="setCustomValidity('')">
                      <div class="input-group-append">	<a href="javascript:;" class="input-group-text bg-transparent border-left-0"><i class='bx bx-hide'></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="customCheck1">
                      <label class="custom-control-label" for="customCheck1">Saya membaca dan menyetujui Syarat & Ketentuan</label>
                    </div>
                  </div>
                  <div class="btn-group mt-3 w-100">
                    <button type="submit" name="Tambah" class="btn btn-primary btn-block">Register</button>
                    <button type="button" class="btn btn-primary"><i class="lni lni-arrow-right"></i>
                    </button>
                  </div>
                  <?php echo form_close(); ?>
                  <hr/>
                  <div class="text-center mt-4">
                    <p class="mb-0">Sudah punya akun? <a href="<?=site_url('auth')?>">Login Disini</a>
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <img src="<?=base_url('assets/backend/')?>images/login-images/register-frent-img.jpg" class="card-img login-img h-100" alt="...">
              </div>
            </div>
            <!--end row-->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end wrapper -->
  <!-- JavaScript -->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <!--notification js -->
  <script src="<?=base_url('assets/backend/')?>plugins/notifications/js/lobibox.min.js"></script>
  <script src="<?=base_url('assets/backend/')?>plugins/notifications/js/notifications.min.js"></script>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script src="<?=base_url('assets/backend/')?>js/jquery.min.js"></script> -->
  <!--Password show & hide js -->
  <script>
    $(document).ready(function () {
      $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("bx-hide");
          $('#show_hide_password i').removeClass("bx-show");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("bx-hide");
          $('#show_hide_password i').addClass("bx-show");
        }
      });
    });
  </script>
</body>

</html>
