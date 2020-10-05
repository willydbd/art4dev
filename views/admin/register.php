<? require_once __DIR__ .'/../../lib/Helpers/admin-helper.php';
    require_once __DIR__ .'/../../lib/Helpers/include-linkbuilder.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Register</title>
    <!-- Bootstrap core CSS-->
    <link href="<?= LINK_PREFIX .'assets/resx/vendor/bootstrap/css/bootstrap.min.css'?>" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="<?= LINK_PREFIX .'assets/resx/vendor/font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="<?= LINK_PREFIX .'assets/css/sb-admin.css';?>" rel="stylesheet">
</head>

<body class="bg-dark">
    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Register an Account</div>
            <div class="card-body">
                <? if ($REGISTER && !$SUCCESS) { ?>
                    <div class="alert alert-danger create-order-alert anim-js fadeInDown" data-ajs-delay="450ms" data-ajs-duration="400ms">
                        <strong>Something's wrong.</strong>
                        <span>Fill All the Fields</span>
                    </div>
                    <? } ?>
                <? if (!($REGISTER && $SUCCESS)) { ?>
                <form action="?register" method="post">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputName">First name</label>
                                <input name="firstname" class="form-control" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter first name">
                                <?= isset($error['firstname']) ? '<span class="label label-danger">' .$error['firstname']. '</span>' :''; ?>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputLastName">Last name</label>
                                <input name="lastname" class="form-control" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Enter last name">
                                <?= isset($error['lastname']) ? '<span class="label label-danger">' .$error['lastname']. '</span>' :''; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input name="useremail" class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email">
                        <?= isset($error['useremail']) ? '<span class="label label-danger">' .$error['useremail']. '</span>' :''; ?>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="exampleInputPassword1">Password</label>
                                <input name = "userpass" class="form-control" id="exampleInputPassword1" type="password" placeholder="Password">
                                <?= isset($error['userpass']) ? '<span class="label label-danger error">'.$error['userpass'].'</span>' : ''; ?>
                            </div>
                            <div class="col-md-6">
                                <label for="exampleConfirmPassword">Confirm password</label>
                                <input name = "confirm_userpass" class="form-control" id="exampleConfirmPassword" type="password" placeholder="Confirm password">
                                <?= isset($error['confirm_userpass']) ? '<span class="label label-danger error">'.$error['confirm_userpass'].'</span>' : ''; ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary form-control" value="Register">
                    </div>
                </form>
                <? } else { ?>
                    <div class="form-group">
                        <span class="success-msg">Registration Successful</span>
                    </div>
                <? } ?>
                <div class="text-center">
                    <a class="d-block small mt-3" href="<?= ADMIN_PREFIX;?>">Login Page</a>
                    <a class="d-block small" href="<?= ADMIN_PREFIX.'forgot-password'?>">Forgot Password?</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>