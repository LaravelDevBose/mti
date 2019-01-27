<div id="portfolio" class="one_half">
	<article>
		<h2><?= ucfirst($event->news_title) ?></h2>
		<img class="borderedbox" src="<?= base_url()?>uploads/news/<?= $event->news_image_path?>" alt="<?= $event->news_image_path?>">
		<p><?= $event->news_des ?></p>
    </article>
</div>