<?php
/**
 * @Author
 * Falua Temitope Oyewole.
 * faluatemitopeo@gmail.com
 * Web Developer
 * Date: 6/15/2018
 */
include 'view-stubs/header.php';
require_once __DIR__ .'/../lib/Helpers/gallery-helper.php';
?>

<section class="nav-cover"></section>
<section class="exhibitor-page">
    <div class="inner-exhibitor">
        <h3>Community</h3>
        <? if($COM) { ?>
            <? foreach ($COM as $community) : $i = 0?>
            <? $art = json_decode($community->art_work); ?>
            <div class="col-3">
                <a href="<?= LINK_PREFIX .'community/profile/'.$community->slug ; ?>">
                <div class="ex-detail wow animated fadeInLeft"><?= $community->organization; ?></div>
                <img src="<?= LINK_PREFIX .'artworks/community/' .$art[0] ?>" alt="">
                </a>
            </div>
            <? endforeach; ?>
        <? } else { ?>
            <div class="label label-warning">
                <h4>Nothing here, check back later</h4>
            </div>
        <? } ?>
    </div>
</section>
<? include 'view-stubs/footer.php' ?>
