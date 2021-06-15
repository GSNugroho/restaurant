<?php $this->load->view('mainmenu/admin_header');?>
<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'?>">
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css'?>">
<link rel="stylesheet" href="<?php echo base_url().'assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css'?>">
<!-- Content Wrapper. Contains page content -->
<style>
    html {
  box-sizing: border-box;
    }
    *,
    *:before,
    *:after {
    box-sizing: inherit;
    }
    .intro {
    max-width: 1280px;
    margin: 1em auto;
    }
    .table-scroll {
    position: relative;
    width:100%;
    z-index: 1;
    margin: auto;
    overflow: auto;
    height: 568px;
    }
    .table-scroll table {
    width: 100%;
    min-width: 1280px;
    margin: auto;
    border-collapse: separate;
    border-spacing: 0;
    }
    .table-wrap {
    position: relative;
    }
    .table-scroll th,
    .table-scroll td {
    padding: 5px 10px;
    border: 1px solid #000;
    background: #fff;
    vertical-align: top;
    }
    .table-scroll thead th {
    background: #333;
    color: #fff;
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    }
    /* safari and ios need the tfoot itself to be position:sticky also */
    .table-scroll tfoot,
    .table-scroll tfoot th,
    .table-scroll tfoot td {
    position: -webkit-sticky;
    position: sticky;
    bottom: 0;
    background: #666;
    color: #fff;
    z-index:4;
    }

    a:focus {
    background: red;
    } /* testing links*/

    th:first-child {
    position: -webkit-sticky;
    position: sticky;
    left: 0;
    z-index: 2;
    background: #ccc;
    }
    thead th:first-child,
    tfoot th:first-child {
    z-index: 5;
    }
