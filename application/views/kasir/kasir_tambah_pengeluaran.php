<?php $this->load->view('mainmenu/admin_header');?>
<!-- Content Wrapper. Contains page content -->
<!-- select2 css-->
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/select2/css/select2.min.css'?>">
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'?>">
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'?>">
<!-- dropzone css -->
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/dropzone/min/dropzone.min.css'?>">
<!-- select2 js -->
<script src="<?php echo base_url().'assets/plugins/select2/js/select2.full.min.js'?>"></script>
<!-- dadtepicker -->
<script src="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/moment/moment.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/inputmask/jquery.inputmask.min.js'?>"></script>
<script src="<?php echo base_url().'assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js'?>"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Pengeluaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Pengeluaran</a></li>
              <li class="breadcrumb-item active">Tambah Pengeluaran</li>
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
                <form action="<?php echo base_url().'Kasir/tambah_pengeluaran_baru';?>" method="post" enctype="multipart/form-data" autocomplete="off">
                  <div class="col-sm-12">
                  <br>
                    <table>
                      <tr>
                        <td><button type="submit" class="btn btn-block btn-success">Simpan</button></td>
                        <td><a href="<?php echo base_url().'Kasir/pengeluaran'?>" type="button" class="btn btn-block btn-outline-danger">Batal</a></td>
                      </tr>
                    </table>
                  </div>
                  <div class="col-6">
                    <div class="form-group">
                        <label>TANGGAL <span style="color: red;">*</span></label>
                        <div class="input-group date" id="tgl_stok_in" data-target-input="nearest" style="width: 80%">
                          <input class="form-control" type="text" name="tgl_stok_in" id="tgl_stok_in" >
                          <div class="input-group-append" data-target="#tgl_stok_in" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                    </div>
                    </div>
                    <div class="form-group">
                        <label>CATATAN </label>
                        <textarea class="form-control" rows="5" style="width: 80%;" id="catatan" name="catatan"></textarea>
                    </div>
                    <div class="form-group">
                      <label>JENIS PENGELUARAN</label>
                      <select class="form-control" name="jns_pengeluaran" id="jns_pengeluaran" style="width: 80%;">
                        <option value="0">--Pilih--</option>
                        <option value="1">Kebutuhan Dapur</option>
                        <option value="2">Operasional Restoran</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-12" id="operasional_restorant" style="display: none;">
                    <table class="table table-borderless">
                      <thead>
                        <tr>
                          <th>Nama</th>
                          <th>Jenis Saldo</th>
                          <th>Jumlah Saldo</th>
                          <th>Keterangan</th>
                        </tr>
                        <tr>
                          <td>
                              <div class="form-group">
                                <select class="form-control" id="nm_biaya" name="nm_biaya[]">
                                  <option value="">--- ---</option>
                                  <?php
                                    foreach($pos->result_array() as $row){
                                      echo '<option value="'.$row['kd_pos'].'">'.$row['nm_pos'].'</option>';
                                    }
                                  ?>
                                </select>
                              </div>
                          </td>
                          <td>
                              <div class="form-group">
                                <select class="form-control" id="jns_saldo" name="jns_saldo[]">
                                    <optoin value="">--- ---</optoin>
                                    <option value="1">Uang Keluar</option>
                                    <option value="2">Uang Masuk</option>
                                </select>
                              </div>
                          </td>
                          <td>
                              <div class="form-group">
                                <input class="form-control" type="text" id="jml_saldo" name="jml_saldo[]" placeholder="Rp 0">
                              </div>
                          </td>
                          <td>
                              <div class="form-group">
                                <input class="form-control" type="text" id="ket_saldo" name="ket_saldo[]">
                              </div>
                          </td>
                        </tr>
                      </thead>
                      <tbody id="biaya_lain">
                      </tbody>
                      <tfooter>
                          <tr>
                              <td><button type="button" class="btn btn-secondary" id="button_tambah_biaya">Tambah Biaya</button></td>
                          </tr>
                      </tfooter>
                    </table>
                  </div>
                  <div class="col-12" id="kebutuhan_dapur" style="display: none;">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>NAMA PRODUK <span style="color: red;">*</span></th>
                                <th>JUMLAH <span style="color: red;">*</span></th>
                                <th>SATUAN</th>
                                <th >HARGA BELI PER UNIT</th>
                                <th >TOTAL HARGA BELI</th>
                                <th></th>
                            </tr>
                            <tr>
                                <td>
                                  <div class="form-group">
                                    <select class="form-control" id="produk_nm" name="produk_nm[]">
                                      <option value="">--- ---</option>
                                      <?php
                                        foreach($produk->result_array() as $row){
                                          echo '<option value="'.$row['produk_id'].'">'.$row['produk_nama'].'</option>';
                                        }
                                      ?>
                                    </select>
                                  </div>
                                </td>
                                <td>
                                  <div class="form-group">
                                    <input class="form-control" type="text" id="produk_jml" name="produk_jml[]" value='1' style="text-align: right;">
                                  </div>
                                </td>
                                <td>
                                  <span id="produk_satuan" name="produk_satuan"></span>
                                </td>
                                <td>
                                  <div class="form-group">
                                    <input class="form-control" type="input" id="produk_harga" name="produk_harga[]" style="text-align: right;" value="0">
                                  </div>
                                </td>
                                <td style="text-align: right;">
                                  <span id="produk_harga_total" name="produk_harga_total"></span>
                                </td>
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
    function uang(uang){
        var reverse = uang.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan
    }

    $(document).ready(function(){
      $('#tgl_stok_in').datetimepicker({
          format: 'DD-MM-YYYY',
          locale: 'id'
      });

      $('#jns_pengeluaran').on('change', function(){
        var x = $('#jns_pengeluaran option:selected').val();

        if(x != 0){
          if(x == 1){
            $('#kebutuhan_dapur').show();
            $('#operasional_restorant').hide();
          }else{
            $('#kebutuhan_dapur').hide();
            $('#operasional_restorant').show();
          }
        }else{
          $('#kebutuhan_dapur').hide();
          $('#operasional_restorant').hide();
        }
      })

        $('#produk_nm').on('change', function(){
            var id = $('#produk_nm option:selected').val();

            var dataString = 'id='+id;
            $.get("<?php echo base_url().'Produk/get_detail_produk_pilih'?>", dataString, function(data){
                $('#produk_satuan').html(data[0].produk_satuan);
                $('#produk_harga').val(data[0].produk_harga);

                var jml = $('#produk_jml').val();
                $('#produk_harga_total').html(uang(parseInt(data[0].produk_harga) * parseInt(jml)));
            }, 'json');
        });

        $('#produk_jml').on('keyup', function(){
            if($('#produk_jml').val() != ''){
                var jml = $('#produk_jml').val();
                var harga = $('#produk_harga').val();
                $('#produk_harga_total').html(uang(parseInt(harga) * parseInt(jml)));
            }else{
                $('#produk_jml').val(0);
                $('#produk_harga_total').html(0);
            }
        })

        $('#produk_harga').on('keyup', function(){
            if($('#produk_jml').val() != ''){
                var jml = $('#produk_jml').val();
                var harga = $('#produk_harga').val();
                $('#produk_harga_total').html(uang(parseInt(harga) * parseInt(jml)));
            }else{
                $('#produk_jml').val(0);
                $('#produk_harga_total').html(0);
            }
        })

        var count = 1;
        var wrapper = $('#produk_lain');
        $('#button_tambah').on('click', function(){
            count += 1;
            $(wrapper).append(`
                <tr>
                    <td>
                        <div class="form-group">
                            <select class="form-control" id="produk_nm${count}" name="produk_nm[]">
                            </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <input class="form-control" type="text" id="produk_jml${count}" name="produk_jml[]" style="text-align: right;" value="1">
                        </div>
                    </td>
                    <td>
                        <span id="produk_satuan${count}" name="produk_satuan"></span>
                    </td>
                    <td>
                        <div class="form-group">
                            <input class="form-control" type="input" id="produk_harga${count}" name="produk_harga[]" style="text-align: right;" value="0">
                        </div>
                    </td>
                    <td style="text-align: right;">
                        <span id="produk_harga_total${count}" name="produk_harga_total"></span>
                    </td>
                    <td>
                        <a href="#" class="remove_field" style="color: red;">
                            <i class="nav-icon fas fa-trash text-danger"></i>
                        </a>
                    </td>
                </tr>
            `);

            $.get("<?php echo base_url().'Produk/get_semua_stok_kotor'?>", function(data){
                var html = '<option value="">--- ---</option>';
                var i;

                for(i=0; i<data.produk.length; i++){
                    html += `<option value='${data.produk[i].produk_id}'>${data.produk[i].produk_nama}</option>`;
                }

                $('#produk_nm'+count).html(html);
            }, 'json')

            $('#produk_nm'+count).on('change', function(){
                var id = $('#produk_nm'+count).val();

                var dataString = 'id='+id;
                $.get("<?php echo base_url().'Produk/get_detail_produk_pilih'?>", dataString, function(data){
                    $('#produk_satuan'+count).html(data[0].produk_satuan);
                    $('#produk_harga'+count).val(data[0].produk_harga);

                    var jml = $('#produk_jml'+count).val();
                    $('#produk_harga_total'+count).html(uang(parseInt(data[0].produk_harga) * parseInt(jml)));
                }, 'json');
            });

            $('#produk_jml'+count).on('keyup', function(){
                if($('#produk_jml'+count).val() != ''){
                    var jml = $('#produk_jml'+count).val();
                    var harga = $('#produk_harga'+count).val();
                    $('#produk_harga_total'+count).html(uang(parseInt(harga) * parseInt(jml)));
                }else{
                    $('#produk_jml'+count).val(0);
                    $('#produk_harga_total'+count).html(0);
                }
            })

            $('#produk_harga'+count).on('keyup', function(){
                if($('#produk_jml'+count).val() != ''){
                    var jml = $('#produk_jml'+count).val();
                    var harga = $('#produk_harga'+count).val();
                    $('#produk_harga_total'+count).html(uang(parseInt(harga) * parseInt(jml)));
                }else{
                    $('#produk_jml'+count).val(0);
                    $('#produk_harga_total'+count).html(0);
                }
            })

            $(wrapper).on("click",".remove_field", function(e){
              e.preventDefault(); $(this).closest('tr').remove(); count--;
            })
        })

        var raw = 1;
        var wrapper = $('#biaya_lain');
        $('#button_tambah_biaya').on('click', function(){
            raw += 1;
            $(wrapper).append(`
                  <tr>
                    <td>
                        <div class="form-group">
                          <select class="form-control" id="nm_biaya${raw}" name="nm_biaya[]">
                          </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                          <select class="form-control" id="jns_saldo${raw}" name="jns_saldo[]">
                              <optoin value="">--- ---</optoin>
                              <option value="1">Uang Keluar</option>
                              <option value="2">Uang Masuk</option>
                          </select>
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                          <input class="form-control" type="text" id="jml_saldo${raw}" name="jml_saldo[]" placeholder="Rp 0">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                          <input class="form-control" type="text" id="ket_saldo${raw}" name="ket_saldo[]">
                        </div>
                    </td>
                    <td>
                        <a href="#" class="remove_field" style="color: red;">
                            <i class="nav-icon fas fa-trash text-danger"></i>
                        </a>
                    </td>
                </tr>
            `);

            $.get("<?php echo base_url().'Kasir/get_semua_pos'?>", function(data){
                var html = '<option value="">--- ---</option>';
                var i;

                for(i=0; i<data.pos.length; i++){
                    html += `<option value='${data.pos[i].kd_pos}'>${data.pos[i].nm_pos}</option>`;
                }

                $('#nm_biaya'+raw).html(html);
            }, 'json')

            $(wrapper).on("click",".remove_field", function(e){
              e.preventDefault(); $(this).closest('tr').remove(); raw--;
            })
        })

        $('#tgl_stok_in').datetimepicker({
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