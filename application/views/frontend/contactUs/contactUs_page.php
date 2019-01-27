<div id="comments" class="one_half"> 
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