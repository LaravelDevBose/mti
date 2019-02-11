<div id="comments" class="one_half">

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.346591135589!2d90.34373186438519!3d23.770669284579387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c084d5162541%3A0xb5b27d2f3b1ea876!2sSunibir+Housing!5e0!3m2!1sen!2sbd!4v1549867525012" width="700" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
    <h2>Write A Meaagse</h2>
    <?php if($feedback = $this->session->flashdata('feedback')):
       $feedback_class = $this->session->flashdata('feedback_class');
      ?>
      <div class="alert <?= $feedback_class?>">
        <?= $feedback; ?>
      </div>
    <?php endif;?>

    <form action="<?= base_url()?>GetMessage" method="POST">
      <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
        <div class="one_third first">
          <label for="name">Name <span>*</span></label>
          <input type="text" name="name" id="name" value="" size="22">
        </div>
        <div class="one_third">
          <label for="email">Mail <span>*</span></label>
          <input type="text" name="email" id="email" value="" size="22">
        </div>
        <div class="one_third">
          <label for="subject">Subject <span>*</span></label>
          <input type="text" name="subject" id="subject" value="" size="22">
        </div>
        <div class="block clear">
          <label for="message">Your Message <span>*</span></label>
          <textarea name="message" id="message" cols="25" rows="10"></textarea>
        </div>
        <div>
          <input name="submit" type="submit" value="Submit Form">
          &nbsp;
          <input name="reset" type="reset" value="Reset Form">
        </div>
    </form>
</div>