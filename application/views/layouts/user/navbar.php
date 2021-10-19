<!-- navbar -->
<nav class="main-header navbar navbar-expand-md">

<div class="order-1 order-md-3 navbar-nav navbar-no-expand p-3 mr-auto">
    <div class="pl-3" style="font-size:24px;">
        <?php $n = $this->session->userdata('user_role');
          if($n == 'us3r'){$nm = 'User';};
        ?>
      <span><small class="text-capitalize text-white"><i class="fas fa-user-circle mr-2"></i><?php echo $nm;?></small></span>
    </div>
</div>

<button class="navbar-light navbar-toggler order-1 mr-3" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse order-3" id="navbarCollapse">
  <ul class="navbar-nav font-weight-bold ml-auto p-3" style="background: #333;border-bottom-left-radius: 30px;border-top-left-radius: 30px;">
    <li class="nav-item">
      <a href="<?php echo base_url();?>" class="nav-link text-white">HOME</a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url().'view/user/profil';?>" class="nav-link text-white">PROFIL</a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url().'add/booking/cuti';?>" class="nav-link text-white">BOOKING CUTI</a>
    </li>
    <li class="nav-item">
      <a href="<?php echo base_url().'logout';?>" class="nav-link text-white mr-3">LOG OUT</a>
    </li>

    <a href="<?php echo base_url();?>" class="navbar-brand">
        <img src="<?php echo base_url().'assets/images/BankNegaraIndonesia46-logo.png';?>" alt="Logo BNI" class="brand-image"
             style="background: #ffffff;padding: 5px;border-radius: 5px;">
    </a>

  </ul>
</div>

</nav>
<!-- navbar end -->