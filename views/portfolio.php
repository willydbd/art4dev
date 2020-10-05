<? include __DIR__ . '/view-stubs/port-header.php'; ?>

    <div class="w3-container gallery-show">
        <h3>Recent Uploads</h3>
        <ul class="tz-gallery list-inline wow animated zoomInLeft" data-wow-delay = "0.5s" >
            <? $artworks = json_decode($IS_LOGGED->art_work);
                $slice = array_slice($artworks, 0, 6);
                foreach ($slice as $img) :  ?>
                    <li><a class="lightbox" href="<?= LINK_PREFIX .'artworks/exhibitors/'. $img  ?>">
                            <img src="<?= LINK_PREFIX .'artworks/exhibitors/'. $img;  ?>" alt="art work">
                        </a>
                    </li>
            <? endforeach; ?>
        </ul>
    </div>
    <div class="w3-container w3-padding-large about-me wow animated fadeInUp" data-wow-delay = "2s">
        <h3>About Me</h3>
        <hr>
        <h4>Technical Skills</h4>
        <!-- Progress bars / Skills -->
        <p>Photography</p>
        <div class="w3-grey">
            <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:95%">95%</div>
        </div>
        <p>Pottery</p>
        <div class="w3-grey">
            <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:85%">85%</div>
        </div>
        <p>Weaving</p>
        <div class="w3-grey">
            <div class="w3-container w3-dark-grey w3-padding w3-center" style="width:80%">80%</div>
        </div>
        <p>
            <button class="w3-button w3-dark-grey w3-padding-large w3-margin-top w3-margin-bottom">
                <i class="fa fa-download w3-margin-right"></i>Download Resume
            </button>
        </p>
    </div>
<? include __DIR__ . '/view-stubs/port-footer.php'; ?>