<div id="portfolio" class="one_half">
	<article>
		<h2><?= ucfirst($product->title)?></h2>
		<img class="borderedbox" src="<?= base_url()?>uploads/product/<?= $product->img; ?>" alt="<?= $product->img; ?>">
		<p><?= $product->des ?></p>
    </article>
</div>