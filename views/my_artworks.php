<? include __DIR__ . '/view-stubs/port-header.php'; ?>

    <div class="w3-container gallery-show">
        <h3>My Gallery</h3>
        <ul class="tz-gallery list-inline wow animated zoomInLeft" data-wow-delay = ".75s">
            <? $artworks = json_decode($IS_LOGGED->art_work);
                foreach ($artworks as $img) :  ?>
                    <li><a class="lightbox" href="<?= LINK_PREFIX .'artworks/exhibitors/'. $img  ?>">
                            <img src="<?= LINK_PREFIX .'artworks/exhibitors/'. $img;  ?>" alt="art work">
                        </a>
                    </li>
            <? endforeach; ?>
        </ul>
    </div>
<? include __DIR__ . '/view-stubs/port-footer.php'; ?>