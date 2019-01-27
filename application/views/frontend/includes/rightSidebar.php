<!-- Right Column -->
<div class="one_quarter sidebar"> 
  <!-- ################################################################################################ -->
 <!--  <div class="sdb_holder">
    <h6>Video</h6>
    <div class="mediacontainer">
      <img src="images/demo/video.gif" alt="">
    </div>
  </div> -->
  <div class="sdb_holder">
    <h6>Update News</h6>
    <ul class="nospace quickinfo">
        <marquee onmouseover="this.stop();" onmouseout="this.start();" direction="up" scrollamount="3" scrolldelay="50" top="0" left="0" style="height: 100%;">
            <?php if(isset($events) && $events): foreach($events as $event):?>
            <li class="clear">
                <a href="<?= base_url(); ?>news/<?= $event->news_id; ?>">
                    <img src="<?= base_url()?>uploads/news/<?= $event->news_image_path?>" alt="<?= $event->news_image_path?>">
                    <span><?= ucfirst($event->news_title) ?></span>
                </a>
            </li>
        <?php endforeach; endif; ?>
        </marquee>
    </ul>
  </div>
  <!-- ################################################################################################ --> 
</div>
            <!-- / Right Column --> 