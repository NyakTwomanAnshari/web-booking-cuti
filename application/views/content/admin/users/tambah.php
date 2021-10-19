<div class="row">
    <div class="col-md-12 text-right">
        <div class="form-group">
            <a href="<?php echo base_url().'view/users/data';?>" class="btn btn-info"> Lihat Daftar User</a>
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
                <h4 class="text-center font-weight-bold">PENAMBAHAN USER</h4>
            </div>
        </div>
    </div>
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" value="<?php echo set_value('name');?>" placeholder="nama.." required>
            </div>
            
            <div class="form-group">
                <label for="npp">NPP</label>
                <input type="text" name="npp" value="<?php echo set_value('npp');?>" class="form-control" placeholder="npp.." required>
            </div>

            <div class="form-group">
                <small>* Untuk login pertama kali, user diatas menggunakan Password Default</small><br>
                <small>* Default Password adalah 123456</small>
            </div>
            
            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-warning">SUBMIT</button>
                </div>
            </div>
        </div>
    </form>
</div>