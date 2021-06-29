<?php $this->load->view('mainmenu/admin_header');?>
<!-- Content Wrapper. Contains page content -->
<!-- select2 css-->
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/select2/css/select2.min.css'?>">
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'?>">
<!-- dropzone css -->
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/dropzone/min/dropzone.min.css'?>">
<!-- select2 js -->
<script src="<?php echo base_url().'assets/plugins/select2/js/select2.full.min.js'?>"></script>
<!-- dropzone js -->
<script src="<?php echo base_url().'assets/plugins/dropzone/min/dropzone.min.js'?>"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Produk</a></li>
              <li class="breadcrumb-item active">Tambah Produk</li>
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
                <form action="<?php echo base_url().'Produk/tambah_produk_baru';?>" method="post" enctype="multipart/form-data" autocomplete="off">
                  <div class="col-sm-12">
                  <br>
                    <table>
                      <tr>
                        <td><button type="submit" class="btn btn-block btn-success">Simpan</button></td>
                        <td><a href="<?php echo base_url().'Administrator/produk'?>" type="button" class="btn btn-block btn-outline-danger">Batal</a></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                      <label>NAMA PRODUK <span style="color: red;">*</span></label>
                      <input type="text" class="form-control" id="nm_produk" name="nm_produk" style="width: 80%;">
                    </div>
                    <div class="form-group">
                      <label>KATEGORI</label>
                      <select class="form-control" name="kategori" id="kategori" style="width: 80%">
                      <?php
                        foreach($kategori->result_array() as $row)
                        {
                          echo '<option value="'.$row['kategori_id'].'">'.$row['kategori_nama'].'</option>';
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>HARGA</label>
                      <input type="text" class="form-control" id="harga" name="harga" style="width: 80%;">
                    </div>
                    <div class="form-group">
                      <label>SKU</label>
                      <input type="text" class="form-control" id="sku" name="sku" style="width: 80%;">
                    </div>
                    <div class="form-group">
                      <label>SATUAN STOK</label>
                      <input type="text" class="form-control" id="satuan" name="satuan" style="width: 80%;">
                    </div>
                    <div class="form-group">
                      <label>FOTO PRODUK</label>
                      <div class="dropzone" id="foto" style="width: 200px;">
                          <div class="dz-message">
                              <h5 style="color: #6c757d">Unggah Foto</h5>
                          </div>
                      </div>
                      <p style="color: red;">* Maksimal 1 MB</p>
                    </div>
                </div>
                <div class="col-12">
                  <div id="accordion">
                    <div class="card card-secondary">
                      <div class="card-header">
                        <h4 class="card-title w-100">
                          <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                            Pengaturan Lanjutan (OPTIONAL)
                          </a>
                        </h4>
                      </div>
                      <div id="collapseOne" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                          <div class="col-6">
                            <div class="form-group">
                              <label>PRODUK INI DIJUAL</label>
                              <div class="custom-control custom-radio">
                                <input class="custom-control-input custom-control-input-secondary custom-control-input-outline" type="radio" id="dijualya" name="jual_produk" value='1' checked>
                                <label for="dijualya" class="custom-control-label">YA</label>
                              </div>
                              <div class="custom-control custom-radio">
                                <input class="custom-control-input custom-control-input-secondary custom-control-input-outline" type="radio" id="dijualtidak" name="jual_produk" value='0' >
                                <label for="dijualtidak" class="custom-control-label">TIDAK</label>
                              </div>
                            </div>
                            <div class="form-group">
                              <label>KELOLA STOK</label>
                              <div class="custom-control custom-radio">
                                <input class="custom-control-input custom-control-input-secondary custom-control-input-outline" type="radio" id="stokya" name="stok_produk" value='1'>
                                <label for="stokya" class="custom-control-label">YA</label>
                              </div>
                              <div class="custom-control custom-radio">
                                <input class="custom-control-input custom-control-input-secondary custom-control-input-outline" type="radio" id="stoktidak" name="stok_produk" value='0' checked>
                                <label for="stoktidak" class="custom-control-label">TIDAK</label>
                              </div>
                            </div>
                            <div class="form-group">
                              <label>DESKRIPSI PRODUK</label>
                              <textarea class="form-control" rows="5" style="width: 80%;" id="deskripsi" name="diskripsi"></textarea>
                            </div>
                            <div class="form-group">
                              <label>PRODUK DAPAT DIHITUNG</label>
                              <select class="form-control" name="produk_count" id="produk_count" style="width: 80%">
                                <option value="1">Ya</option>
                                <option value="0">Tidak</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>JENIS PRODUK</label>
                              <select class="form-control" name="jenis_produk" id="jenis_produk" style="width: 80%">
                                <option value="1">Tunggal</option>
                                <option value="2">Komposit</option>
                              </select>
                            </div>
                            <div id="resep" style="display: none;">
                              <table>
                                <thead>
                                  <tr>
                                    <th>Bahan Baku</th>
                                    <th></th>
                                    <th style="text-align: right;">Jumlah / Porsi</th>
                                  </tr>
                                  <tr>
                                    <td>
                                      <select class="form-control" name="resep_bb[]" id="resep_bb">
                                        <option>--- ---</option>
                                      </select>
                                    </td>
                                    <td>&nbsp;&nbsp;</td>
                                    <td>
                                      <input class="form-control" name="resep_jml[]" id="resep_jml" style="text-align: right;">
                                    </td>
                                  </tr>
                                </thead>
                                <tbody id="resep_lain">
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <td>&nbsp;</td>
                                  </tr>
                                  <tr>
                                    <td><button type="button" class="btn btn-secondary" id="button_tambah">Tambah Bahan Baku</button></td>
                                  </tr>
                                </tfoot>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
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

      $('#jenis_produk').on('change', function(){
        if($('#jenis_produk option:selected').val() == 2){
          $('#resep').show();
        }else{
          $('#resep').hide();
        }
      });

      $.get("<?php echo base_url().'Bersih/get_semua_stok_kotor'?>", function(data){
          var html = '<option value="">--- ---</option>';
          var i;

          for(i=0; i<data.produk.length; i++){
              html += `<option value='${data.produk[i].produk_id}'>${data.produk[i].produk_nama}</option>`;
          }

          $('#resep_bb').html(html);
      }, 'json')

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

      // tambah resep
      var count = 1;
      var wrapper = $('#resep_lain');
      $('#button_tambah').on('click', function(){
        count += 1;
        $(wrapper).append(`
          <tr>
            <td>
              <select class="form-control" name="resep_bb[]" id="resep_bb${count}">
                <option>--- ---</option>
              </select>
            </td>
            <td>&nbsp;&nbsp;</td>
            <td>
              <input class="form-control" name="resep_jml[]" id="resep_jml${count}" style="text-align: right;">
            </td>
          </tr>
        `);

        $.get("<?php echo base_url().'Bersih/get_semua_stok_kotor'?>", function(data){
            var html = '<option value="">--- ---</option>';
            var i;

            for(i=0; i<data.produk.length; i++){
                html += `<option value='${data.produk[i].produk_id}'>${data.produk[i].produk_nama}</option>`;
            }

            $('#resep_bb'+count).html(html);
        }, 'json')

      });
    });
    
    function tambah(){
      var kategori_baru = $('.select2-search__field').val();
      
      var dataString = 'kategori_nama='+kategori_baru;
      $.post("<?php echo base_url().'Kategori/tambah_kategori'?>", dataString, function(data){
        var html = '';
        
        for(var i = 0; i < data.kategori.length; i++){
          html += `<option val="${data.kategori[i].kategori_id}">${data.kategori[i].kategori_nama}</option>`
        }

        var length = data.kategori.length;

        var pilih = length - 1;
        $('#kategori').select2('close');
        $("#kategori").empty().trigger('change');
        $('#kategori').html(html);
        $('#kategori').trigger('change');
      }, 'json');
    }

    Dropzone.autoDiscover = false;

		var p_file = new Dropzone("#foto",{
		url: "<?php echo base_url('Produk/proses_upload_foto_produk') ?>",
		maxFilesize: 209715200,
		timeout: 0,
		method:"post",
		acceptedFiles:"image/jpeg",
		paramName:"userfile",
		dictInvalidFileType:"Type file ini tidak dizinkan",
		addRemoveLinks:true,
		autoProcessQueue: true,
    addRemoveLinks: true,
		success: function (file, response) {
				
		},
    removedfile: function(file) {
    var name = file.name;        
    $.ajax({
        type: 'POST',
        url: '<?php echo base_url('Produk/hapus_upload_foto_produk')?>',
        data: "id="+name,
        dataType: 'html'
    });
    var _ref;
    return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;        
    }
		});
    </script>
  </div>
<?php $this->load->view('mainmenu/admin_footer'); ?>