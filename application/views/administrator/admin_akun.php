<?php $this->load->view('mainmenu/admin_header');?>
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'?>">
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'?>">
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'?>">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pengaturan <i class="fas fa-angle-right right"></i> User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pengaturan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="row">
                <div class="col-2">
                    <!-- <button class="btn btn-block btn-outline-secondary">Tambah Akun</button> -->
                    <a href="<?php echo base_url().'Administrator/tambah_akun'?>" class="btn btn-block btn-outline-secondary">Tambah Akun</a>
                </div>
            </div>
            <br>
            <div class="card card-secondary card-tabs">
              <div class="card-body">
                    <table id="tbl_user" class="table table-borderless table-striped responsive">
                        <thead>
                            <tr>
                                <th class="text-left">KODE USER</th>
                                <th class="text-left">USERNAME</th>
                                <th class="text-left">NAMA USER</th>
                                <th class="text-left">USER LEVEL</th>
                                <th class="text-left">USER AKTIF</th>
                            </tr>
                        </thead>
                    </table>
                    </div>
                </div>
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
    $(document).ready(function() {
        var table = $('#tbl_user').DataTable({
            language: {
                "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
                "sProcessing": "Sedang memproses...",
                "sLengthMenu": "Tampilkan _MENU_ entri",
                "sZeroRecords": "Tidak ditemukan data yang sesuai",
                "sInfo": "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                "sInfoEmpty": "Menampilkan 0 sampai 0 dari 0 entri",
                "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                "sInfoPostFix": "",
                "sSearch": "Cari:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Pertama",
                    "sPrevious": "Sebelumnya",
                    "sNext": "Selanjutnya",
                    "sLast": "Terakhir"
                }
            },
            'order': [
                [0, "asc"]
            ],
            'processing': true,
            "responsive": true,
            'serverSide': true,
            'serverMethod': 'post',
            'ajax': {
                'url': '<?php echo base_url().'Administrator/tbl_user'?>',
            },
            'columns': [
                {
                    data: 'user_id'
                },
                {
                    data: 'user_username'
                },
                {
                    data: 'user_nama'
                },
                {
                    data: 'user_level'
                },
                {
                    data: 'user_status'
                }
            ]
        });
    });
</script>
<?php $this->load->view('mainmenu/admin_footer'); ?>
  </div>
