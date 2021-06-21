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
            <h1 class="m-0">Kartu Stok</h1>
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
                </div>
            </div>
            <br>
            <div class="card card-secondary card-tabs">
              <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <h4>Produk Dapat Dihitung</h4>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nm_produk" name="nm_produk" placeholder="Nama Produk">
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="tbl_stok">
                            <thead>
                                <tr>
                                    <th style="display: none;">produk_id</th>
                                    <th>PRODUK</th>
                                    <th>KATEGORI</th>
                                    <th>STOK AWAL</th>
                                    <th>STOK MASUK</th>
                                    <th>STOK KELUAR</th>
                                    <th>STOK AKHIR</th>
                                    <th>SATUAN</th>
                                    <th>Porsi</th>
                                    <th style="text-align: right;">Nilai Aset</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_detail_stok">
                            </tbody>
                            <tfoot>
                                <td colspan="8" class="text-right"><b>Total</b></td>
                                <td id="total_pmby" class="text-right"></td>
                            </tfoot>
                        </table>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-9">
                            <h4>Produk Tidak Dapat Dihitung</h4>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nm_produk_nc" name="nm_produk_nc" placeholder="Nama Produk">
                            </div>
                        </div>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="tbl_stok_alat">
                            <thead>
                                <tr>
                                    <th style="display: none;">produk_id</th>
                                    <th>PRODUK</th>
                                    <th>KATEGORI</th>
                                    <th>STOK AWAL</th>
                                    <th>STOK MASUK</th>
                                    <th>STOK KELUAR</th>
                                    <th>STOK AKHIR</th>
                                    <th>SATUAN</th>
                                    <th style="text-align: right;">Nilai Aset</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_detail_stok_alat">
                            </tbody>
                            <tfoot>
                                <td colspan="7" class="text-right"><b>Total</b></td>
                                <td id="total_pmby_alat" class="text-right"></td>
                            </tfoot>
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
    <script>
    $(document).ready(function() {
        get_data_stok();
        setInterval(function(){ 
			get_data_stok();
            $('#nm_produk').val('');
		}, 30000);
    });

    function uang(uang){
        var reverse = uang.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return ribuan
    }

    $('#nm_produk').on('keyup', function(){
	var input, filter, table, tr, td, i, txtValue;
	input = document.getElementById("nm_produk");
	filter = input.value.toUpperCase();
	table = document.getElementById("tbl_stok");
	tr = table.getElementsByTagName("tr");
	 for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[0];
		if (td) {
		  txtValue = td.textContent || td.innerText;
		  if (txtValue.toUpperCase().indexOf(filter) > -1) {
			tr[i].style.display = "";
		  } else {
			tr[i].style.display = "none";
		  }
		}       
	  }
	})

    $('#nm_produk_nc').on('keyup', function(){
	var input, filter, table, tr, td, i, txtValue;
	input = document.getElementById("nm_produk_nc");
	filter = input.value.toUpperCase();
	table = document.getElementById("tbl_stok_alat");
	tr = table.getElementsByTagName("tr");
	 for (i = 0; i < tr.length; i++) {
		td = tr[i].getElementsByTagName("td")[0];
		if (td) {
		  txtValue = td.textContent || td.innerText;
		  if (txtValue.toUpperCase().indexOf(filter) > -1) {
			tr[i].style.display = "";
		  } else {
			tr[i].style.display = "none";
		  }
		}       
	  }
	})

    function get_data_stok(){
        $.get("<?php echo base_url().'Bersih/get_stok_all_bersih'?>", function(data){
            var html = '';
            var html2 = '';
            var total_aset = 0;
            var total_aset2 = 0;

            for(var i=0; i < data.produk.length; i++){
                if(data.produk[i].produk_count != '0'){
                    var masuk = 0;
                    var keluar = 0;
                    var stok_awal = 0;
                    var stok_masuk = 0;
                    var stok_keluar = 0;
                    var masuk_sblm = 0;
                    var keluar_sblm = 0;
                    var stok_masuk_sblm = 0;
                    var stok_keluar_sblm = 0;
                    var stok_awal = 0;
                    var harga = data.produk[i].produk_harga;

                    var kd_produk = data.produk[i].produk_id;
                    var jml_per_porsi = 1;
                    html += `<tr><td>${data.produk[i].produk_nama}</td><td>${data.produk[i].kategori_nama}</td>`;
                    
                    if(data.stokin_sblm != ''){
                        for(var j=0; j < data.stokin_sblm.length; j++){
                            if(data.produk[i].produk_id == data.stokin_sblm[j].produk_id){
                                masuk_sblm += parseFloat(data.stokin_sblm[j].produk_jml);
                                stok_masuk_sblm += parseFloat(data.stokin_sblm[j].produk_jml);
                            }
                        }
                    }

                    if(data.stokout_sblm != ''){
                        for(var j=0; j < data.stokout_sblm.length; j++){
                            if(data.produk[i].produk_id == data.stokout_sblm[j].produk_id){
                                keluar_sblm += parseFloat(data.stokout_sblm[j].produk_jml);
                                stok_keluar_sblm += parseFloat(data.stokout_sblm[j].produk_jml);
                            }
                        }
                    }

                    stok_awal = parseFloat(masuk_sblm - keluar_sblm);
                    html += `<td>${(stok_awal).toFixed(2)}</td>`;
                    if(data.stokin != ''){
                        for(var j=0; j < data.stokin.length; j++){
                            if(data.produk[i].produk_id == data.stokin[j].produk_id){
                                masuk += parseFloat(data.stokin[j].produk_jml);
                                stok_masuk += parseFloat(data.stokin[j].produk_jml);
                            }
                        }
                    }
                    html += `<td>${(stok_masuk).toFixed(2)}</td>`;
                    
                    if(data.stokout != ''){
                        for(var k=0; k < data.stokout.length; k++){
                            if(data.produk[i].produk_id == data.stokout[k].produk_id){
                                keluar += parseFloat(data.stokout[k].produk_jml);
                                stok_keluar += parseFloat(data.stokout[k].produk_jml);
                            }
                        }
                    }
                    html += `<td>${(stok_keluar).toFixed(2)}</td>`;
                    
                    var akhir = (parseFloat(stok_awal + masuk - keluar)).toFixed(2);
                    switch(kd_produk){
                        // sambal masak
                        // case 'RO-000009': 
                        //     jml_per_porsi = 0.05;
                        // break;
                        // // nasi
                        // case 'RO-000012':
                        //     jml_per_porsi = 0.083;
                        // break;
                        // // sambal bawang
                        // case 'RO-000013':
                        //     jml_per_porsi = 0.02;
                        // break;
                        // // kemangi
                        // case 'RO-000037':
                        //     jml_per_porsi = 0.09;
                        // break;
                        // // pete
                        // case 'RO-000038':
                        //     jml_per_porsi = 0.5;
                        // break;
                        // aqua
                        // case 'RO-000047':
                        //     jml_per_porsi = 0.01;
                        // break;
                        // // es
                        // case 'RO-000050':
                        //     jml_per_porsi = 0.007;
                        // break;
                        // // gula
                        // case 'RO-000042':
                        //     jml_per_porsi = 0.03;
                        // break;
                        // // teh
                        // case 'RO-000040':
                        //     jml_per_porsi = 0.05;
                        // break;
                        // // jeruk
                        // case 'RO-000041':
                        //     jml_per_porsi = 0.05;
                        // break;
                    }
                    
                    html += `<td>${(parseFloat(stok_awal + masuk - keluar)).toFixed(2)}</td><td>${data.produk[i].produk_satuan}</td><td>${Math.floor(akhir/jml_per_porsi)}</td><td class="text-right">Rp ${uang(Math.floor(((parseFloat(stok_awal + masuk - keluar)).toFixed(2)) * harga))}</td></tr>`;
                    total_aset += Math.floor(((parseFloat(stok_awal + masuk - keluar)).toFixed(2)) * harga)
                }else{
                    var masuk2 = 0;
                    var keluar2 = 0;
                    var stok_awal2 = 0;
                    var stok_masuk2 = 0;
                    var stok_keluar2 = 0;
                    var masuk_sblm2 = 0;
                    var keluar_sblm2 = 0;
                    var stok_masuk_sblm2 = 0;
                    var stok_keluar_sblm2 = 0;
                    var stok_awal2 = 0;
                    var harga2 = data.produk[i].produk_harga;

                    var kd_produk2 = data.produk[i].produk_id;
                    var jml_per_porsi2 = 1;
                    html2 += `<tr><td>${data.produk[i].produk_nama}</td><td>${data.produk[i].kategori_nama}</td>`;
                    
                    if(data.stokin_sblm != ''){
                        for(var j=0; j < data.stokin_sblm.length; j++){
                            if(data.produk[i].produk_id == data.stokin_sblm[j].produk_id){
                                masuk_sblm2 += parseFloat(data.stokin_sblm[j].produk_jml);
                                stok_masuk_sblm2 += parseFloat(data.stokin_sblm[j].produk_jml);
                            }
                        }
                    }

                    if(data.stokout_sblm != ''){
                        for(var j=0; j < data.stokout_sblm.length; j++){
                            if((data.produk[i].produk_id == data.stokout_sblm[j].produk_id) && (data.stokout_sblm[j].user_create != 'Teller 1')){
                                keluar_sblm2 += parseFloat(data.stokout_sblm[j].produk_jml);
                                stok_keluar_sblm2 += parseFloat(data.stokout_sblm[j].produk_jml);
                            }
                        }
                    }
                    
                    stok_awal2 = parseFloat(masuk_sblm2 - keluar_sblm2);
                    html2 += `<td>${(stok_awal2).toFixed(2)}</td>`;

                    if(data.stokin != ''){
                        for(var j=0; j < data.stokin.length; j++){
                            if(data.produk[i].produk_id == data.stokin[j].produk_id){
                                masuk2 += parseFloat(data.stokin[j].produk_jml);
                                stok_masuk2 += parseFloat(data.stokin[j].produk_jml);
                            }
                        }
                    }
                    html2 += `<td>${(stok_masuk2).toFixed(2)}</td>`;
                    
                    if(data.stokout != ''){
                        for(var k=0; k < data.stokout.length; k++){
                            if((data.produk[i].produk_id == data.stokout[k].produk_id) && (data.stokout[k].user_create != 'Teller 1')){
                                keluar2 += parseFloat(data.stokout[k].produk_jml);
                                stok_keluar2 += parseFloat(data.stokout[k].produk_jml);
                            }
                        }
                    }
                    html2 += `<td>${(stok_keluar2).toFixed(2)}</td>`;
                    
                    var akhir2 = (parseFloat(masuk2 - keluar2)).toFixed(2);
                    switch(kd_produk){
                        // // sambal masak
                        // case 'RO-000009': 
                        //     jml_per_porsi = 0.05;
                        // break;
                        // // nasi
                        // case 'RO-000012':
                        //     jml_per_porsi = 0.083;
                        // break;
                        // // sambal bawang
                        // case 'RO-000013':
                        //     jml_per_porsi = 0.02;
                        // break;
                        // // kemangi
                        // case 'RO-000037':
                        //     jml_per_porsi = 0.09;
                        // break;
                        // // pete
                        // case 'RO-000038':
                        //     jml_per_porsi = 0.5;
                        // break;
                        // // aqua
                        // case 'RO-000047':
                        //     jml_per_porsi = 0.01;
                        // break;
                        // // es
                        // case 'RO-000050':
                        //     jml_per_porsi = 0.007;
                        // break;
                        // // gula
                        // case 'RO-000042':
                        //     jml_per_porsi = 0.03;
                        // break;
                        // // teh
                        // case 'RO-000040':
                        //     jml_per_porsi = 0.05;
                        // break;
                        // // jeruk
                        // case 'RO-000041':
                        //     jml_per_porsi = 0.05;
                        // break;
                    }

                    html2 += `<td>${(parseFloat(stok_awal2 + masuk2 - keluar2)).toFixed(2)}</td><td>${data.produk[i].produk_satuan}</td><td class="text-right">Rp ${uang(Math.floor(((parseFloat(stok_awal2 + masuk2 - keluar2)).toFixed(2)) * harga2))}</td></tr>`;
                    total_aset2 += Math.floor(((parseFloat(stok_awal2 + masuk2 - keluar2)).toFixed(2)) * harga2)
                }
                
            }

            $('#tbl_detail_stok').html(html);
            $('#total_pmby').html('Rp '+uang(total_aset));

            $('#tbl_detail_stok_alat').html(html2);
            $('#total_pmby_alat').html('Rp '+uang(total_aset2));
        }, 'json');
    }
    </script>
<?php $this->load->view('mainmenu/admin_footer'); ?>
  </div>
