<div class="wrapper row4">
  <div class="rounded">
    <footer id="footer" class="clear"> 
      <!-- ################################################################################################ -->
      <div class="one_third first">
        <figure class="center"><img class="btmspace-15" src="images/demo/worldmap.png" alt="">
          <figcaption><a href="#">Find Us With Google Maps &raquo;</a></figcaption>
        </figure>
      </div>
      <div class="one_third">
        <address>
        <?= $contactUs->contact_location ?>
        <i class="fa fa-phone pright-10"></i><?= $contactUs->contact_phone; ?> <br>
        <i class="fa fa-envelope-o pright-10"></i> <a href="#"><?= $contactUs->contact_email; ?></a>
        </address>
      </div>
      <div class="one_third">
        <p class="nospace btmspace-10">Stay Up to Date With What's Happening</p>
        <ul class="faico clear">
          <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
          <li><a class="faicon-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
        
        </ul>
        
      </div>
      <!-- ################################################################################################ --> 
    </footer>
  </div>
</div>
<!-- ################################################################################################ --> 
<!-- ################################################################################################ --> 
<!-- ################################################################################################ -->
<div class="wrapper row5">
  <div id="copyright" class="clear"> 
    <!-- ################################################################################################ -->
    <p class="fl_left">Copyright &copy; 2014 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a target="_blank" href="http://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
    <!-- ################################################################################################ --> 
  </div>
</div>
<!-- JAVASCRIPTS --> 
<script src="<?= base_url();?>assets/frontend/layout/scripts/jquery.min.js"></script> 
<script src="<?= base_url();?>assets/frontend/layout/scripts/bootstrap.min.js"></script>
<script src="<?= base_url();?>assets/frontend/layout/scripts/jquery.fitvids.min.js"></script> 
<script src="<?= base_url();?>assets/frontend/layout/scripts/nivo-lightbox/nivo-lightbox.min.js"></script>
<script src="<?= base_url();?>assets/frontend/layout/scripts/jquery.mobilemenu.js"></script> 
<script src="<?= base_url();?>assets/frontend/layout/scripts/tabslet/jquery.tabslet.min.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/frontend/layout/wowslider/wowslider.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/frontend/layout/wowslider/script.js"></script>
<script type="text/javascript" src="<?= base_url();?>assets/frontend/layout/scripts/galary.js"></script>
</body>
</html>