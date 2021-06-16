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
            <h1 class="m-0">Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Produk</li>
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
                    <a class="btn btn-block btn-secondary" href="<?php echo base_url().'Produk/tambah_produk'?>">Tambah Produk</a>
                </div>
                <!-- <div class="col-2">
                    <a class="btn btn-block btn-secondary" href="<?php echo base_url().'Kategori/tambah_kategori'?>">Tambah Kategori</a>
                </div>
                 <div class="col-2">
                    <button class="btn btn-block btn-outline-secondary">Ekspor Produk</button>
                </div>
                <div class="col-2">
                    <button class="btn btn-block btn-outline-secondary">Import Produk</button>
                </div> -->
            </div>
            <br>
            <div class="card card-secondary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-five-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-five-overlay-tab" data-toggle="pill" href="#semuaproduk" role="tab" aria-controls="custom-tabs-five-overlay" aria-selected="true">Produk</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-five-overlay-dark-tab" data-toggle="pill" href="#custom-tabs-five-overlay-dark" role="tab" aria-controls="custom-tabs-five-overlay-dark" aria-selected="false">Kategori</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-five-tabContent">
                    <div class="tab-pane fade show active" id="semuaproduk" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-tab">
                    <div class="row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="kategori_produk">Kategori</label>
                                <select class="form-control" id="kategori_produk" name="kategori_produk">
                                    <option value="">Semua Kategori</option>
                                    <?php
                                      foreach($kategori->result_array() as $row)
                                      {
                                        echo '<option value="'.$row['kategori_id'].'">'.$row['kategori_nama'].'</option>';
                                      }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label for="sts_jual_produk">Status Jual</label>
                                <select class="form-control" id="sts_jual_produk" name="sts_jual_produk">
                                    <option value="">Semua Status</option>
                                    <option value="0">Tidak Dijual</option>
                                    <option value="1">Dijual</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label>Cari</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="cari_produk" name="cari_produk">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                    </div>
                    <table id="tbl_produk" class="table table-borderless table-striped">
                        <thead>
                          <tr>
                              <th style="display: none">produk_id</th>
                              <th class="text-left">PRODUK</th>
                              <th class="text-left">KATEGORI</th>
                              <th class="text-right">HARGA</th>
                              <th></th>
                          </tr>
                        </thead>
                    </table>
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-five-overlay-dark" role="tabpanel" aria-labelledby="custom-tabs-five-overlay-dark-tab">
                    <table id="tbl_kategori" class="table table-borderless table-striped" style="width: 100%;">
                      <thead>
                        <tr>
                          <th style="display:none">kategori_id</th>
                          <th class="text-left">NAMA KATEGORI</th>
                          <th class="text-left">JUMLAH PRODUK</th>
                        </tr>
                      </thead>
                    </table>
                    </div>
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
  </div>
  <script>
  $(document).ready(function() {
      setInterval(function(){ 
        $('#tbl_produk').DataTable().ajax.reload();
      }, 10000);

      var table = $('#tbl_produk').DataTable({
          language: {
              "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
              "sProcessing": "Sedang memproses...",
              "sLengthMenu": "Tampilkan Data _MENU_",
              "sZeroRecords": "Tidak ditemukan data yang sesuai",
              "sInfo": "Total _TOTAL_ entri",
              "sInfoEmpty": "Total 0 entri",
              "sInfoFiltered": "",
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
              [1, "desc"]
          ],
          'processing': true,
          "responsive": true,
          'serverSide': true,
          "searching": false,
          'serverMethod': 'post',
          'ajax': {
              'url': '<?php echo base_url().'Produk/tbl_produk'?>',
              'data': function(data){
                var kategori_produk = $('#kategori_produk option:selected').val();
                var sts_jual_produk = $('#sts_jual_produk option:selected').val();
                var cari_produk = $('#cari_produk').val();

                data.searchKategori = kategori_produk;
                data.searchJual = sts_jual_produk;
                data.searchCari = cari_produk;
              }
          },
          "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false
            }
          ],
          'columns': [
              {
                  data: 'produk_id'
              },
              {
                  data: 'produk_nama'
              },
              {
                  data: 'produk_kategori'
              },
              {
                  data: 'produk_harga', className: 'text-right'
              },
              {
                  data: 'cek', className: 'text-right'
              }
          ]
      });

      $('#kategori_produk').on('change', function(){
        $('#tbl_produk').DataTable().ajax.reload();
      });

      $('#sts_jual_produk').on('change', function(){
        $('#tbl_produk').DataTable().ajax.reload();
      });
      
      $('#cari_produk').on('keyup', function(){
        $('#tbl_produk').DataTable().ajax.reload();
      });

      var table2 = $('#tbl_kategori').DataTable({
          language: {
              "sEmptyTable": "Tidak ada data yang tersedia pada tabel ini",
              "sProcessing": "Sedang memproses...",
              "sLengthMenu": "Tampilkan Data _MENU_",
              "sZeroRecords": "Tidak ditemukan data yang sesuai",
              "sInfo": "Total _TOTAL_ entri",
              "sInfoEmpty": "Total 0 entri",
              "sInfoFiltered": "",
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
              [1, "desc"]
          ],
          'processing': true,
          "responsive": true,
          'serverSide': true,
          "searching": false,
          'serverMethod': 'post',
          'ajax': {
              'url': '<?php echo base_url().'Produk/tbl_kategori'?>',
          },
          "columnDefs": [
            {
                "targets": [ 0 ],
                "visible": false
            }
          ],
          'columns': [
              {
                  data: 'kategori_id'
              },
              {
                  data: 'kategori_nama'
              },
              {
                  data: 'kategori_jumlah', className: 'text-right'
              }
          ]
      });
  });
