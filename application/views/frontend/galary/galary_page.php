<div id="gallery" class="one_half" style="margin-left: 5px;">
    <figure>
        <header class="heading">MTi- Gallery</header>
        <ul class="nospace clear">
            <?php if(isset($galarys) && $galarys): foreach($galarys as $galary):?>
            <li class="one_quarter" style="width: 29%">
                <a class="nlb" data-lightbox-gallery="gallery1" href="<?= base_url()?>uploads/<?= $galary->gallery_image_path?>" title="<?= $galary->gallery_title?>">
                    <img class="borderedbox" src="<?= base_url()?>uploads/<?= $galary->gallery_image_path?>" alt="<?= $galary->gallery_image_path?>">
                </a>
            </li>
            <?php endforeach; endif;?>
        </ul>
    </figure>
</div>