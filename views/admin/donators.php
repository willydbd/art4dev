<? include __DIR__ .'/admin-header.php'; ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= ADMIN_PREFIX .'dashboard' ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"><a href="<?= ADMIN_PREFIX .'donators' ?>">Donators</a></li>
        </ol>
        <!-- Icon Cards-->
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <? if ($ACCEPT_DONOR && isset($SUCCESS)) { ?><label
                        class="label label-<?= $SUCCESS ? 'danger' : 'success' ?>"><?= $ERRMSG ?></label>
                    <? } ?>
                    <? if($Class->allDonators()) {  ?>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <th style="width: 1px;">S/N</th>
                            <th>Full Name</th>
                            <th>Email Address</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Date Registered</th>
                            <th>Date Activated</th>
                            <th>action</th>
                            </thead>
                            <tbody>
                            <? $n=1; foreach ($Class->allDonators() as $donator) : ?>
                                <tr>
                                    <td><?= $n++; ?></td>
                                    <td><?= $donator->fullname; ?></td>
                                    <td><?= $donator->useremail; ?></td>
                                    <td><?= $donator->phone; ?></td>
                                    <td> <span class="label label-<?= $donator->status == 1 ? 'success' : ($donator->status == 0 ? 'danger' : '') ?>">
                                            <?= $donator->status == 1 ? 'Activated' : ($donator->status == 0 ? 'Not Activated' : ''); ?></span>
                                    </td>
                                    <td><?= date('M d Y', strtotime($donator->date_created)); ?> <br>
                                        <small class="text text-danger"><?= $Class->gen->prettyDate($donator->date_created) ?></small>
                                    </td>
                                    <td><? if ($donator->activate_on) : ?><?= date('M j Y', strtotime($donator->activate_on)); ?> <br>
                                            <small class="text text-success"> <?= $Class->gen->prettyDate($donator->activate_on); ?></small>
                                        <? endif; ?>
                                    </td>
                                    <td><a class="btn btn-sm btn-success" href="<?= ADMIN_PREFIX ?>view-details/d/<?= $donator->uid; ?>">View Details</a></td>
                                </tr>
                            <? endforeach; ?>
                            </tbody>
                        </table>
                    <? } else { ?>
                        <div class="text-center no-result wow animated fadeInDown">
                            <span> <i class="fa fa-bullhorn fa-4x fa-fw"></i>No Result to Display, No Application Yet</span>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>

        <!--<footer class="sticky-footer">
            <div class="container">
                <div class="text-center">
                    <small>Copyright © Art4Dev 2018</small>
                </div>
            </div>
        </footer>-->
    </div>
</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.tz-gallery');
    </script>
</body>

</html>