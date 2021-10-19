<script src="<?php echo base_url().'resources/jquery/jquery.min.js';?>"></script>
<script src="<?php echo base_url().'resources/bootstrap/js/bootstrap.bundle.min.js';?>"></script>

<script src="<?php echo base_url().'resources/select2/js/select2.full.min.js'?>"></script>

<script src="<?php echo base_url().'resources/datatables/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo base_url().'resources/datatables-bs4/js/dataTables.bootstrap4.min.js';?>"></script>
<script src="<?php echo base_url().'resources/datatables-responsive/js/dataTables.responsive.min.js';?>"></script>
<script src="<?php echo base_url().'resources/datatables-responsive/js/responsive.bootstrap4.min.js';?>"></script>

<script src="<?php echo base_url().'resources/dist/js/adminlte.min.js';?>"></script>
<script src="<?php echo base_url().'resources/dist/js/theme.js';?>"></script>

<script>
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
        ajax:{"url": "<?php echo base_url().'admin/users/get_json'?>", "type":"POST"},
          columns:[
              {"data":'index', defaultContent:''},
              {"data":"name"},
              {"data":"npp"},
              {"data":"user_role"},
              {"data":"user_status"},
              {"data":"user_id"}
          ],
          "columnDefs":[
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
            {"targets":3,
              render : function(data,type,row){
                switch(data){
                  case 'adm1n' : return 'Admin'; break;
                  case 'us3r' : return 'User'; break;
                  default : return '';
                }
              }
            },
            {"targets":4,
              render : function(data,type,row){
                switch(data){
                  case '1' : return 'Aktif'; break;
                  case '0' : return '<span class="text-red">Nonaktif</span>'; break;
                  default : return '';
                }
              }
            },
            {"targets":5,
              render : function(data,type,row){
                if(data != 1){
                  return row['action'];
                }else{
                  return row['actions'];
                }
              }
            }
          ],
          order:[[1, 'desc']],
          rowCallback: function(row, data, iDisplayIndex){
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            $('td:eq(0)', row).html();
          }
    });
  });

  // for detail
  $('#mytable').on('click','.detail_record',function(){
      var kode=$(this).data('userkode');
      var email=$(this).data('email');
      var name=$(this).data('name');
      var npp=$(this).data('npp');
      var no_tlp=$(this).data('no_tlp');
      var user_role=$(this).data('user_role');
        if(user_role === 'us3r'){
          user_role = 'User';
        }else if(user_role === 'adm1n'){
          user_role = 'Admin';
        }
      var user_status=$(this).data('user_status');
        if(user_status === 0){
          user_status = 'Nonaktif';
        }else if(user_status === 1){
          user_status = 'Aktif';
        }
      var created=$(this).data('created_at');
      // console.log($(this).data());
      $('#ModalDetail').modal('show');
      document.getElementById('user_id').innerHTML = kode;
      document.getElementById('email').innerHTML = email;
      document.getElementById('name').innerHTML = name;
      document.getElementById('npp').innerHTML = npp;
      document.getElementById('no_tlp').innerHTML = no_tlp;
      document.getElementById('user_role').innerHTML = user_role;
      document.getElementById('user_status').innerHTML = user_status;

      var event1 = new Date(created);
      var options = {
        weekday: 'long',
        year: 'numeric', month: 'long', day: 'numeric',
        hour: 'numeric', minute: 'numeric', second: 'numeric', 
        timeZone: 'Asia/Jakarta',
        timeZoneName: 'short'
      };
      document.getElementById('created_at').innerHTML = event1.toLocaleString('id', options);
  });

  // for edit
  $('#mytable').on('click','.edit_record',function(){
      var kode=$(this).data('userkode');
      window.location.href = "<?php echo base_url().'update/users/'?>"+kode;
  });

  // for hapus
  $('#mytable').on('click','.delete_record',function(){
      var kode=$(this).data('userkode');
      var name=$(this).data('name');
      $('#ModalDelete').modal('show');
      $('[name="user_id"]').val(kode);
      document.getElementById('users_name').innerHTML = name;
      document.getElementById('users_name2').innerHTML = name;
  });

   // for timeout
   window.setTimeout(function() {
    $(".alert-dismissible").fadeTo(700, 0).slideUp(500, function(){
        $(this).remove(); }); 
    }, 7000);

    $(function () {
    //Initialize Select2 Elements
      $('.select2').select2()
    })

</script>