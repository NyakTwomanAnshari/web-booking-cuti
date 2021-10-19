<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $titleTop;?></title>
  <link rel="icon" href="<?php echo site_url().'assets/icon.png';?>" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo base_url().'resources/fontawesome-free/css/all.min.css';?>">
  <link rel="stylesheet" href="<?php echo base_url().'resources/datatables-bs4/css/dataTables.bootstrap4.min.css';?>">
  <link rel="stylesheet" href="<?php echo base_url().'resources/datatables-responsive/css/responsive.bootstrap4.min.css';?>">
  <link rel="stylesheet" href="<?php echo base_url().'resources/dist/css/datatable.css';?>">

  <link rel="stylesheet" href="<?php echo base_url().'resources/select2/css/select2.min.css';?>">
  <link rel="stylesheet" href="<?php echo base_url().'resources/select2-bootstrap4-theme/select2-bootstrap4.min.css';?>">

  <link rel="stylesheet" href="<?php echo base_url().'resources/icheck-bootstrap/icheck-bootstrap.min.css';?>">
  
  <link rel="stylesheet" href="<?php echo base_url().'resources/dist/css/adminlte.min.css';?>">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <header class="main-header">
    <?php echo $navbar;?>
  </header>
  <div class="content-wrapper">
    <section class="content">
      <div style="min-height: 100px;" class="container mt-5">          
        <?php echo $content;?>
      </div>
    </section>
  </div>
  <footer>
  </footer>
</div>
<?php if($this->acl->is_admin()){
          $this->load->view('scrpt/admin/'.$name_script);
        }elseif($this->acl->is_user()){
          $this->load->view('scrpt/users/'.$name_script);
      };?>
</body>
</html>