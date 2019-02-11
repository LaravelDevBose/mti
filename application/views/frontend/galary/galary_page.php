<div id="gallery" class="one_half" style="margin-left: 5px;">
    <figure>
        <header class="heading">MTi- Gallery</header>
        <ul class="nospace clear">
            <?php if(isset($galarys) && $galarys): foreach($galarys as $galary):?>
            <li class="one_quarter" style="width: 29%">
                <?php if($galary->gallery_type == 'image'){?>
                <a class="nlb" data-lightbox-gallery="gallery1" href="<?= base_url()?>uploads/<?= $galary->gallery_image_path?>" title="<?= $galary->gallery_title?>">
                    <img class="borderedbox" src="<?= base_url()?>uploads/<?= $galary->gallery_image_path?>" alt="<?= $galary->gallery_image_path?>">
                </a>
                <?php }else{?>
                    <a class="nlb" data-lightbox-gallery="gallery1" href="<?= $galary->gallery_image_path?>" title="<?= $galary->gallery_title?>">
                        <iframe class="borderedbox"  style="width: 100%;" src="<?php echo $galary->gallery_image_path?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </a>
                <?php }?>
            </li>
            <?php endforeach; endif;?>
        </ul>
    </figure>
</div>