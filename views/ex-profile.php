<? include 'view-stubs/header.php';
require_once __DIR__ . '/../lib/Helpers/gallery-helper.php';
$EX_DETAILS = $Cl->getExhibitorsDetails($_GET['slug']);
$COM_DETAILS = $Cl->getCommunityDetails($_GET['slug']);
?>
<section class="nav-cover"></section>
<section class="exhibitor-page">
    <div class="inner-exhibitor">
        <?= null; ?>
        <? if ($EX_DETAILS) { ?>
            <? foreach ($EX_DETAILS as $ex) : ?>
                <div class="art-works">
                    <h4>View Art Work(s):</h4>
                    <ul class="tz-gallery list-inline nostyle">
                        <? foreach (json_decode($ex->art_work) as $art): ?>
                            <li class="thumbnail">
                                <a class="lightbox" href="<?= LINK_PREFIX . 'artworks/exhibitors/' . $art ?>">
                                    <img class="_img" src="<?= LINK_PREFIX . 'artworks/exhibitors/' . $art; ?>"
                                         alt="art work">
                                </a>
                            </li>
                        <? endforeach; ?>
                    </ul>
                </div>
                <div class="col-md-6 details">
                    <h3>The Gallery of <?= $ex->organization; ?></h3>
                    <div class="underline"></div>
                    <div class="more-details">
                    <span>
                        Artist Name: <strong><?= $ex->contact_name; ?></strong> <br>
                        <strong><u>About</u></strong> <br>
                            <?= $ex->about_me; ?>
                        </span>
                    </div>
                </div>
            <? endforeach; ?>
        <? } ?>
        <? if ($COM_DETAILS) { ?>
            <? foreach ($COM_DETAILS as $com) : ?>
                <div class="art-works">
                    <h4>View Art Work(s):</h4>
                    <ul class="tz-gallery list-inline nostyle">
                        <? foreach (json_decode($com->art_work) as $art): ?>
                            <li class="thumbnail">
                                <a class="lightbox" href="<?= LINK_PREFIX . 'artworks/community/' . $art ?>">
                                    <img class="_img" src="<?= LINK_PREFIX . 'artworks/community/' . $art; ?>"
                                         alt="art work">
                                </a>
                            </li>
                        <? endforeach; ?>
                    </ul>
                </div>
                <div class="col-md-6 details">
                    <h3>The Gallery of <?= $com->organization; ?></h3>
                    <div class="underline"></div>
                    <div class="more-details">
                    <span>
                        Artist Name: <strong><?= $com->contact_name; ?></strong> <br>
                        <strong><u>About</u></strong> <br>
                        <?= $com->about_me; ?>
                        </span>
                    </div>
                </div>
            <? endforeach; ?>
        <?  } ?>
        <?/* else { */?><!--
            <div class="text-center label label-warning">
                <h4>No Detail Found!</h4>
            </div>
        --><?/* } */?>
    </div>
</section>
<section class="other_exhibitor">
    <h3>Check Out the Community</h3>
    <div class="inner-other">
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
                <h4>No Community Found</h4>
            </div>
        <? } ?>
    </div>

</section>
<? include 'view-stubs/footer.php' ?>
