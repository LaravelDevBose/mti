<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= (strlen($title) > 2 )? $title : 'DashBoard';?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/vendor/font-awesome/css/font-awesome.min.css">
  <!-- Fontastic Custom icon font-->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/css/fontastic.css">
  <!-- Google fonts - Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
  <!-- jQuery Circle-->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/css/grasp_mobile_progress_circle-1.0.0.min.css">
  <!-- Custom Scrollbar-->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="<?= base_url()?>assets/backend/css/custom.css">
  <!-- Favicon-->
  <!-- <link rel="shortcut icon" href="<?= base_url()?>assets/backend/<?= base_url()?>assets/backend/img/favicon.ico"> -->

  
  <!--/Rich Text Box Links -->
    <script src="<?= base_url() ?>assets/backend/ckeditor/ckeditor.js"></script>
  <!--//Rich Text Box Links -->
  

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<body>
  <!-- Side Navbar -->
  <nav class="side-navbar">
    <div class="side-navbar-wrapper">
      <!-- Sidebar Header    -->
      <div class="sidenav-header d-flex align-items-center justify-content-center">
        <!-- User Info-->
        <div class="sidenav-header-inner text-center">
          <?php if($this->session->userdata('role') == 1): ?>
          <img src="<?= base_url()?>assets/backend/img/Superman.png" alt="person" class="img-fluid rounded-circle">
          <?php else: ?>
            <img src="<?= base_url()?>assets/backend/img/user.png" alt="person" class="img-fluid rounded-circle">
          <?php endif ?>
          <h2 class="h5"><?php echo $this->session->userdata('fname');?></h2><span>
              
            <?php echo $this->Rolemodel->get_role_byID($this->session->userdata('role'))->role_name; ?>

          </span>
        </div>
        <!-- Small Brand information, appears on minimized sidebar-->
        <div class="sidenav-header-logo"><a href="<?= base_url()?>/Dashboard" class="brand-small text-center"> <strong>C</strong><strong class="text-primary">H</strong></a></div>
      </div>
      <!-- Sidebar Navigation Menus-->
      <div class="main-menu">
        <h5 class="sidenav-heading">Main</h5>
        <ul id="side-main-menu" class="side-menu list-unstyled">
      <?php if($this->session->userdata('role') == 1): ?>
          <li><a href="<?= base_url();?>Dashboard"> <i class="fa fa-tachometer"></i>Dashboard </a></li>
          <li><a href="<?= base_url();?>SliderCrud"> <i class="fa fa-sliders"></i>Slider</a></li>
          <!-- <li><a href="<?= base_url();?>Director"> <i class="fa fa-address-book"></i>Director Message</a></li> -->
          <li><a href="<?= base_url();?>About/about"> <i class="fa fa-address-book"></i>About Us</a></li>
          <li><a href="<?= base_url();?>About/welcome"> <i class="fa fa-address-book"></i>Welcome Note</a></li>
          <li><a href="<?= base_url();?>About/profile"> <i class="fa fa-address-book"></i>Profile</a></li>
          <!-- <li><a href="<?= base_url();?>Company"> <i class="fa fa-address-book"></i>Company</a></li> -->
          <li><a href="<?= base_url();?>Product"> <i class="fa fa-address-book"></i>Product</a></li>
          <!-- <li><a href="<?= base_url();?>Award"> <i class="fa fa-address-book"></i>Award</a></li> -->
          <!-- <li><a href="<?= base_url();?>Seller"> <i class="fa fa-address-book"></i>Top Seller</a></li> -->
          <li><a href="<?= base_url();?>Service"><i class="fa fa-medkit"></i>Production</a></li>
          <!-- <li><a href="<?= base_url();?>Team"><i class="fa fa-medkit"></i>Team</a></li> -->
          <li><a href="<?= base_url();?>GalleryCrud"> <i class="fa fa-camera"></i>Gallery</a></li>
          <!-- <li><a href="<?= base_url();?>VideoCrud"> <i class="fa fa-camera"></i>Video</a></li> -->
          <li><a href="<?= base_url();?>NewsCrud"> <i class="fa fa-sticky-note-o "></i>News</a></li>

          <li><a href="<?= base_url();?>ContactCrud"> <i class="fa fa-plug"></i>Contact Us</a></li>
          <!-- <li><a href="<?= base_url();?>Notes"> <i class="fa fa-comments"></i>Header Notes</a></li> -->
          <!-- <li><a href="<?= base_url();?>Message"> <i class="fa fa-comments"></i>Message</a></li> -->
          <li><a href="<?= base_url();?>Users"> <i class="fa fa-users"></i>Users</a></li>
          <?php endif; ?>
          <!-- <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Example dropdown </a>
            <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
              <li><a href="#">Page</a></li>
              <li><a href="#">Page</a></li>
              <li><a href="#">Page</a></li>
            </ul>
          </li> -->
          </ul>
        </div>
       </div>
      </nav>
      <div class="page">
        <!-- navbar-->
        <header class="header">
          <nav class="navbar">
            <div class="container-fluid">
              <div class="navbar-holder d-flex align-items-center justify-content-between">
                <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a target="_blank" href="<?= base_url();?>" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span></span><strong class="text-primary"><?= $this->site_name?></strong></div></a></div>
                  <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    <!-- Log out-->
                    <li class="nav-item">

                      <a href="<?= base_url('Logout');?>" class="nav-link logout">
                        <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i>
                      </a>

                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </header>



                <!-- Main Body Content Start -->

                <?php
                if(isset($main_content)):
                  $this->load->view($content_path.'/'.$main_content,TRUE);
                endif;
                ?>

                <!-- Main Body Content End -->







    <footer class="main-footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <p>LinkUp Tech &copy; 2018</p>
          </div>
          <div class="col-sm-6 text-right">
            <p>Developed by <a href="http://linktechbd.com/" class="external">LinkUp Tech</a></p>
          </div>
        </div>
      </div>
    </footer>
  </div>
  <!-- JavaScript files-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="<?= base_url()?>assets/backend/vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url()?>assets/backend/vendor/popper.js/umd/popper.min.js"> </script>
  <script src="<?= base_url()?>assets/backend/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?= base_url()?>assets/backend/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
  <script src="<?= base_url()?>assets/backend/vendor/jquery.cookie/jquery.cookie.js"> </script>
  <script src="<?= base_url()?>assets/backend/vendor/chart.js/Chart.min.js"></script>
  <script src="<?= base_url()?>assets/backend/vendor/jquery-validation/jquery.validate.min.js"></script>
  <script src="<?= base_url()?>assets/backend/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="<?= base_url()?>assets/backend/js/charts-home.js"></script>
  <!-- Main File-->
  <script src="<?= base_url()?>assets/backend/js/front.js"></script>
  </body>
  </html>

<script>
    $('#gallery_type').change(function(e){
        var type = e.target.value;
        if(type == 'image'){
            $('#image').show();
            $('#video').hide();
            $('#video_path').val('');
        }else{
            $('#video').show();
            $('#image').hide();
            $('#image_path').val('');
        }
    });
</script>
<script type="text/javascript">

$(document).ready(function(){


    // Header note dynamic select start
    $('#position').on('change',function(){
        var note_position = $(this).val();
        if(note_position){
            $.ajax({
                type:'GET',
                url:'<?php echo base_url('Notes/Get')?>',
                data:'note_position='+note_position,
                dataType:"text",
                cache:false,
                success:function(data){
                    var obj = $.parseJSON(data);
                     CKEDITOR.instances['note_des'].setData(obj.note_des);         
                }
            }); 
        }
    });
    // Header note dynamic select end


});
</script>