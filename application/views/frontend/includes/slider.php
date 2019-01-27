<!-- ################################################################################################ -->

<?php if(isset($sliders) && $sliders): ?>
<div class="wrapper">
  <div id="slider">
    <div id="slide-wrapper" class="rounded clear"> 
      <div id="wowslider-container1">
        <div class="ws_images">
          <ul>
            <?php $i=0; foreach($sliders as $slider):?>
            <li>
              <img src="<?= base_url(); ?>uploads/slider/<?= $slider->slider_image_path ?>" alt="<?= $slider->slider_title ?>" title="<?= $slider->slider_title ?>" id="wows1_<?= $i++ ?>"/>
            </li>
          <?php endforeach; ?>
          </ul>
        </div>
        <div class="ws_bullets">
          <div>
            <?php $i=0; foreach($sliders as $slider):?>
            <a href="#" title="<?= $slider->slider_title ?>"></a>
            <?php endforeach; ?>
          </div>
        </div>
      </div>  
    </div>
  </div>
</div>
<?php endif; ?>
<!-- ################################################################################################ --> 
