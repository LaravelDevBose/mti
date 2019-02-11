<div id="portfolio" class="one_half">
	<article>
		<h2>MTI Trading Limited Profile</h2>
		<img class="borderedbox" src="<?= base_url(); ?>uploads/about/<?= $profile->about_image_path; ?>" alt="<?= $profile->about_image_path; ?>">
		<p><?= $profile->about_des?></p>
        <div style="clear: both"></div>
        <embed  src="<?php echo base_url('uploads/about/'.$profile->pdf_path)?>" height=700 width=700>
    </article>
</div>