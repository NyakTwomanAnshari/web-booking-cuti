<div class="card-body bg-transparent">
    <div class="pt-4">
        <div class="row">
            <div class="col-md-6 m-auto">
                <h1 class="text-center font-weight-bold title-rad">PROFIL</h1>
            </div>
        </div>
    </div>

    <?php if(!empty($this->session->flashdata('gagal'))):?>
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="alert bg-danger alert-dismissible">
                    <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('gagal');?>
                </div>
            </div>
        </div>
    <?php elseif(!empty($this->session->flashdata('sukses'))):?>
        <div class="row">
            <div class="col-md-6 m-auto">
                <div class="alert bg-info alert-dismissible">
                    <button type="button" class="close text-white" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $this->session->flashdata('sukses');?>
                </div>
            </div>
        </div>
    <?php endif;?>
    
    <div class="row">
        <div class="col-md-6 m-auto">
            <form action="" method="POST">
                <div class="card-body">
                    <div class="form-group pt-3">
                        <label for="name" class="label-rad">NAMA</label>
                        <input type="text" name="name" class="form-control input-rad" value="<?php echo $users->name;?>" disabled>
                    </div>
                    
                    <div class="form-group pt-3">
                        <label for="npp" class="label-rad">NPP</label>
                        <input type="text" name="npp" class="form-control input-rad" value="<?php echo $users->npp;?>" disabled>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <a href="<?php echo base_url().'edit/user/profil';?>" class="btn bg-white btn-rad">EDIT PROFIL</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>