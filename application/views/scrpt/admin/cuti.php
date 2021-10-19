<script src="<?php echo base_url().'resources/jquery/jquery.min.js';?>"></script>
<script src="<?php echo base_url().'resources/bootstrap/js/bootstrap.bundle.min.js';?>"></script>

<script src="<?php echo base_url().'resources/moment/moment.min.js';?>"></script>

<script src="<?php echo base_url().'resources/datatables/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo base_url().'resources/datatables-bs4/js/dataTables.bootstrap4.min.js';?>"></script>
<script src="<?php echo base_url().'resources/datatables-responsive/js/dataTables.responsive.min.js';?>"></script>
<script src="<?php echo base_url().'resources/datatables-responsive/js/responsive.bootstrap4.min.js';?>"></script>

<script src="<?php echo base_url().'resources/datatables/datatime.js';?>"></script>

<script src="<?php echo base_url().'resources/datatables/extensions/export/dataTables.buttons.min.js';?>"></script>
<script src="<?php echo base_url().'resources/datatables/extensions/export/buttons.flash.min.js';?>"></script>
<script src="<?php echo base_url().'resources/datatables/extensions/export/jszip.min.js';?>"></script>
<script src="<?php echo base_url().'resources/datatables/extensions/export/pdfmake.min.js';?>"></script>
<!-- <script src="<?php echo base_url().'resources/datatables/extensions/export/vfs_fonts.js';?>"></script> -->
<script src="<?php echo base_url().'resources/datatables/extensions/export/buttons.html5.min.js';?>"></script>
<script src="<?php echo base_url().'resources/datatables/extensions/export/buttons.print.min.js';?>"></script>

<script src="<?php echo base_url().'resources/dist/js/adminlte.min.js';?>"></script>
<script src="<?php echo base_url().'resources/dist/js/theme.js';?>"></script>

<script>
var editor;

  $(document).ready(function(){
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings){
      return {
        "iStart": oSettings._iDisplayStart,
        "iEnd": oSettings.fnDisplayEnd(),
        "iLength": oSettings._iDisplayLength,
        "iTotal": oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings.iDisplayLength),
        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
      };
    };
    var table = $("#mytable").dataTable({
      "responsive":true,
      "autoWidth":false,
      dom: 'Bfrtip',
        buttons: [
            // 'copy',
            // 'csv',
            'excel'
            // 'pdf',
            // 'print'
        ],
      initComplete: function() {
        var api = this.api();
        $("mytable_filter input")
        .off('.DT')
        .on('input.DT', function() {
          api.search(this.value).draw();
        });
      },
        oLanguage:{
        sProcessing:"Loading.."
      },
        processing:true,
        serverSide:true,
        ajax:{"url": "<?php echo base_url().'admin/cuti/get_json'?>", "type":"POST"},
          columns:[
              {"data":'index', defaultContent:''},
              {"data":"created_at"},
              {"data":"name"},
              {"data":"from_date",},
              {"data":"until_date",},
              {"data":"unit"},
              {"data":"action"},
          ],
          order:[[0, 'desc']],
          columnDefs:[
            {"targets":0,
            "searchable":false,
            "orderable":false,
              render: function(data,type,full,meta){
                return meta.row+1;
              }
            },
            {"targets":-1,
            "searchable":false,
            "orderable":false
            },
            {"targets":1,
              render: $.fn.dataTable.render.intlDateTime('id', {
                weekday: 'short', 
                year: 'numeric', month: 'long', day: 'numeric',
                // hour: 'numeric', minute: 'numeric', second: 'numeric',
                // hour12: false,
              })
            },
            {"targets":3,
              render: $.fn.dataTable.render.intlDateTime('id', {
                weekday: 'short', year: 'numeric', month: 'long', day: 'numeric',
                year: 'numeric', month: 'long', day: 'numeric'
              })
            },
            {"targets":4,
              render: $.fn.dataTable.render.intlDateTime('id', {
                weekday: 'short', year: 'numeric', month: 'long', day: 'numeric',
                year: 'numeric', month: 'long', day: 'numeric'
              })
            }
          ],
          order:[[1,'desc']],
    });
  });

  // alasan
  $('#mytable').on('click','.alasan_record',function(){
      $('#modalAlasan').modal('show');
      var nama = $(this).data('name');
      var tgl_pengajuan = $(this).data('created_at');
      var cj = $(this).data('cuti_jenis')

      var event1 = new Date(tgl_pengajuan);
      var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      document.getElementById('tgl_pengajuan').innerHTML = event1.toLocaleString('id', options);
      document.getElementById('nama').innerHTML = nama;
      document.getElementById('cj').innerHTML = cj;

      $("#reason").html(
          '<div class="form-group">'+
              '<div>'+$(this).data('alasan')+'</div>'+
          '</div>'+
          '<div class="row">'+
              '<div class="col-md-12 text-center">'+
                  '<button type="button" class="ml-2 btn btn-default" data-dismiss="modal">Close</button>'+
              '</div>'+
          '</div>'
      );
  });

  // for edit
  $('#mytable').on('click','.edit_record',function(){
      var kode=$(this).data('cutikode');
      var cj=$(this).data('cutijenis');
      var name=$(this).data('name');
      var dari=$(this).data('from');
      var sampai=$(this).data('until');

      var event1 = new Date(dari);
      var event2 = new Date(sampai);
      var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
      document.getElementById('dari').innerHTML = event1.toLocaleString('id', options);
      document.getElementById('sampai').innerHTML = event2.toLocaleString('id', options);

      document.getElementById('cutiJenis').innerHTML = cj;
      document.getElementById('name').innerHTML = name;
      $('#ModalUpdate').modal('show');
      $('[name="cuti_id"]').val(kode);
  });

  // for delete cuti
  $('#mytable').on('click','.delete_record',function(){
      var kode=$(this).data('cutikode');
      var cn=$(this).data('cutiname');
      $('#ModalDelete').modal('show');
      $('[name="cuti_id"]').val(kode);
      document.getElementById('cuti_name').innerHTML = cn;
  });

  // for timeout
  window.setTimeout(function() {
    $(".alert-dismissible").fadeTo(700, 0).slideUp(500, function(){
        $(this).remove(); }); 
    }, 7000);

</script>