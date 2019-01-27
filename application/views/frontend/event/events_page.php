<div id="evnet" class="one_half">
    <ul class="nospace clear">
    <?php if(isset($events) && $events): foreach($events as $event):?>
        <li class="one_half ">
            <article>
                <img class="borderedbox" src="<?= base_url()?>uploads/news/<?= $event->news_image_path?>" alt="<?= $event->news_image_path?>">
                <h2><?= ucfirst($event->news_title) ?></h2>
                <p><?= substr(strip_tags($event->news_des), 0,250)?></p>
                <p class="right"><a href="<?= base_url(); ?>news/<?= $event->news_id; ?>">Read More Here &raquo;</a></p>
            </article>
        </li>
    <?php endforeach; endif;?>
    </ul>
</div>