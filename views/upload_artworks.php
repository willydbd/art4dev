<?php
/**
 * @Author
 * Falua Temitope Oyewole.
 * faluatemitopeo@gmail.com
 * Web Developer
 * Date: 5/28/2018
 */
?>
<? include __DIR__ . '/view-stubs/port-header.php'; ?>
    <div class="w3-container gallery-show">
        <div class="col-md-7 col-md-offset-2 add-art wow animated fadeInUp" data-wow-delay = ".75s">
            <? if ($ADD_ARTWORKS && !$SUCCESS) { ?>
                <div style="margin-left: 15px;" class="alert alert-danger wow animated fadeInDown" data-wow-delay="450ms" data-wow-duration="400ms">
                    <strong>Something's Wrong</strong> <br>
                    <span><?= $ERRMSG; ?></span>
                </div>
            <? } ?>
            <? if (!($ADD_ARTWORKS && $SUCCESS)) { ?>
                <h3>Add More Artworks</h3>
                <form action="?add-artworks" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="artworks"></label>
                        <div class="">
                            <input type="file" name="artworks[]" id="artworks" data-multiple-caption="{count} files selected" class="form-control add-more" multiple required>
                            <h3 class="drop-text">Click to select files</h3>
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label for="username" class="sr-only">Enter your Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" required>
                    </div>-->
                    <div class="form-group col-md-12 text-center">
                        <input type="submit" name="f-submit" class="btn btn-primary" value="Upload Files">
                    </div>
                </form>
            <? } else { ?>
                <div class="form-group text-center wow animated fadeInDown">
                    <div class="success-msg">
                        <i class="fa fa-fw fa-check-circle"></i> ArtWorks Added Successfully <br>
                        <div class="wow animated fadeInTop" data-delay = ".7s" style="text-align: center; padding-top: 20px;">
                            <a href="<?= LINK_PREFIX . 'visit-my-shop'; ?>" class="btn btn-register">Go to Shop</a>
                        </div>
                    </div>
                </div>
            <? } ?>

        </div>
    </div>
    <? include __DIR__ . '/view-stubs/port-footer.php'; ?>
