<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="BNI Booking Cuti, Cuti BNI, Web Cuti BNI, Pengajuan Cuti BNI" />
    <meta name="description" content="BNI Booking Cuti, Cuti BNI, Web Cuti BNI, Pengajuan Cuti BNI" />
    <meta name="author" content="BNI Kantor Cabang Banda Aceh" />
    <meta content='<?php echo base_url();?>' property='og:url'/>
    <meta property='og:title' content='BNI Booking Cuti'/>
    <meta property='og:description' content='BNI Booking Cuti, Cuti BNI, Web Cuti BNI, Pengajuan Cuti BNI'/>
    <meta name="google-site-verification" content="y_BKaJJAmcfO7SlaMz8E7Z9f1PwNUwXEU9IxQMz8fJo" />
    <meta name="msvalidate.01" content="3348AEC4FC35EB66807AA89084DF9A2E" />
    <title>BNI Booking Cuti</title>
    <link rel="icon" href="<?php echo site_url().'assets/icon.png';?>" type="image/x-icon" />
    <link rel="stylesheet" href="<?php echo base_url().'resources/fontawesome-free/css/all.min.css';?>" />
    <link rel="stylesheet" href="<?php echo base_url().'resources/dist/css/adminlte.min.css';?>" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
</head>
<body class="hold-transition layout-top-nav">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3 float-right pl-5 pr-5 pt-3 pb-5">
                <img src="<?php echo base_url().'assets/images/BankNegaraIndonesia46-logo.png';?>" alt="Logo BNI" style="width: 200px;height: auto;float: right;">
            </div>
        </div>
    </div>
    <div class="login-page" style="min-height: 600px;height: 80vh!important;">
        <div class="card bg-transparent" style="box-shadow:none;">
            <div class="m-auto login-box">
                <div class="pb-4">
                    <div class="row">
                        <div class="col-md-6 m-auto">
                            <h1 class="text-center font-weight-bold">LOGIN</h1>
                        </div>
                    </div>
                </div>
                <div class="mb-3 mr-3 ml-3 bg-transparent">
                    <?php if(!empty($this->session->flashdata('message'))):?>
                    <div class="alert bg-light alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <span class="text-orange"><?php echo $this->session->flashdata('message');?></span>
                    </div>
                    <?php endif;?>
                    <div id="err_msg" style="display:none">
                        <div class="alert bg-light">
                            <div id="msg" class="text-red text-center"></div>
                        </div>
                    </div>
                    <?php echo form_open('auth');?>
                    <div class="form-group pt-3">
                        <label for="npp" class="label-rad">NPP</label>
                        <input type="text" name="npp" id="npp" autocomplete="npp" class="form-control input-rad" placeholder="NPP" required>
                    </div>
                    <div class="form-group pt-3">
                        <label for="password" class="label-rad">PASSWORD</label>
                        <input type="password" name="password" id="password" autocomplete="current-password" class="form-control input-rad" placeholder="Password" required>
                    </div>
                    <div class="mt-4 mb-3 row">
                        <div class="col m-auto text-center">
                            <button id="submit" type="submit" class="btn btn-rad">LOGIN</button>
                        </div>
                    </div>
                    <?php echo form_close();?>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url().'resources/jquery/jquery.min.js';?>"></script>
    <script src="<?php echo base_url().'resources/bootstrap/js/bootstrap.bundle.min.js';?>"></script>
    <script src="<?php echo base_url().'resources/dist/js/adminlte.min.js';?>"></script>
    <script src="<?php echo base_url().'resources/dist/js/login.js';?>"></script>
    <!-- </body></html> -->
</body>
</html>