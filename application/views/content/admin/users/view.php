<div class="row">
    <div class="col-md-12 text-left">
        <div class="mt-3 mb-3">
            <a href="<?php echo base_url().'add/users/data';?>" class="btn btn-info btn-sm"><i class = "fa fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
</div>

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
                <h4 class="text-center font-weight-bold">DAFTAR SEMUA USER</h4>
            </div>
        </div>
    </div>
    <div class="card-body table-responsive">
        <table id="mytable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NPP</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th width="120">Action</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>

<!-- for add -->
<form id="addform">
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
                </div>
                <div class="modal-body">
                    <div id="pesan-error" class="alert alert-danger"></div>
                    <div id="pesan-success" class="alert alert-info"></div>
                    
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo set_value('email');?>" placeholder="email.." required>
                        <small class="text-muted">*unique email</small>
                    </div>

                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" name="name" class="form-control" value="<?php echo set_value('name');?>" placeholder="nama.." required>
                    </div>
                    
                    <div class="form-group">
                        <label for="npp">NPP</label>
                        <input type="text" name="npp" value="<?php echo set_value('npp');?>" class="form-control" placeholder="npp.." required>
                    </div>

                    <div class="form-group">
                        <label for="user-role">Role</label>
                        <select name="user_role" class="form-control show-tick" required>    
                            <option value="">-- Pilih Role --</option>
                            <option value="us3r">User</option>                                                       
                            <option value="adm1n">Admin</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-danger">Save</button>
                            <!-- <button type="reset" id="btn-reset" class="btn btn-info">Reset</button> -->
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- for detail -->
<div class="modal fade" id="ModalDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h4 class="modal-title" id="myModalLabel">Info Detail User</h4>
            </div>
            <div class="modal-body bg-lightblue disabled">
                <div class="card-body table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><span class="font-weight-bold">User Id</span></td>
                                <td><span id="user_id" ></span></td>
                            </tr>
                            <tr>
                                <td><span class="text-warning">Nama</span></td>
                                <td><span id="name" ></span></td>
                            </tr>
                            <tr>
                                <td><span class="text-warning">NPP</span></td>
                                <td><span id="npp" ></span></td>
                            </tr>
                            <tr>
                                <td><span class="text-warning">Email</span></td>
                                <td><span id="email" ></span></td>
                            </tr>
                            <tr>
                                <td><span class="text-warning">No Telepon</span></td>
                                <td><span id="no_tlp" ></span></td>
                            </tr>
                            <tr>
                                <td><span class="text-warning">Role</span></td>
                                <td><span id="user_role" ></span></td>
                            </tr>
                            <tr>
                                <td><span class="text-warning">Status User</span></td>
                                <td><span id="user_status" ></span></td>
                            </tr>
                            <tr>
                                <td><span class="text-warning">Akun Dibuat Pada</span></td>
                                <td><span id="created_at" ></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- for delete -->
<form action="<?php echo base_url().'delete/users'?>" method="POST">
    <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <input type="hidden" name="user_id" required>
                    <div class="form-group text-center">
                        <p>Apakah Anda yakin akan menghapus user <span class="font-weight-bold" id="users_name"></span> ?</p>
                    </div>
                    <div class="form-group text-center" style="background: #ffffd3;padding: 7px;">
                        <small>*Setelah menekan tombol delete, data cuti milik <span class="font-weight-bold" id="users_name2"></span> juga akan terhapus dan tidak bisa dikembalikan</small>
                    </div>
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