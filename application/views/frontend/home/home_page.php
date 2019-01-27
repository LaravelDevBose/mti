
<div class="one_half" style="margin-left: 5px;"> 
  
    <div id="twitter" class="group btmspace-15" style="background-color: #054346;" >
        <div class="three_quarter first bold" style="margin-left: 0px;">
            <h5 style="text-align: center; font-weight: 700; "><?= ucfirst($welcome->about_title); ?></h5>
            <p><?= $welcome->about_des?></p>
        </div>
        <div class="one_quarter center" style="margin-left: 2px;"><img src="<?= base_url(); ?>uploads/about/<?= $welcome->about_image_path; ?>" alt="<?= ucfirst($welcome->about_title); ?>"></div>
     </div>

    <div id="twitter" class="group btmspace-15" style="background: #087e8a;">
        <div class="one_quarter first center" ><img src="<?= base_url(); ?>uploads/about/<?= $about->about_image_path; ?>" alt="<?= ucfirst($about->about_title); ?>"></div>
    
        <div class="three_quarter bold" style="margin-left: 3px;">
            <h5 style="text-align: center; font-weight: 700; "><?= ucfirst($about->about_title); ?></h5>
            <p><?= substr(strip_tags($about->about_des), 0,200)?>..     <a href="<?= base_url('about_us')?>" style="float: right;">Read More</a></p>
        </div>
    </div>
    <div id="twitter" class="group btmspace-15" >
        <div class="three_quarter first bold" style="margin-left: 0px;">
            <h5 style="text-align: center; font-weight: 700; "><?= ucfirst($profile->about_title); ?></h5>
            <p><?= substr(strip_tags($profile->about_des), 0,200)?>..     <a href="<?= base_url('profile')?>" style="float: right;">Read More</a></p>
        </div>
        <div class="one_quarter center" style="margin-left: 2px;"><img src="<?= base_url(); ?>uploads/about/<?= $profile->about_image_path; ?>" alt="<?= ucfirst($profile->about_title); ?>"></div>
    </div>
</div>