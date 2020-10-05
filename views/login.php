<?php
/**
 * @Author
 * Falua Temitope Oyewole.
 * faluatemitopeo@gmail.com
 * Web Developer
 * Date: 4/12/2018
 */

include 'view-stubs/header.php';
require_once __DIR__ .'/../lib/Helpers/register-helper.php';

/*if ($Cl->is_logged_in() != "") {
    //$Cl->redirect('/portfolio');
}*/

?>
<section class="nav-cover"></section>
<section class="register">
    <div class="inner-register row">
        <div class = "col-md-4 col-md-offset-4">
            <? if ($E_LOGIN && !$SUCCESS) { ?>
                <div class="alert alert-danger create-order-alert anim-js fadeInDown" data-ajs-delay="450ms" data-ajs-duration="400ms">
                    <strong>Something's wrong.</strong> <br>
                    <span><?= $ERRMSG; ?></span>
                </div>
            <? } ?>
            <? if (!($E_LOGIN && $SUCCESS)) { ?>
            <form action="?login" method="post" onSubmit="return checkForm(this)">
                <div class="form-content">
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <div class="input-group">
                            <input type="text" name="username" class="form-control" placeholder="Enter Your Username" required>
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <div class="input-group">
                            <input type="password" name="userpass" class="form-control" placeholder="Enter Your Password"
                                   required>
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        </div>
                    </div>
                </div>
                <div class="form-group text-right">
                    <input type="submit" name="login" class="btn btn-add btn-sm" value="Login">
                </div>
            </form>
            <? } else { ?>
                <div class="form-group text-center wow animated fadeInDown">
                    <div class="success-msg">
                        <i class="fa fa-fw fa-check-circle"></i> Login Successful <br>
                        <div class="wow animated fadeInTop" data-delay = ".7s" style="text-align: center; padding-top: 20px;">
                            <a href="<?= LINK_PREFIX . 'portfolio'; ?>" class="btn btn-register">Continue</a>
                        </div>
                    </div>
                     <small class="wow animated fadeInUp text-center" data-wow-delay = ".9s" data-wow-duration = "1.2s">Redirecting....</small>
                     <?// header("Refresh: 3, url = portfolio") ?>
                </div>
            <? } ?>
        </div>
    </div>
</section>
<? include 'view-stubs/footer.php' ?>

