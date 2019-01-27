<!DOCTYPE html>
<html>
<head>
<title>MTI Trading Ltd.</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<link href="<?= base_url();?>assets/frontend/layout/styles/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="<?= base_url();?>assets/frontend/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<link href="<?= base_url();?>assets/frontend/layout/styles/products.css" rel="stylesheet" type="text/css" media="all">
<link href="<?= base_url();?>assets/frontend/layout/styles/galary.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/frontend/layout/wowslider/style.css" />

</head>
<body id="top">
<!-- ################################################################################################ --> 

<!-- ################################################################################################ -->
<div class="wrapper row0">
  <div id="topbar" class="clear"> 
    <!-- ################################################################################################ -->
    <nav>
      <ul>
        <li><a href="<?= base_url(); ?>">Home</a></li>
        <li><a href="#"><?= $contactUs->contact_email ?></a></li>
        <li><a href="#"><?= $contactUs->contact_phone ?></a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ --> 
  </div>
</div>
<!-- ################################################################################################ --> 
<div class="wrapper row1">
  <header id="header" class="clear"> 
    <div id="logo" class="fl_left">
      <img src="<?= base_url();?>assets/frontend/images/logo.png" style="height: auto; width: 100px; border-radius: 5px;">
      <h1 style="display: inline-block;"><a href="<?= base_url(); ?>"><span>MTI Trading Limited</span></a></h1>
    </div>
  </header>
</div>

<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <div class="rounded">
    <nav id="mainav" class="clear"> 
      <ul class="clear">
        <li class="active"><a href="<?= base_url(); ?>">Home</a></li>
        <li><a class="drop" href="#">MTI-Machine</a>
          <ul>
            <?php if(isset($products) && $products): foreach($products as $product):?>
            <li><a href="<?= base_url();?>product/<?= $product->id ?>"><?= ucfirst($product->title); ?></a></li>
            <?php endforeach; endif; ?>
            
          </ul>
        </li>
        <li><a class="drop" href="#">Production Unit</a>
          <ul>
            
            <?php if(isset($production) && $production): foreach($production as $pro):?>
            <li>
              <a href="<?= base_url(); ?>production_unit/<?= $pro->service_id ?>"><?= ucfirst($pro->service_title); ?></a>
            </li>
          <?php endforeach; endif; ?>
          </ul>
        </li>
        <li><a href="<?= base_url('about_us')?>">About Us</a></li>
        <li><a href="<?= base_url('profile')?>">Profile</a></li>
        <li><a href="<?= base_url('galary')?>">Photo & Video</a></li>
        <li><a href="<?= base_url('news_events')?>">Update News</a></li>
        <li><a href="<?= base_url('contact_us')?>">Contact Us</a></li>
      </ul>
    </nav>
  </div>
</div>
<!-- ################################################################################################ --> 
