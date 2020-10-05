<? include __DIR__ .'/admin-header.php'; ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <!-- Icon Cards-->
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-list"></i>
                        </div>
                        <div class="mr-5"><?= $COUNT; ?> <?= ($COUNT >= 1 ) ? 'New Exhibitors' : 'New Exhibitor'; ?></div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?= ADMIN_PREFIX . 'exhibitors'; ?>">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-support"></i>
                        </div>
                        <div class="mr-5"><?= $COUNT_D; ?> New Donations!</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?= ADMIN_PREFIX . 'donators'; ?>">
                        <span class="float-left">View Details</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-list"></i>
                        </div>
                        <div class="mr-5"><?= $COUNT_C; ?> <?= ($COUNT_C >= 1) ? 'Members' : 'Member'; ?>  </div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="<?= ADMIN_PREFIX . 'community'; ?>">
                        <span class="float-left">Add To Community</span>
                        <span class="float-right">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Example DataTables Card-->
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
<!--    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>Copyright © Art4Dev <?/*= date('Y'); */?></small>
            </div>
        </div>
    </footer>-->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= ADMIN_PREFIX ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?= LINK_PREFIX . 'assets/js/vendor/jquery/jquery.min.js' ?>"></script>
    <script src="<?= LINK_PREFIX . 'assets/js/vendor/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?= LINK_PREFIX . 'assets/js/vendor/jquery-easing/jquery.easing.js' ?>"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?= LINK_PREFIX . 'assets/js/vendor/chart.js/Chart.min.js' ?>"></script>
    <script src="<?= LINK_PREFIX . 'assets/js/vendor/datatables/jquery.dataTables.js'; ?>"></script>
    <script src="<?= LINK_PREFIX . 'assets/js/vendor/datatables/dataTables.bootstrap4.js' ?>"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?= LINK_PREFIX . 'assets/js/sb-admin.min.js'; ?>"></script>
    <!-- Custom scripts for this page-->
    <script src="<?= LINK_PREFIX . 'assets/js/sb-admin-datatables.min.js'; ?>"></script>
    <script src="<?= LINK_PREFIX . 'assets/js/sb-admin-charts.min.js' ?>"></script>
</div>
</body>

</html>