<?php if(!empty($this->session->flashdata('message'))):?>
    <div class="alert bg-info alert-dismissible">
        <button type="button" class="close text-red" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $this->session->flashdata('message');?>
    </div>
<?php endif;?>

<div class="card mb-5">
    <div class="pt-5 pb-3">
        <div class="row">
            <div class="col-md-12">
                <h4 class="text-center font-weight-bold pl-3 pr-3">DAFTAR NAMA PEGAWAI YANG MENGAJUKAN CUTI</h4>
            </div>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table id="mytable" class="table table-bordered table-hover">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Tgl Pengajuan</th>
                    <th>Nama</th>
                    <th>Tgl Mulai</th>
                    <th>Tgl Berakhir</th>
                    <th>Unit</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<!-- for reason -->
<div class="modal fade" id="modalAlasan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <div class="row">
                    <div class="col-md-12"><h5 class="modal-title font-weight-bold">Alasan</h5></div>
                    <div class="col-md-12"><span style="border-radius: 10px;margin: -7px;background: #ffffff;padding: 2px 7px 2px 7px;" id="nama"></span> <span style="margin-left:7px">Diajukan :</span> <span id="tgl_pengajuan"></span> , Jenis Cuti : <span class="text-info" id="cj"></span></div>
                </div>
            </div>
            <div class="modal-body">
                <div id="reason"></div>
            </div>
        </div>
    </div>
</div>

<!-- for edit -->
<form action="<?php echo base_url().'action/cuti/'?>" method="POST" enctype="multipart/form-data">
    <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <div class="row">
                        <div class="col-md-12"><h5 class="modal-title font-weight-bold">Permohonan Cuti</h5></div>
                        <div class="col-md-12">Cuti Jenis : <span id="cutiJenis"></span></div>
                    </div>
                </div>
                <div class="modal-body">
                <div class="form-group text-center">
                    <?php echo 'Apakah Anda menyetujui <span class="font-weight-bold" id="name"></span> untuk cuti pada hari<br> <i><span id="dari"></span></i> s/d <i><span id="sampai"></span></i> ?';?>
                </div>
                    <input type="hidden" name="cuti_id" class="form-control" required>
                    <div class="card-body">
                    <div class="row">
                        <div class="col text-right">
                            <button type="submit" name="status_acc" value="Disetujui" class="btn btn-info">Yes</button>
                        </div>
                        <div class="col">
                            <button type="submit" name="status_acc" value="Ditolak" class="btn btn-danger">No</button>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- for delete -->
<form action="<?php echo base_url().'delete/permohonan/cuti'?>" method="POST">
    <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <input type="hidden" name="cuti_id" required>
                    <div class="form-group text-center">
                        <p>Apakah Anda yakin akan menghapus permohonan cuti dari <br><span class="font-weight-bold" id="cuti_name"></span>?</p>
                    </div>
                    <p class="text-warning p-1 text-center" style="border:1px solid #eaeaea"><small>*Setelah menekan tombol <span class="text-red">delete</span>, data tidak bisa dikembalikan</small></p>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>