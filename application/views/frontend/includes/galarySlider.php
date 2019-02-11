<?php $i=0; if(isset($galarys) && $galarys): ?>
<div class="container">
    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
            <?php foreach($galarys as $galary): if($galary->gallery_type == 'image'):?>

            <div class="carousel-item col-md-3 <?= ($i==0)?'active':''?>">
                <div class="panel panel-default">
                    <div class="panel-thumbnail">
                        <a href="#" title="<?= ucfirst($galary->gallery_title)?>" class="thumb">
                          <img class="img-fluid mx-auto d-block" src="<?= base_url()?>/uploads/<?= $galary->gallery_image_path?>" alt="<?= ucfirst($galary->gallery_title)?>" style="min-height: 200px;">
                        </a>
                    </div>
                </div>
            </div>
            <?php $i=1; endif; endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<?php endif; ?>
