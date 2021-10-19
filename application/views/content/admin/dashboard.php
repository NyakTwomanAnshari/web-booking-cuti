<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title><?php echo $titleTop;?></title>
  <link rel="icon" href="<?php echo site_url().'assets/icon.png';?>" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo base_url().'resources/fontawesome-free/css/all.min.css';?>">
  <link rel="stylesheet" href="<?php echo base_url().'resources/datatables-responsive/css/responsive.bootstrap4.min.css';?>">
  <link rel="stylesheet" href="<?php echo base_url().'resources/select2-bootstrap4-theme/select2-bootstrap4.min.css';?>">
  <link rel="stylesheet" href="<?php echo base_url().'resources/dist/css/adminlte.min.css';?>">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.9"></script>
  <style>
      .typed {
          color: #000000;
          font-size: 27px;
          /* border-bottom: 1px solid #000000; */
      }
      
      .typed-cursor {
          opacity: 1;
          animation: blink 0.7s infinite;
      }
      
      @keyframes blink {
          0% {
              opacity: 1;
          }
          50% {
              opacity: 0;
          }
          100% {
              opacity: 1;
          }
      }
      @media screen and (max-width:767px){
        .typ {
          background: rgb(255 255 255 / 0.8);
          margin: 15px 15px 40px 15px;
          border-radius: 10px;
        }
      }
  </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <header class="main-header">
    <?php $this->load->view('layouts/admin/navbar');?>
  </header>
  <div class="content-wrapper">
    <section class="content">
    <div class="login-page" style="height: 90vh!important;">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-6 m-auto">
            <div class="text-center p-5 typ">
              <span id="typed" class="typed"></span>
            </div>
            </div>
          </div>
          <div class="col-md-5 m-auto">
            <div class="text-center">
              <img src="<?php echo base_url().'assets/images/BankNegaraIndonesia46-logo.png';?>" alt="Logo BNI" style="max-width: 200px;height: auto;">
            </div>
          </div>
        </div>
    </div>
    </section>
  </div>
  <footer>
  </footer>
</div>
<?php $this->load->view('scrpt/admin/dashboard');?>
<script>
    new Typed('#typed', {
        strings: ['Selamat Datang di Website Booking Cuti BNI Kantor Cabang Banda Aceh'],
        typeSpeed: 100,
        delaySpeed: 100,
        loop: true
    });
</script>
</body>
</html>