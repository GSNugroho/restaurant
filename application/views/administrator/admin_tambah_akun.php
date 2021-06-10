<?php $this->load->view('mainmenu/admin_header');?>
<!-- Content Wrapper. Contains page content -->
<!-- select2 css-->
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/select2/css/select2.min.css'?>">
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'?>">
<!-- dropzone css -->
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/dropzone/min/dropzone.min.css'?>">
<!-- select2 js -->
<script src="<?php echo base_url().'assets/plugins/select2/js/select2.full.min.js'?>"></script>
<!-- dadtepicker -->
<script src="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.js'?>"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Pengaturan</a></li>
              <li class="breadcrumb-item"><a href="#">User</a></li>
              <li class="breadcrumb-item active">Tambah User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
                <form action="<?php echo base_url().'Administrator/tambah_akun_baru';?>" method="post" enctype="multipart/form-data" autocomplete="off">
                  <div class="col-sm-12">
                  <br>
                    <table>
                      <tr>
                        <td><button type="submit" class="btn btn-block btn-success">Simpan</button></td>
                        <td><a href="<?php echo base_url().'Administrator/akun'?>" type="button" class="btn btn-block btn-outline-danger">Batal</a></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                        <label>USERNAME <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="username" id="username" style="width: 80%">
                    </div>
                    <div class="form-group">
                        <label>NAMA USER </label>
                        <input class="form-control" type="text" name="username_nama" id="username_nama" style="width: 80%">
                    </div>
                    <div class="form-group">
                        <label>PASSWORD</label>
                        <input class="form-control" type="text" name="username_pass" id="username_pass" style="width: 80%">
                    </div>
                    <div class="form-group">
                        <label>USER LEVEL</label>
                        <select class="form-control" name="username_level" id="username_level" style="width: 80%">
                            <option value=''>-- PILIH --</option>
                            <option value='10'>DAPUR KOTOR</option>
                            <option value='11'>DAPUR BERSIH</option>
                            <option value='12'>KASIR</option>
                        </select>
                    </div>
                  </div>
                </form>
              <!-- /.card -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    <script>
    $(document).ready(function(){
        

    });
    </script>
  </div>
<?php $this->load->view('mainmenu/admin_footer'); ?>