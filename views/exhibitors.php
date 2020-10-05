<? include 'view-stubs/header.php';
require_once __DIR__ .'/../lib/Helpers/gallery-helper.php';
?>
<section class="nav-cover"></section>
<section class="exhibitor-page">
    <div class="inner-exhibitor">
        <h3>Exhibitors</h3>
        <? if($EX) { ?>
            <? foreach ($EX as $exhibitors) : $i = 0?>
            <? $art = json_decode($exhibitors->art_work); ?>
            <div class="col-3">
                <a href="<?= LINK_PREFIX .'exhibitors/profile/'.$exhibitors->slug ; ?>">
                <div class="ex-detail wow animated fadeInLeft"><?= $exhibitors->organization; ?></div>
                <img src="<?= LINK_PREFIX .'artworks/exhibitors/' .$art[1] ?>" alt="">
                </a>
            </div>
            <? endforeach; ?>
        <? } else { ?>
            <div class="label label-warning">
                <h4>No Registered Exhibitors</h4>
            </div>
        <? } ?>
    </div>
</section>
<? include 'view-stubs/footer.php' ?>
