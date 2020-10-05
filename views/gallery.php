<? include 'view-stubs/header.php';
require_once __DIR__ .'/../lib/Helpers/gallery-helper.php';
?>
<section class="nav-cover"></section>
<section id="gallery" class="bgSection show-room-section">
    <div class="container">
        <div class="row">
            <!-- Section Header -->
            <div class="col-md-12 col-sm-12 col-xs-12 section-header wow fadeInDown">
                <h2><span class="highlight-text">Gallery</span></h2>
            </div>
            <!-- Section Header End -->
        </div>
    </div>

    <? if ($SHOWROOM) { ?>
        <div class="portfolio-works wow fadeIn" data-wow-delay=".5s" data-wow-duration="2s">
        <div class="portfolio-items">
            <? foreach ($SHOWROOM as $gallery) : ?>
                <? foreach (json_decode($gallery->art_work) as $art) : ?>
                    <div class="item portfolio-item web seo wow animated fadeIn" data-wow-delay=".7s"
                         data-wow-duration="2s">
                        <img src="<?= LINK_PREFIX . 'artworks/exhibitors/' . $art ?>" alt="">
                        <div class="portfolio-details-wrapper">
                            <div class="portfolio-details">
                                <div class="portfolio-meta-btn">
                                    <ul class="work-meta">
                                        <li class="lighbox">
                                            <a href="<?= LINK_PREFIX . 'artworks/exhibitors/' . $art ?>"
                                               class="author featured-work-img">
                                                <?= $gallery->organization; ?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <? endforeach; ?>
            <? endforeach; ?>
        </div>
    </div>
    <? } else { ?>
        <div class="text-center">
            <h6>Gallery is Empty For Now</h6>
        </div>
    <? } ?>
</section>
<? include 'view-stubs/footer.php' ?>
