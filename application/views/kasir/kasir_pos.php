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
            <h1 class="m-0">Pos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pembukuan</li>
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
                    <a class="btn btn-block btn-secondary" href="<?php echo base_url().'Kasir/tambah_pos'?>">Tambah Pos</a>
                </div>
            </div>
            <br>
            <div class="card card-secondary card-tabs">
              <div class="card-body">
                    <table id="tbl_pos" class="table table-borderless table-striped">
                        <thead>
                          <tr>
                              <th class="text-center">KODE POS</th>
                              <th class="text-center">NAMA POS</th>
                              <th></th>
                          </tr>
                        </thead>
                    </table>
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
      var table = $('#tbl_pos').DataTable({
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
              [0, "asc"]
          ],
          'processing': true,
          "responsive": true,
          'serverSide': true,
          "searching": false,
          'serverMethod': 'post',
          'ajax': {
              'url': '<?php echo base_url().'Kasir/tbl_pos'?>'
          },
          'columns': [
              {
                  data: 'kd_pos', className: 'text-center'
              },
              {
                  data: 'nm_pos'
              },
              {
                  data: 'cek', className: 'text-center'
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
                  <td>Kode Pos</td>
                  <td>:</td>
                  <td><p id="pos_kode" style="margin: 0;"></p></td>
                </tr>
                <tr>
                  <td>Nama Pos</td>
                  <td>:</td>
                  <td><p id="pos_nama" style="margin: 0;"></p></td>
                </tr>
              </table>
            </div>
            <div class="modal-footer justify-content-between">
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <script>
        $('#modal-default').on('show.bs.modal', function(event) {
          var button = $(event.relatedTarget)
          var recipient = button.data('whatever')
          var modal = $(this);
          var dataString = 'id=' + recipient
          $.get('<?php echo base_url('Kasir/get_detail_pos')?>', dataString, function(data){
              $('#pos_kode').html(data.detail[0].kd_pos);
              $('#pos_nama').html(data.detail[0].nm_pos);
          }, 'json');
        });
      </script>

      <div class="modal fade" id="modal-hapus">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">DISABLED POS : </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div>
                Apakah anda yakin untuk menghapus pos ini ?
              </div>
            </div>
            <div class="modal-footer justify-content-between">
            <input type="hidden" name="kd_pos_hapus" id="kd_pos_hapus">
            <button class="btn btn-danger" id="submit_hapus" name="submit_hapus">Hapus</button>
            
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <script>
        $('#modal-hapus').on('show.bs.modal', function(event) {
          var button = $(event.relatedTarget)
          var recipient = button.data('whatever')
          var modal = $(this);
          var dataString = 'id=' + recipient
          
          $('#kd_pos_hapus').val(recipient);
        });

        $('#submit_hapus').on('click', function(){
          var id = $('#kd_pos_hapus').val();

          var dataString = 'id='+id;

          $.post("<?php echo base_url('Kasir/hapus_pos')?>", dataString, function(data){
            $('#modal-hapus').modal('hide');
            $('#tbl_pos').DataTable().ajax.reload();
          });

        })
      </script>
<?php $this->load->view('mainmenu/admin_footer'); ?>