</script>

<!-- Modal -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">DETAIL PRODUK : </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-borderless table-striped">
                <tr>
                  <td>Nama</td>
                  <td>:</td>
                  <td><p id="produk_nama" style="margin: 0;"></p></td>
                </tr>
                <tr>
                  <td>Kategori</td>
                  <td>:</td>
                  <td><p id="produk_kategori" style="margin: 0;"></p></td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td>:</td>
                  <td><p id="produk_harga" style="margin: 0;"></p></td>
                </tr>
                <tr>
                  <td>Satuan</td>
                  <td>:</td>
                  <td><p id="produk_satuan" style="margin: 0;"></p></td>
                </tr>
                <tr>
                  <td>Gambar</td>
                  <td>:</td>
                  <td><p id="produk_gambar" style="margin: 0"></p></td>
                </tr>
              </table>
              <br>
              <br>
              <div id="resep_bb">
                <table id="resep" class="table table-bordered" style="display: none;">
                  <thead>
                    <tr>
                      <th style="text-align: right;">No.</th>
                      <th>Nama Bahan Baku</th>
                      <th style="text-align: right;">Jumlah Takaran</th>
                    </tr>
                  </thead>
                  <tbody id="resep-isi">
                  </tbody>
                </table>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <script>
        function uang(uang){
            var reverse = uang.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return ribuan
        }

        $('#modal-default').on('show.bs.modal', function(event) {
          var button = $(event.relatedTarget)
          var recipient = button.data('whatever')
          var modal = $(this);
          var dataString = 'id=' + recipient
          $.get('<?php echo base_url('Produk/get_detail_produk')?>', dataString, function(data){
              $('#produk_nama').html(data.detail[0].produk_nama);
              $('#produk_kategori').html(data.detail[0].produk_kategori);
              $('#produk_harga').html(uang(data.detail[0].produk_harga));
              $('#produk_satuan').html(data.detail[0].produk_satuan);
              $('#produk_gambar').html(data.detail[0].produk_gambar);
              var foto = data.detail[0].produk_gambar;
              var dataFoto = 'id='+foto;
              $.get('<?php echo base_url('Produk/get_foto_produk')?>', dataFoto, function(html){
                $('#produk_gambar').html(html);
              })
              $('#resep').hide();
              var pid = data.detail[0].produk_id;
              var dataResep = 'id='+pid;
              $.get('<?php echo base_url('Produk/get_resep_produk')?>', dataResep, function(data){
                var html = ''
                
                for(var i = 0; i < data.resep.length; i++){
                  html += `
                    <tr>
                      <td style="text-align: right;">${i+1}.</td>
                      <td>${data.resep[i].produk_nama}</td>
                      <td style="text-align: right;">${data.resep[i].produk_jml}</td>
                    </tr>
                  `;
                }
                if(html != ''){
                  $('#resep').show();
                  $('#resep-isi').html(html);
                }
                
              }, 'json');
          }, 'json');
        });
      </script>

      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">EDIT DETAIL PRODUK : </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table class="table table-borderless table-striped">
                <tr>
                  <td>Nama</td>
                  <td>:</td>
                  <td><input type="text" id="produk_nama_edit" name="produk_nama_edit" style="margin: 0;"></td>
                </tr>
                <tr>
                  <td>Kategori</td>
                  <td>:</td>
                  <td><select id="produk_kategori_edit" name="produk_kategori_edit" style="margin: 0;"></select></td>
                </tr>
                <tr>
                  <td>Harga</td>
                  <td>:</td>
                  <td><input type="text" name="produk_harga_edit" id="produk_harga_edit" style="margin: 0;"></td>
                </tr>
                <tr>
                  <td>Satuan</td>
                  <td>:</td>
                  <td><input type="text" name="produk_satuan_edit" id="produk_satuan_edit" style="margin: 0;"></td>
                </tr>
              </table>
              <br>
              <br>
              <div id="resep_bb_edit" style="display: none;">
                <table id="resep_edit" class="table table-bordered" >
                  <thead>
                    <tr>
                      <th style="text-align: right;">No.</th>
                      <th>Nama Bahan Baku</th>
                      <th style="text-align: right;">Jumlah Takaran</th>
                    </tr>
                  </thead>
                  <tbody id="resep-isi-edit">
                  </tbody>
                </table>
                <button class="btn btn-secondary" id="tambah_resep" style="display: none;">Tambah Resep</button>
                <button class="btn btn-secondary" id="button_edit_resep">Edit Resep</button>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
            <input type="hidden" name="produk_id_edit" id="produk_id_edit">
            <input type="hidden" name="produk_jenis_edit" id="produk_jenis_edit">
            <button class="btn btn-success" id="submit_edit" name="submit_edit">Simpan</button>
            
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <script>
        function uang(uang){
            var reverse = uang.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            return ribuan
        }

        $('#button_edit_resep').on('click', function(){
          var colCount = $("#resep_edit tr").length;
          for(var i=0; i < colCount-1; i++){
            id = $('#resep_nama_edit'+i).val();

            $.ajax({
							url : "<?php echo base_url().'Bersih/get_semua_stok_kotor'?>",
							method : "GET",
							async : false,
							dataType : 'json',
							success: function(data){
								var html = '<option value="">--- ---</option>';
                var x;

                for(x=0; x<data.produk.length; x++){
                    html += `<option value='${data.produk[x].produk_id}'>${data.produk[x].produk_nama}</option>`;
                }

                $('#resep_jumlah_edit'+i).prop('disabled', false);
                $('#resep_nama_edit'+i).html(html);
                $('#resep_nama_edit'+i).val(id);
                $('#tambah_resep').show();
                $('#button_edit_resep').hide();
							}
						});
          }
        });

        // tambah resep
        var count = ($("#resep_edit tr").length);
        var wrapper = $('#resep-isi-edit');
        $('#tambah_resep').on('click', function(){
          count += 1;
          $(wrapper).append(`
            <tr>
              <td style="text-align: right;">${count+1}.</td>
              <td><select name="resep_nama_edit" id="resep_nama_edit${count}"></select></td>
              <td style="text-align: right;"><input type="text" name="resep_jumlah_edit" id="resep_jumlah_edit${count}" style="text-align: right;"></td>
            </tr>
          `);

          $.get("<?php echo base_url().'Bersih/get_semua_stok_kotor'?>", function(data){
              var html = '<option value="">--- ---</option>';
              var i;

              for(i=0; i<data.produk.length; i++){
                  html += `<option value='${data.produk[i].produk_id}'>${data.produk[i].produk_nama}</option>`;
              }

              $('#resep_nama_edit'+count).html(html);
          }, 'json')

        });

        $('#modal-edit').on('show.bs.modal', function(event) {
          var button = $(event.relatedTarget)
          var recipient = button.data('whatever')
          var modal = $(this);
          var dataString = 'id=' + recipient
          $.get('<?php echo base_url('Produk/get_detail_produk')?>', dataString, function(data){
              $('#tambah_resep').hide();
              $('#button_edit_resep').show();
              $('#produk_nama_edit').val(data.detail[0].produk_nama);
              // $('#produk_kategori_edit').html(data.detail[0].produk_kategori);
              $('#produk_harga_edit').val(uang(data.detail[0].produk_harga));
              $('#produk_satuan_edit').val(data.detail[0].produk_satuan);

              $('#produk_id_edit').val(recipient);
              $('#produk_jenis_edit').val(data.detail[0].produk_jenis);

                var id = data.detail[0].kategori_id;

                $.get('<?php echo base_url('Produk/get_kategori')?>', {id: id}, function(data){
                  var html = '<option value= "0">-- Pilih --</option>';
                  
                  for(var i=0; i < data.length; i++){
                    html += `<option value="${data[i].kategori_id}">${data[i].kategori_nama}</option>`;
                  }
                  $('#produk_kategori_edit').html(html);
                  $('#produk_kategori_edit').val(id);
                } ,'json');
              
              $('#resep_bb_edit').hide();
              var pid = data.detail[0].produk_id;
              var dataResep = 'id='+pid;
              $.get('<?php echo base_url('Produk/get_resep_produk')?>', dataResep, function(data){
                var html = ''
                
                for(var i = 0; i < data.resep.length; i++){
                  html += `
                    <tr>
                      <td style="text-align: right;">${i+1}.</td>
                      <td><select name="resep_nama_edit" id="resep_nama_edit${i}"><option value="${data.resep[i].produk_id}">${data.resep[i].produk_nama}</option></select></td>
                      <td style="text-align: right;"><input type="text" name="resep_jumlah_edit" id="resep_jumlah_edit${i}" value="${data.resep[i].produk_jml}" style="text-align: right;" disabled></td>
                    </tr>
                  `;
                }
                if(html != ''){
                  $('#resep_bb_edit').show();
                  $('#resep-isi-edit').html(html);
                }
                
              }, 'json');
          }, 'json');
        });

        $('#submit_edit').on('click', function(){
          var panjang = $("#resep_edit tr").length;

          var produk_nama = $('#produk_nama_edit').val();
          var produk_kategori = $('#produk_kategori_edit option:selected').val();
          var produk_harga = $('#produk_harga_edit').val();
          var produk_satuan = $('#produk_satuan_edit').val();
          var produk_id = $('#produk_id_edit').val();

          var dataString = 'produk_nama='+produk_nama+'&produk_kategori='+produk_kategori+'&produk_harga='+produk_harga+'&produk_satuan='+produk_satuan+'&produk_id='+produk_id;

          $.post("<?php echo base_url('Produk/edit_detail_produk')?>", dataString, function(data){

          });

          if($('#produk_jenis_edit').val() == 2){
            var resep = [];
            resep.push([]);

            for(var y=0;y <= panjang; y++){
              resep.push([]);
            }

            for(var x=0; x <= panjang; x++){
              resep[x].push($('#produk_id_edit').val());
              resep[x].push($('#resep_nama_edit'+x).val());
              resep[x].push($('#resep_jumlah_edit'+x).val());
            }

            $.post("<?php echo base_url('Produk/edit_resep_produk')?>", {resep:resep}, function(data){

            });
          }

        })
      </script>
<?php $this->load->view('mainmenu/admin_footer'); ?>