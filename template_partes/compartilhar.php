<?php function componente_compartilhar() { ?>

<div class="social">
    <a addthis:url="<?php echo $link ?>" class="addthis_button_facebook facebook" title="Facebook" href="#">
        <span></span>
    </a>
    <?php /*
    <a addthis:url="<?php echo $link ?>" class="addthis_button_instagram instagram" title="compartilhar-instagram" href="#">
        <span></span>
    </a> */ ?>
    <a addthis:url="<?php echo $link ?>" class="addthis_button_twitter twitter" title="Twitter" href="#">
        <span></span>
    </a>
    <a addthis:url="<?php echo $link ?>" class="addthis_button_whatsapp whatsapp" title="Whatsapp" href="#">
        <span></span>
    </a>
    <a addthis:url="<?php echo $link ?>" class="addthis_button_telegram telegram" title="Telegram" href="#">
        <span></span>
    </a>
</div>


<?php
}
