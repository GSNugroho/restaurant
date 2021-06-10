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
            <h1 class="m-0">Tambah Stok Keluar</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Inventori</a></li>
              <li class="breadcrumb-item"><a href="#">Stok Keluar</a></li>
              <li class="breadcrumb-item active">Tambah Stok Keluar</li>
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
                <form action="<?php echo base_url().'Produk/tambah_stok_out_baru';?>" method="post" enctype="multipart/form-data" autocomplete="off">
                  <div class="col-sm-12">
                  <br>
                    <table>
                      <tr>
                        <td><button type="submit" class="btn btn-block btn-success">Simpan</button></td>
                        <td><a href="<?php echo base_url().'Administrator/stok_out'?>" type="button" class="btn btn-block btn-outline-danger">Batal</a></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                        <label>TANGGAL <span style="color: red;">*</span></label>
                        <input class="form-control" type="text" name="tgl_stok_out" id="tgl_stok_out" style="width: 80%">
                    </div>
                    <div class="form-group">
                        <label>CATATAN </label>
                        <textarea class="form-control" rows="5" style="width: 80%;" id="catatan" name="catatan"></textarea>
                    </div>
                  </div>
                  <div class="col-12">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>NAMA PRODUK <span style="color: red;">*</span></th>
                                <th>JUMLAH <span style="color: red;">*</span></th>
                                <th>SATUAN</th>
                                <th>NILAI STOK</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td><div class="form-group"><input class="form-control" type="text" id="produk_nm" name="produk_nm[]"></div></td>
                                <td><div class="form-group"><input class="form-control" type="text" id="produk_jml" name="produk_jml[]"></div></td>
                                <td><span id="produk_satuan" name="produk_satuan"></span></td>
                                <td><div class="form-group"><input class="form-control" type="text" id="produk_harga" name="produk_harga[]"></div></td>
                                <td><a href="#">Hapus</a></td>
                            </tr>
                        </thead>
                        <tbody id="produk_lain">
                        </tbody>
                        <tfooter>
                            <tr>
                                <td><button type="button" class="btn btn-secondary" id="button_tambah">Tambah Produk</button></td>
                            </tr>
                        </tfooter>
                    </table>
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
        var count = 1;
        var wrapper = $('#produk_lain');
        $('#button_tambah').on('click', function(){
            count += 1;
            $(wrapper).append(`
                <tr>
                    <td><div class="form-group"><input class="form-control" type="text" id="produk_nm" name="produk_nm[]"></div></td>
                    <td><div class="form-group"><input class="form-control" type="text" id="produk_jml" name="produk_jml[]"></div></td>
                    <td><span id="produk_satuan" name="produk_satuan"></span></td>
                    <td><div class="form-group"><input class="form-control" type="text" id="produk_harga" name="produk_harga[]"></div></td>
                    <td><a href="#" class="remove_field" style="color: red;">Hapus</a></td>
                </tr>
            `);

            $(wrapper).on("click",".remove_field", function(e){
              e.preventDefault(); $(this).closest('tr').remove(); count--;
            })
        })

        $('#tgl_stok_out').datetimepicker({
			locale: 'id',
			format: 'DD-MM-YYYY HH:mm'
		})

      $('#kategori').select2({
        placeholder: "Select a state",
        theme:'bootstrap4',
        escapeMarkup: function (markup) { return markup; },
        language: {
            noResults: function () {
                 return '<button class="btn btn-block btn-secondary" id="btn_tambah_kategori" onclick="tambah()">Tambah Kategori</button>';
            }
        }
      })

    });
    
    function tambah(){
      var kategori_baru = $('.select2-search__field').val();
      
      var dataString = 'kategori_nama='+kategori_baru;
      $.post("<?php echo base_url().'Kategori/tambah_kategori'?>", dataString, function(data){

      })
    }
    </script>
  </div>
<?php $this->load->view('mainmenu/admin_footer'); ?>