</style>
<script>
    $(document).ready(function () {
        var url = window.location;
        $('ul.nav a[href="'+ url +'"]').parent().addClass('active');
        $('ul.nav a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
    });
	
	var gridViewScroll = null;
    window.onload = function () {
        var options = new GridViewScrollOptions();
        options.elementID = "dtKaryawanbulan";
        options.width = 450;
        options.height = 300;
        options.freezeColumn = true;
        options.freezeFooter = true;
        options.freezeColumnCssClass = "GridViewScrollItemFreeze";
        options.freezeFooterCssClass = "GridViewScrollFooterFreeze";
        options.freezeColumnCount = 2;

        gridViewScroll = new GridViewScroll(options);
        gridViewScroll.enhance();

        options.elementID = "gvMain2";
        var gridViewScroll2 = new GridViewScroll(options);
        gridViewScroll2.enhance();

        options.elementID = "gvMain3";
        options.width = 600;
        var gridViewScroll3 = new GridViewScroll(options);
        gridViewScroll3.enhance();

        options.elementID = "gvMain4";
        var gridViewScroll4 = new GridViewScroll(options);
        gridViewScroll4.enhance();
    }
    function enhance() {
        gridViewScroll.enhance();
    }
    function undo() {
        gridViewScroll.undo();
    }
</script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan</h1>
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
                    <!-- <button class="btn btn-block btn-outline-secondary">Ekspor Produk</button> -->
                </div>
            </div>
            <br>
            <div class="card card-secondary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="stok-masuk-tab" data-toggle="pill" href="#custom-tabs-masuk" role="tab" aria-controls="custom-tabs-masuk" aria-selected="true">Stok Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="stok-keluar-tab" data-toggle="pill" href="#custom-tabs-keluar" role="tab" aria-controls="ustom-tabs-keluar" aria-selected="false">Stok Keluar</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="stok-satuan-tab" data-toggle="pill" href="#custom-tabs-satuan" role="tab" aria-controls="custom-tabs-satuan" aria-selected="false">Menu Satuan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="stok-minum-tab" data-toggle="pill" href="#custom-tabs-minum" role="tab" aria-controls="custom-tabs-minum" aria-selected="false">Menu Minuman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="stok-tambah-tab" data-toggle="pill" href="#custom-tabs-tambah" role="tab" aria-controls="custom-tabs-tambah" aria-selected="false">Menu Tambahan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="stok-paket-tab" data-toggle="pill" href="#custom-tabs-paket" role="tab" aria-controls="custom-tabs-paket" aria-selected="false">Menu Paket</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade show active" id="custom-tabs-masuk" role="tabpanel" aria-labelledby="custom-tabs-masuk-tab">
                            <div class="card-body table-responsive p-0">
                                <h4>Stok Masuk</h4>
                                <div id="table-scroll" class="table-scroll" style="margin-bottom: 15%">
                                    <div id="table-scroll" class="table-scroll">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center;">Tanggal</th>
                                                <?php 
                                                    foreach($produk as $row){
                                                        echo '<th scope="col" style="text-align: right;">'.$row['produk_nama'].'</th>';
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                            </tr>
                                            </thead>
                                            <tbody id="isi-table-masuk">
                                            </tbody>
                                            <tfoot id="foot-table-masuk">
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-keluar" role="tabpanel" aria-labelledby="custom-tabs-keluar-tab">
                            <div class="card-body table-responsive p-0">
                                <h4>Stok Keluar</h4>
                                <div id="table-scroll" class="table-scroll" style="margin-bottom: 15%">
                                    <div id="table-scroll" class="table-scroll">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center;">Tanggal</th>
                                                <?php 
                                                    foreach($produk as $row){
                                                        echo '<th scope="col" style="text-align: right;">'.$row['produk_nama'].'</th>';
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                            </tr>
                                            </thead>
                                            <tbody id="isi-table-laba">
                                            </tbody>
                                            <tfoot id="foot-table">
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-satuan" role="tabpanel" aria-labelledby="custom-tabs-satuan-tab">
                            <div class="card-body table-responsive p-0">
                                <h4>Menu Satuan Terjual</h4>
                                <div id="table-scroll" class="table-scroll" style="margin-bottom: 15%">
                                    <div id="table-scroll" class="table-scroll">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center;">Tanggal</th>
                                                <?php 
                                                    foreach($menu_porsi as $row){
                                                        echo '<th scope="col" style="text-align: right;">'.$row['produk_nama'].'</th>';
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                            </tr>
                                            </thead>
                                            <tbody id="isi-table-porsi">
                                            </tbody>
                                            <tfoot id="foot-table-porsi">
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-minum" role="tabpanel" aria-labelledby="custom-tabs-minum-tab">
                            <div class="card-body table-responsive p-0">
                                <h4>Menu Minuman Terjual</h4>
                                <div id="table-scroll" class="table-scroll" style="margin-bottom: 15%">
                                    <div id="table-scroll" class="table-scroll">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center;">Tanggal</th>
                                                <?php 
                                                    foreach($menu_minum as $row){
                                                        echo '<th scope="col" style="text-align: right;">'.$row['produk_nama'].'</th>';
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                            </tr>
                                            </thead>
                                            <tbody id="isi-table-minum">
                                            </tbody>
                                            <tfoot id="foot-table-minum">
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-tambah" role="tabpanel" aria-labelledby="custom-tabs-tambah-tab">
                            <div class="card-body table-responsive p-0">
                                <h4>Menu Tambahan Terjual</h4>
                                <div id="table-scroll" class="table-scroll" style="margin-bottom: 15%">
                                    <div id="table-scroll" class="table-scroll">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center;">Tanggal</th>
                                                <?php 
                                                    foreach($menu_tambah as $row){
                                                        echo '<th scope="col" style="text-align: right;">'.$row['produk_nama'].'</th>';
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                            </tr>
                                            </thead>
                                            <tbody id="isi-table-tambah">
                                            </tbody>
                                            <tfoot id="foot-table-tambah">
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-paket" role="tabpanel" aria-labelledby="custom-tabs-paket-tab">
                            <div class="card-body table-responsive p-0">
                                <h4>Menu Paket Terjual</h4>
                                <div id="table-scroll" class="table-scroll" style="margin-bottom: 15%">
                                    <div id="table-scroll" class="table-scroll">
                                        <table class="table table-hover text-nowrap">
                                            <thead>
                                            <tr>
                                                <th scope="col" style="text-align: center;">Tanggal</th>
                                                <?php 
                                                    foreach($menu_paket as $row){
                                                        echo '<th scope="col" style="text-align: right;">'.$row['produk_nama'].'</th>';
                                                    }
                                                ?>
                                            </tr>
                                            <tr>
                                            </tr>
                                            </thead>
                                            <tbody id="isi-table-paket">
                                            </tbody>
                                            <tfoot id="foot-table-paket">
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        get_data_laba();
    });

    function uang(uang){
            var reverse = uang.toString().split('').reverse().join(''),
            ribuan = reverse.match(/\d{1,3}/g);
            ribuan = ribuan.join('.').split('').reverse().join('');
            
            if(uang < 0){
              return '('+ribuan+')';
            }else{
              return ribuan
            }
            
        }

    function get_data_laba(){
        $.get("<?php echo base_url().'Bersih/get_all_stok_terjual'?>", function(data){
            var htmla = '';
            var htmlb = '<tr class="GridViewScrollItem"><th style="text-align: right;"><b>Total</b></th>';
            var masuk = '';
            var masukb = '<tr class="GridViewScrollItem"><th style="text-align: right;"><b>Total</b></th>';
            var minum = '';
            var minumb = '<tr class="GridViewScrollItem"><th style="text-align: right;"><b>Total</b></th>';
            var tambah = '';
            var tambahb = '<tr class="GridViewScrollItem"><th style="text-align: right;"><b>Total</b></th>';
            var paket = '';
            var paketb = '<tr class="GridViewScrollItem"><th style="text-align: right;"><b>Total</b></th>';
            var porsi = '';
            var porsib = '<tr class="GridViewScrollItem"><th style="text-align: right;"><b>Total</b></th>';

            var modal = $('#modal').val();

            // keluar
            for(var x=0; x < data.tanggal.length; x++){
              htmla += `<tr class="GridViewScrollItem"><th style="text-align: center;">${data.tanggal[x].stok_out_dt_masuk}</th>`;
              
              for(var z=0; z < data.produk.length; z++){
                var jml_stok = 0;
                for(var y=0; y < data.stok_jual.length; y++){
                    if((data.stok_jual[y].stok_out_dt_masuk == data.tanggal[x].stok_out_dt_masuk) && (data.stok_jual[y].produk_id == data.produk[z].produk_id)){
                        jml_stok += parseInt(data.stok_jual[y].produk_jml);
                    }
                }
                htmla += `<td style="text-align: right;">${jml_stok}</td>`;
              }
              

              htmla += `</tr>`;
            }

            for(var y=0; y < data.produk.length; y++){
                var total = 0
                for(var x=0; x < data.total.length; x++){
                    if(data.total[x].produk_id == data.produk[y].produk_id){
                        total += parseInt(data.total[x].produk_jml);
                    }
                }
                
                htmlb += `<td style="text-align: right;">${total}</td>`;
            }
            htmlb += `</tr>`;

            // masuk
            for(var x=0; x < data.tanggal_masuk.length; x++){
              masuk += `<tr class="GridViewScrollItem"><th style="text-align: center;">${data.tanggal_masuk[x].stok_in_dt_masuk}</th>`;
              
              for(var z=0; z < data.produk.length; z++){
                var jml_stok = 0;
                for(var y=0; y < data.stok_masuk.length; y++){
                    if((data.stok_masuk[y].stok_in_dt_masuk == data.tanggal_masuk[x].stok_in_dt_masuk) && (data.stok_masuk[y].produk_id == data.produk[z].produk_id)){
                        jml_stok += parseInt(data.stok_masuk[y].produk_jml);
                    }
                }
                masuk += `<td style="text-align: right;">${jml_stok}</td>`;
              }
              

              masuk += `</tr>`;
            }

            for(var y=0; y < data.produk.length; y++){
                var total = 0
                for(var x=0; x < data.total_masuk.length; x++){
                    if(data.total_masuk[x].produk_id == data.produk[y].produk_id){
                        total += parseInt(data.total_masuk[x].produk_jml);
                    }
                }
                
                masukb += `<td style="text-align: right;">${total}</td>`;
            }
            masukb += `</tr>`;

            // porsi
            for(var x=0; x < data.tanggal_menu.length; x++){
              porsi += `<tr class="GridViewScrollItem"><th style="text-align: center;">${data.tanggal_menu[x].order_dt_create}</th>`;
              
              for(var z=0; z < data.menu_porsi.length; z++){
                var jml_stok = 0;
                for(var y=0; y < data.menu_porsi_jual.length; y++){
                    if((data.menu_porsi_jual[y].order_dt_create == data.tanggal_menu[x].order_dt_create) && (data.menu_porsi_jual[y].produk_id == data.menu_porsi[z].produk_id)){
                        jml_stok += parseInt(data.menu_porsi_jual[y].produk_jml);
                    }
                }
                porsi += `<td style="text-align: right;">${jml_stok}</td>`;
              }
              

              porsi += `</tr>`;
            }

            for(var y=0; y < data.menu_porsi.length; y++){
                var total = 0
                for(var x=0; x < data.total_menu_porsi_jual.length; x++){
                    if(data.total_menu_porsi_jual[x].produk_id == data.menu_porsi[y].produk_id){
                        total += parseInt(data.total_menu_porsi_jual[x].produk_jml);
                    }
                }
                
                porsib += `<td style="text-align: right;">${total}</td>`;
            }
            porsib += `</tr>`;

            // minum
            for(var x=0; x < data.tanggal_menu.length; x++){
              minum += `<tr class="GridViewScrollItem"><th style="text-align: center;">${data.tanggal_menu[x].order_dt_create}</th>`;
              
              for(var z=0; z < data.menu_minum.length; z++){
                var jml_stok = 0;
                for(var y=0; y < data.menu_minum_jual.length; y++){
                    if((data.menu_minum_jual[y].order_dt_create == data.tanggal_menu[x].order_dt_create) && (data.menu_minum_jual[y].produk_id == data.menu_minum[z].produk_id)){
                        jml_stok += parseInt(data.menu_minum_jual[y].produk_jml);
                    }
                }
                minum += `<td style="text-align: right;">${jml_stok}</td>`;
              }
              

              minum += `</tr>`;
            }

            for(var y=0; y < data.menu_minum.length; y++){
                var total = 0
                for(var x=0; x < data.total_menu_minum_jual.length; x++){
                    if(data.total_menu_minum_jual[x].produk_id == data.menu_minum[y].produk_id){
                        total += parseInt(data.total_menu_minum_jual[x].produk_jml);
                    }
                }
                
                minumb += `<td style="text-align: right;">${total}</td>`;
            }
            minumb += `</tr>`;

            // tambah
            for(var x=0; x < data.tanggal_menu.length; x++){
              tambah += `<tr class="GridViewScrollItem"><th style="text-align: center;">${data.tanggal_menu[x].order_dt_create}</th>`;
              
              for(var z=0; z < data.menu_tambah.length; z++){
                var jml_stok = 0;
                for(var y=0; y < data.menu_tambah_jual.length; y++){
                    if((data.menu_tambah_jual[y].order_dt_create == data.tanggal_menu[x].order_dt_create) && (data.menu_tambah_jual[y].produk_id == data.menu_tambah[z].produk_id)){
                        jml_stok += parseInt(data.menu_tambah_jual[y].produk_jml);
                    }
                }
                tambah += `<td style="text-align: right;">${jml_stok}</td>`;
              }
              

              tambah += `</tr>`;
            }

            for(var y=0; y < data.menu_tambah.length; y++){
                var total = 0
                for(var x=0; x < data.total_menu_tambah_jual.length; x++){
                    if(data.total_menu_tambah_jual[x].produk_id == data.menu_tambah[y].produk_id){
                        total += parseInt(data.total_menu_tambah_jual[x].produk_jml);
                    }
                }
                
                tambahb += `<td style="text-align: right;">${total}</td>`;
            }
            tambahb += `</tr>`;

            // paket
            for(var x=0; x < data.tanggal_menu.length; x++){
              paket += `<tr class="GridViewScrollItem"><th style="text-align: center;">${data.tanggal_menu[x].order_dt_create}</th>`;
              
              for(var z=0; z < data.menu_paket.length; z++){
                var jml_stok = 0;
                for(var y=0; y < data.menu_paket_jual.length; y++){
                    if((data.menu_paket_jual[y].order_dt_create == data.tanggal_menu[x].order_dt_create) && (data.menu_paket_jual[y].produk_id == data.menu_paket[z].produk_id)){
                        jml_stok += parseInt(data.menu_paket_jual[y].produk_jml);
                    }
                }
                paket += `<td style="text-align: right;">${jml_stok}</td>`;
              }
              

              paket += `</tr>`;
            }

            for(var y=0; y < data.menu_paket.length; y++){
                var total = 0
                for(var x=0; x < data.total_menu_paket_jual.length; x++){
                    if(data.total_menu_paket_jual[x].produk_id == data.menu_paket[y].produk_id){
                        total += parseInt(data.total_menu_paket_jual[x].produk_jml);
                    }
                }
                
                paketb += `<td style="text-align: right;">${total}</td>`;
            }
            paketb += `</tr>`;

            $('#isi-table-laba').html(htmla);
            $('#foot-table').html(htmlb);

            $('#isi-table-masuk').html(masuk);
            $('#foot-table-masuk').html(masukb);

            $('#isi-table-porsi').html(porsi);
            $('#foot-table-porsi').html(porsib);

            $('#isi-table-minum').html(minum);
            $('#foot-table-minum').html(minumb);

            $('#isi-table-tambah').html(tambah);
            $('#foot-table-tambah').html(tambahb);

            $('#isi-table-paket').html(paket);
            $('#foot-table-paket').html(paketb);

        }, 'json');
    }
    </script>
<?php $this->load->view('mainmenu/admin_footer'); ?>
  </div>
