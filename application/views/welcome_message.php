<!DOCTYPE html>
<html>
  <head>
    <title>Masuk</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url().'assets/css/adminlte.min.css'?>" rel="stylesheet">
    
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url().'assets/plugins/fontawesome-free/css/all.min.css'?>">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	
   
  </head>
  <body class="hold-transition login-page">
	<div class="login-box">
	<!-- /.login-logo -->
	<div class="card card-outline card-secondary">
		<div class="card-body">
		<?php
			if($this->session->flashdata('error')){ ?>
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<?= $this->session->flashdata('error');?>
				</div>
		<?php
			}
		?>
		<p class="login-box-msg">Sign in to start your session</p>

		<form action="<?php echo base_url().'Welcome/cek_user'?>" method="post">
			<div class="input-group mb-3">
			<input class="form-control" type="text" name="username" placeholder="Username" required>
			<div class="input-group-append">
				<div class="input-group-text">
				<span class="fas fa-envelope"></span>
				</div>
			</div>
			</div>
			<div class="input-group mb-3">
			<input class="form-control" type="password" name="password" placeholder="Password" required>
			<div class="input-group-append">
				<div class="input-group-text">
				<span class="fas fa-lock"></span>
				</div>
			</div>
			</div>
			<div class="row">
			<div class="col-4">
				<button type="submit" class="btn btn-secondary btn-block">Sign In</button>
			</div>
			</div>
		</form>

		<p class="mb-1">
			<!-- <a href="forgot-password.html">I forgot my password</a> -->
		</p>
		</div>
		<!-- /.card-body -->
	</div>
	<!-- /.card -->
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?php echo base_url().'assets/plugins/jquery/jquery.min.js'?>"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url().'assets/plugins/bootstrap/js/bootstrap.bundle.min.js'?>"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url().'assets/js/adminlte.min.js'?>"></script>
	<script>
		if ("serviceWorker" in navigator) {
            window.addEventListener("load", function() {
                navigator.serviceWorker
                .register("service-worker.js")
                .then(function () {
                    console.log("Pendaftaran service worker berhasil.");
                })
                .catch(function() {
                    console.log("Pendaftaran service worker gagal.");
                });
            });
        } else {
            console.log("Service worker belum didukung oleh browser");
        }
	</script>
	</body>
</html>