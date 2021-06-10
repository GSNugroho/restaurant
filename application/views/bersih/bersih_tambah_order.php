<?php $this->load->view('mainmenu/admin_header');?>
<!-- Content Wrapper. Contains page content -->
<!-- eko css-->
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/ekko-lightbox/ekko-lightbox.css'?>">
<!-- eko js -->
<script src="<?php echo base_url().'assets/plugins/ekko-lightbox/ekko-lightbox.min.js'?>"></script>
<!-- Filterizr-->
<script src="<?php echo base_url().'assets/plugins/filterizr/jquery.filterizr.min.js'?>"></script>
<!-- dadtepicker -->
<script src="<?php echo base_url().'assets/plugins/daterangepicker/daterangepicker.js'?>"></script>
<style>
    .imageku {
    font-size: 24px;
    text-align: center;
    cursor: pointer;
    outline: none;
    color: #fff;
    background-color: #6c757d;
    border: none;
    border-radius: 15px;
    box-shadow: 0 9px #6c757d;
    }

    .imageku:hover {background-color: #3e8e41}

    .imageku:active {
    background-color: #3e8e41;
    box-shadow: 0 5px #666;
    transform: translateY(4px);
    }
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Order</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Order</a></li>
              <li class="breadcrumb-item active">Tambah Order</li>
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
                <div>
                  <div class="btn-group w-100 mb-2">
                    <a class="btn btn-info active" href="javascript:void(0)" data-filter="all"> All items </a>
                    <?php 
                        foreach($kategori->result_array() as $row){
                            echo '<a class="btn btn-info" href="javascript:void(0)" data-filter="'.$row['kategori_id'].'"> '.$row['kategori_nama'].' </a>';
                        }
                    ?>
                  </div>
                  <div class="mb-2">
                    <a class="btn btn-secondary" href="javascript:void(0)" data-shuffle> Shuffle items </a>
                    <!-- <div class="float-right">
                      <select class="custom-select" style="width: auto;" data-sortOrder>
                        <option value="index"> Sort by Position </option>
                        <option value="sortData"> Sort by Custom Data </option>
                      </select>
                      <div class="btn-group">
                        <a class="btn btn-default" href="javascript:void(0)" data-sortAsc> Ascending </a>
                        <a class="btn btn-default" href="javascript:void(0)" data-sortDesc> Descending </a>
                      </div>
                    </div> -->
                  </div>
                </div>
                <div>
                  <div class="filter-container p-0 row">
                    <?php
                        foreach($produk->result_array() as $row){
                            echo '
                            <div class="filtr-item col-1" data-category="'.$row['produk_kategori'].'" data-sort="white sample">
                                <img class="img-fluid mb-2 imageku" value="'.$row['produk_nama'].'" src="'.sprintf("../upload/%s", $row['produk_foto']).'" class="img-fluid mb-2" alt="'.$row['produk_nama'].'" onClick="order_add(\''.$row['produk_id'].'\')"/>
                            </div>';
                        }
                    ?>
                  </div>
                </div>
            </div>
            <script>
            function uang(uang){
                var reverse = uang.toString().split('').reverse().join(''),
                ribuan = reverse.match(/\d{1,3}/g);
                ribuan = ribuan.join('.').split('').reverse().join('');
                return ribuan
            }
                $(function () {
                    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                    event.preventDefault();
                    $(this).ekkoLightbox({
                        alwaysShowClose: true
                    });
                    });

                    $('.filter-container').filterizr({gutterPixels: 3});
                    $('.btn[data-filter]').on('click', function() {
                    $('.btn[data-filter]').removeClass('active');
                    $(this).addClass('active');
                    });
                })
                
                var no=1;
                
                function order_add(value){
                    var html = '';
                    var add = 1;
                    var dataString = 'produk_id='+value;
                    var cek = '';
                    var wrapper = $('#produk_lain');

                    if($("#tbl_pesanan tr").length <= 1){
                        $.get("<?php echo base_url().'Produk/get_produk_detail';?>", dataString, function(data){
                            html += `
                            <tr>
                                <td id="no${no}">${no}.</td>
                                <td id="produk_nm${no}">${data[0].produk_nama}</td>
                                <td id="produk_jml${no}" style="text-align: right;">${add}</td>
                                <td id="produk_harga${no}" style="text-align: right;">${uang(data[0].produk_harga)}</td>
                                <td id="produk_sub_total${no}" style="text-align: right;">${uang(parseInt(data[0].produk_harga) * add)}</td>
                                <td id="produk_id${no}" style="display: none;">${value}</td>
                                <td id="produk_edit${no}">
                                  <a href="#" class="remove_field" style="color: red;">
                                    <i class="nav-icon fas fa-trash text-danger"></i>
                                  </a>
                                </td>
                            </tr>`;

                            $('#isi_tbl_pesanan').append(html);
                            no++;
                        }, 'json');
                    }else{
                      var number = 0;
                      var row = 0;

                      for(var x=1; x < $("#tbl_pesanan tr").length; x++){
                          cek = document.getElementById("tbl_pesanan").rows[x].cells[5].innerHTML;
                          if(value == cek){
                              number += 1;
                              row = x;
                          }else{
                              number += 0;
                          }
                      }

                      if(number == 1){
                          var sblm = document.getElementById("tbl_pesanan").rows[row].cells[2].innerHTML;
                          var ssdh = document.getElementById("tbl_pesanan").rows[row].cells[2].innerHTML = parseInt(sblm) + 1;

                          var con = document.getElementById("tbl_pesanan").rows[row].cells[3].innerHTML;
                          var konv = con.replace(/[.]/g, "");
                          document.getElementById("tbl_pesanan").rows[row].cells[4].innerHTML = uang(parseInt(konv) * ssdh);
                      }else{
                          $.get("<?php echo base_url().'Produk/get_produk_detail';?>", dataString, function(data){
                              html += `
                              <tr>
                                  <td id="no${no}">${no}.</td>
                                  <td id="produk_nm${no}">${data[0].produk_nama}</td>
                                  <td id="produk_jml${no}" style="text-align: right;">${add}</td>
                                  <td id="produk_harga${no}" style="text-align: right;">${uang(data[0].produk_harga)}</td>
                                  <td id="produk_sub_total${no}" style="text-align: right;">${uang(parseInt(data[0].produk_harga) * add)}</td>
                                  <td id="produk_id${no}" style="display: none;">${value}</td>
                                  <td id="produk_edit${no}">
                                    <a href="#" class="remove_field" style="color: red;">
                                      <i class="nav-icon fas fa-trash text-danger"></i>
                                    </a>
                                  </td>
                              </tr>`;

                              $('#isi_tbl_pesanan').append(html);
                              no++;
                          }, 'json');
                      }
                    }
                }
            </script>
          <!-- </div>
          
          <div class="col-6"> -->
            <div class="card">
                <form action="<?php echo base_url().'Bersih/tambah_order_baru';?>" method="post" enctype="multipart/form-data" autocomplete="off">
                  <div class="col-sm-12">
                  <br>
                    <!-- <table>
                      <tr>
                        <td><button type="submit" class="btn btn-block btn-success">Simpan</button></td>
                        <td><a href="<?php echo base_url().'Bersih/order'?>" type="button" class="btn btn-block btn-outline-danger">Batal</a></td>
                      </tr>
                    </table> -->
                  </div>
                  <div class="col-12">
                    <table id="tbl_pesanan" class="table table-borderless">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Pesanan</th>
                                <th style="text-align: right;">Jumlah</th>
                                <th style="text-align: right;">Harga</th>
                                <th style="text-align: right;">Sub Total</th>
                                <th style="display: none;">produk_id</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="isi_tbl_pesanan">
                        </tbody>
                    </table>
                  </div>
                  <div class="row">
                    <div class="col-10">
                      &nbsp;
                    </div>
                    <div class="col-2">
                      <table>
                      <tr>
                        <!-- <td><button class="btn btn-block btn-success" id="save_table" type="button">BAYAR</button></td> -->
                        <td><button class="btn btn-block btn-success" data-toggle="modal" data-target="#modal-confim" type="button">BAYAR</button></td>
                        <td><button class="btn btn-block btn-outline-danger" id="reload_table" type="button">BATAL</button></td>
                      </tr>
                      </table>
                      <br>
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
        $('#reload_table').on('click', function(){
          var html = '';
          $('#isi_tbl_pesanan').html(html);
          no = 1;
        });

        $('#save_table').on('click', function(){
          var data = [];
          data.push([]);
          for(var y=0;y < no -2; y++){
            data.push([]);
          }
          for(var x=0; x < no-1; x++){
            var param = x+1;
              data[x].push($('#produk_id'+param).html());
              data[x].push($('#produk_jml'+param).html());
          }
          
          dataString = 'data='+data;
          $.post("<?php echo base_url().'Bersih/tambah_order_bersih'?>", dataString, function(data){

          });
        });

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
                    <td><span id="produk_harga_total" name="produk_harga_total"></span></td>
                    <td><a href="#" class="remove_field" style="color: red;">Hapus</a></td>
                </tr>
            `);

            $(wrapper).on("click",".remove_field", function(e){
              e.preventDefault(); $(this).closest('tr').remove(); count--;
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

    <div class="modal fade" id="modal-confim">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Konfirmasi Pembayaran : <p id="stok_out_kd"></p></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <table>
                <tr>
                  <td><i class="nav-icon fas fa-calendar-alt"></i></td>
                  <td>:</td>
                  <td style="margin: 0;">&nbsp;<?php date_default_timezone_set("Asia/Jakarta");echo date('d-m-Y / H:i')?></td>
                </tr>
                <tr>
                  <td><i class="nav-icon fas fa-user-edit"></i></td>
                  <td>:</td>
                  <td style="margin: 0;">&nbsp;<?php echo $this->session->userdata('nama')?></td>
                </tr>
              </table>

              <table class="table table-borderless" id="tbl_confim">
                <thead>
                  <tr style="background-color: #6c757d;">
                    <th style="text-align: center;">No.</th>
                    <th style="text-align: center;">Pesanan</th>
                    <th style="text-align: right;">Jumlah</th>
                    <th style="text-align: right;">Sub Total</th>
                  </tr>
                </thead>
                <tbody id="detail_tbl_confim">
                </tbody>
                <tfoot>
                  <tr style="background-color: #6c757d;">
                    <th colspan="3" style="text-align: right;">Total</th>
                    <th id="total_semua" style="text-align: right;"></th>
                  </tr>
                </tfoot>
              </table>
              <div class="col-12">
                <table>
                  <tr>
                    <td>
                    <div class="form-group">
                      <label>Nama Pelanggan</label>
                    </div>
                    </td>
                    <td>&nbsp;</td>
                    <td>
                    <div class="form-group">
                      <input class="form-control" type="text" id="pelanggan_nm" name="pelanggan_nm">
                    </div>
                    </td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td>
                      <div class="form-group">
                        <label>Diskon</label>
                      </div>
                    </td>
                    <td>&nbsp;</td>
                    <td>
                      <div class="form-group">
                        <input class="form-control" type="text" id="pelanggan_diskon" name="pelanggan_diskon" style="text-align: right;" placeholder="%">
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <div class="form-group">
                        <label>Bayar</label>
                      </div>
                    </td>
                    <td>&nbsp;</td>
                    <td>
                      <div class="form-group">
                        <input class="form-control" id="pelanggan_byr" name="pelanggan_byr" style="text-align: right;" placeholder="Rp 0">
                      </div>
                    </td>
                  </tr>
                </table>
                <table>
                  <tr>
                    <td><button class="btn btn-success" id="bayar_pesanan" name="bayar_pesanan" type="button">BAYAR</button></td>
                  </tr>
                </table>
                <input type="hidden" name="data" id="data">
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
        $('#modal-confim').on('show.bs.modal', function(event) {
          var data = [];
          data.push([]);
          for(var y=0;y < no -2; y++){
            data.push([]);
          }
          for(var x=0; x < no-1; x++){
            var param = x+1;
              data[x].push($('#no'+param).html());
              data[x].push($('#produk_nm'+param).html());
              data[x].push($('#produk_jml'+param).html());
              data[x].push($('#produk_harga'+param).html());
              data[x].push($('#produk_sub_total'+param).html());
              data[x].push($('#produk_id'+param).html());
          }

          var html = '';
          var total = 0;
          for(var z=0; z < data.length; z++){
            html += `<tr>
              <td style="text-align: right;">${data[z][0]}</td>
              <td>${data[z][1]}</td>
              <td style="text-align: right;">${uang(data[z][2])}</td>
              <td style="text-align: right;">${uang(data[z][4])}</td>
            </tr>`;

            var ded = data[z][4];
            var vert = ded.replace(/[.]/g, "");
            total += parseInt(vert);
          }

          $('#detail_tbl_confim').html(html);
          $('#total_semua').html(uang(total));
          // $('#data').html(data);

          // $('#cele').html(print_r(data));
        });

        $('#bayar_pesanan').on('click', function(){
          var data = [];
          data.push([]);
          for(var y=0;y < no -2; y++){
            data.push([]);
          }
          for(var x=0; x < no-1; x++){
            var param = x+1;
              data[x].push($('#produk_jml'+param).html());
              data[x].push($('#produk_id'+param).html());
          }

          var pelanggan_nm = $('#pelanggan_nm').val();
          var pelanggan_diskon = $('#pelanggan_diskon').val();
          var pelanggan_byr = $('#pelanggan_byr').val();
          var kon_total = $('#total_semua').html();
          var total_byr_pesanan = kon_total.replace(/[.]/g, "");

          var dataString = 'pelanggan_nm='+pelanggan_nm+'&pelanggan_diskon='+pelanggan_diskon+'&pelanggan_byr='+pelanggan_byr+'&total_byr_pesanan='+total_byr_pesanan;
          
          $.post("<?php echo base_url().'Bersih/tambah_order_baru';?>", dataString, function(data){
            
          });

          $.post("<?php echo base_url().'Bersih/tambah_order_baru_detail';?>", {data:data}, function(data){

          });
          
        })
      </script>
  </div>
  
<?php $this->load->view('mainmenu/admin_footer'); ?>