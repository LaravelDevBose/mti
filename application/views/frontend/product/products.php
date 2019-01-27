<div class="container">
    <h3 class="h3">MTI-Machines </h3>
    <div class="row">
        <?php if(isset($products) && $products): foreach($products as $product ):?>
        <div class="col-md-3 col-sm-6">
            <div class="product-grid2">
                <div class="product-image2">
                    <a href="<?= base_url();?>product/<?= $product->id?>">
                        <img class="pic-1" src="<?= base_url()?>uploads/product/<?= $product->img; ?>" >
                    </a>
                    <a class="add-to-cart" href="<?= base_url();?>product/<?= $product->id?>">View Details</a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="<?= base_url();?>product/<?= $product->id?>"><?= ucfirst($product->title)?></a></h3>
                </div>
            </div>
        </div>
    <?php endforeach;  endif;?>
    </div>
  </div>