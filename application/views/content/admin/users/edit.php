<div class="row">
    <div class="col-md-12 text-left">
        <div class="mt-3 mb-3">
            <a href="<?php echo base_url().'view/users/data';?>" id="add-form" class="btn btn-info btn-sm"><i class = "fa fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
</div>

<?php if(!empty($this->session->flashdata('gagal'))):?>
    <div class="row">
        <div class="col-md-12 m-auto">
            <div class="alert bg-danger alert-dismissible">
                <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->flashdata('gagal');?>
            </div>
        </div>
    </div>
<?php elseif(!empty($this->session->flashdata('message'))):?>
    <div class="row">
        <div class="col-md-12 m-auto">
            <div class="alert bg-info alert-dismissible">
                <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
                <?php echo $this->session->flashdata('message');?>
            </div>
        </div>
    </div>
<?php endif;?>

<!-- for edit -->

<div class="card">
    <div class="pt-5 pb-3">
        <div class="row">
            <div class="col-md-12">
            <?php if($users->user_id == 1):?>
                <h4 class="text-center font-weight-bold">PENGEDITAN ADMIN</h4>
            <?php else:?>
                <h4 class="text-center font-weight-bold">PENGEDITAN USER</h4>
            <?php endif;?>
            </div>
        </div>
    </div>
    <form action="" method="POST">
        <div class="card-body">
            <input type="text" hidden name="user_id" value="<?php echo $users->user_id;?>" required>
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" value="<?php echo $users->name;?>" required>
            </div>

            <div class="form-group">
                <label for="npp">NPP</label>
                <input type="text" name="npp" class="form-control" value="<?php echo $users->npp;?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $users->email;?>" required>
            </div>

            <div class="form-group">
                <label for="no_tlp">No Telepon</label>
                <input type="text" name="no_tlp" class="form-control" value="<?php echo $users->no_tlp;?>" required>
            </div>

            <?php if($users->user_id == 1):?>

            <div class="form-group pt-3">
            <label for="current_password">Current Password</label>
                <input type="password" name="current_password" class="form-control" placeholder="current password.." required>
            </div>

            <div class="form-group pt-3">
                <label for="new_password">New Password</label>
                <input type="password" name="new_password" class="form-control" placeholder="new password.." required>
            </div>
            <input type="text" name="user_role" value="adm1n" required hidden>
            <input type="text" name="user_status" value="1" required hidden>

            <?php else:?>

            <div class="form-group">
                <label for="user_role">Role</label>
                <select name="user_role" class="form-control" style="width: 100%;" required>
                    <option value="<?php echo $users->user_role;?>"><?php 
                        if($users->user_role === 'us3r'){
                            $v ='User';
                        }else if($users->user_role === 'adm1n'){
                            $v = 'Admin';
                        }else{$v='-- Pilih Role --';}
                        echo $v;?></option>
                    <option value="us3r" id="user_role">User</option>
                    <option value="adm1n" id="user_role">Admin</option>
                </select>
            </div>

            <input type="password" hidden name="password" value="123456" required>
            <div class="form-group">
                <small>* Setelah menekan tombol update, password akan menjadi default</small><br>
                <small>* Default Password adalah 123456</small>
            </div>

            <div class="form-group">
                <label for="user_status">Status User</label>
                <div class="form-group clearfix">
                    <div class="icheck-primary d-inline">
                        <input type="radio" name="user_status" id="<?php echo '1';?>" <?php if ($users->user_status=='1'){echo 'checked';} ?>  value="1" required>
                        <label for="<?php echo '1';?>">Aktif</label>
                    </div>
                    <div class="icheck-primary d-inline pl-2">
                        <input type="radio" name="user_status" id="<?php echo '2';?>" <?php if ($users->user_status=='0'){echo 'checked';} ?>  value="0" required>
                        <label for="<?php echo '2';?>" class="m-l-20">Nonaktif</label>
                    </div>
                </div>
            </div>
            <?php endif;?>

            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-warning"><i class="fa fa-edit"></i> SUBMIT</button>
                </div>
            </div>
        </div>
    </form>
</div>