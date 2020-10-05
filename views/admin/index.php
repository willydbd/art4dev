<? require_once __DIR__ .'/../../lib/Helpers/admin-helper.php';
require_once __DIR__ .'/../../lib/Helpers/include-linkbuilder.php';
if ($Class->part->is_logged_in() != "") {
    redirect('/admin/dashboard');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Login</title>
    <!-- Bootstrap core CSS-->
    <link href="<?= LINK_PREFIX .'assets/resx/vendor/bootstrap/css/bootstrap.min.css'; ?>" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="<?= LINK_PREFIX .'assets/resx/vendor/font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="<?= LINK_PREFIX .'assets/css/sb-admin.css';?>" rel="stylesheet">
    <!--Icon-->
    <link rel="icon" type="image/png" href="<?= LINK_PREFIX .'assets/images/icons/logo_icon.png' ?>" />
</head>

<body class="bg-dark">
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body ">
            <? if ($LOGIN && !$SUCCESS) { ?>
                <div class="alert alert-danger error-message" data-ajs-delay="450ms" data-ajs-duration="400ms">
                    <strong>Something's wrong.</strong> <br>
                    <span>Fill All the Fields Correctly</span>
                </div>
            <? } ?>
            <? if (!($LOGIN && $SUCCESS)) { ?>
            <form action="?admin-login" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="useremail" class="form-control" id="exampleInputEmail1" type="email"
                           aria-describedby="emailHelp" placeholder="Enter email">
                    <?= isset($error['useremail']) ? '<span class="label label-danger">' .$error['useremail']. '</span>' :''; ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="userpass" class="form-control" id="exampleInputPassword1" type="password"
                           placeholder="Password">
                    <?= isset($error['userpass']) ? '<span class="label label-danger">' .$error['userpass']. '</span>' :''; ?>
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox"> Remember Password</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary form-control" value="Login">
                </div>
            </form>
            <? } else { ?>
                <div class="form-group">
                    <span class="success-msg">Login Successful <a href="<?= ADMIN_PREFIX . 'dashboard'; ?>">Continue...</a></span>
                    <? header("Refresh: 3, url: /dashboard"); } ?>
                    <?  ?>
                </div>

            <div class="text-center">
                <!--<a class="d-block small mt-3" href="<?/*= ADMIN_PREFIX .'register' */?>">Register an Account</a>-->
                <a class="d-block small" href="<?= ADMIN_PREFIX .'forgot-password' ?>">Forgot Password?</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<script src="<?= LINK_PREFIX .'assets/js/vendor/jquery/jquery.min.js'; ?>"></script>
<script src="<?= LINK_PREFIX .'assets/js/vendor/bootstrap/js/bootstrap.bundle.min.js'; ?>"></script>
<!-- Core plugin JavaScript-->
<script src="<?= LINK_PREFIX .'assets/js/vendor/jquery-easing/jquery.easing.min.js'; ?>"></script>
</body>

</html>