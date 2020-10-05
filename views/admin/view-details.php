<? include __DIR__ .'/admin-header.php';
$EXHIBITOR = $Class->exhibitorDetails($_GET['uid']);
$COMMUNITY = $Class->communityDetails($_GET['uid']);
$DONOR = $Class->donorDetails($_GET['uid']);
?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= ADMIN_PREFIX . 'dashboard'; ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"><a>View Details</a></li>
        </ol>
        <!-- Icon Cards-->
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12">
                    <?= null; ?>
                    <?  if($EXHIBITOR): ?>
                        <? foreach ($EXHIBITOR as $exhibitor) : ?>
                            <div class="art-works">
                                <? if($exhibitor->art_work) { ?>
                                <h4>Select Art Work to view:</h4>
                                <ul class="tz-gallery list-inline nostyle">
                                    <? foreach (json_decode($exhibitor->art_work) as $img) : ?>
                                    <li class="thumbnail">
                                        <a class="lightbox" href="<?= LINK_PREFIX .'artworks/exhibitors/'. $img ?>">
                                            <img src="<?= LINK_PREFIX .'artworks/exhibitors/'. $img; ?>" alt="art work">
                                        </a>
                                    </li>
                                    <? endforeach; ?>
                                </ul>
                                <? } else { ?>
                                    <h5>No Art Work Uploaded</h5>
                                <? } ?>
                                <div style="border: none; padding-left: 20px" class="art-works">
                                    <h4>Proof of Payment</h4>
                                    <ul class="tz-gallery list-inline nostyle">
                                        <li class="thumbnail">
                                            <a class="lightbox" href="<?= LINK_PREFIX . $exhibitor->payment; ?>">
                                                <img src="<?= LINK_PREFIX.$exhibitor->payment; ?>" alt="payment_proof">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <table class="table table-bordered table-condensed reduced">
                                    <tr>
                                        <td>Organization Name</td>
                                        <td><label class="label label-success"><?= $exhibitor->organization; ?></label></td>
                                    </tr>
                                    <tr></tr>
                                    <tr>
                                        <td>Contact</td>
                                        <td><i class="fa fa-user"></i> <?= $exhibitor->contact_name; ?>
                                            <a href="tel:<?= $exhibitor->phone_no; ?>"><i class="fa fa-phone"></i> <?= $exhibitor->phone_no; ?></a> </td>
                                    </tr>
                                    <tr>
                                        <td>Email Address</td>
                                        <td><label class="label label-success"><?= $exhibitor->useremail; ?></label></td>
                                    </tr>
                                    <tr>
                                        <td>Interest</td>
                                        <td><?= $exhibitor->interest; ?></td>
                                    </tr>
                                    <tr>
                                        <td>3-Day Booth Allocation</td>
                                        <td><? if($exhibitor->booth_allocation == '100000') { ?>
                                            <label>Indoor Pavilion Exhibition Space</label>
                                            <? } else { ?>
                                                <label>Outdoor Pavilion Exhibition Space</label>
                                            <? } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Number of Booth</td>
                                        <td><?= $exhibitor->no_of_booth; ?></td>
                                    </tr>
                                    <tr>
                                        <? $amt = $exhibitor->booth_allocation * $exhibitor->no_of_booth ?>
                                        <td>Amount Paid</td>
                                        <td><span class="label label-info"><?= $amt .' Naira Only'; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td><span class="label label-<?= $exhibitor->status == 1 ? 'success' : ($exhibitor->status == 0 ? 'danger' : '') ?>">
                                            <?= $exhibitor->status == 1 ? 'Activated' : ($exhibitor->status == 0 ? 'Not Activated' : ''); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Profile</td>
                                        <td><?= $exhibitor->about_me; ?></td>
                                    </tr>
                                    <? if ($exhibitor->resume_doc) : ?>
                                    <tr>
                                        <td>Exhibitor Resume</td>
                                        <td><?= $exhibitor->resume_doc ?></td>
                                    </tr>
                                    <? endif; ?>
                                    <? if ($exhibitor->activate_on) : ?>
                                    <tr>
                                        <td>Activated On</td>
                                        <td>
                                            <?= date('M d Y', strtotime($exhibitor->activate_on)); ?>
                                            (<small class="text text-success"><?= $Class->gen->prettyDate($exhibitor->activate_on); ?></small>)
                                        </td>
                                    </tr>
                                    <? endif; ?>
                                    <tr>
                                        <td>Date Registered</td>
                                        <td>
                                            <?= date('M d Y', strtotime($exhibitor->date_created)); ?>
                                           (<small class="text text-warning"><?= $Class->gen->prettyDate($exhibitor->date_created); ?></small>)
                                        </td>
                                    </tr>
                                </table>

                                <div class="form-group text-center">
                                    <? if($exhibitor->status == 0) { ?>
                                        <a href="<?= ADMIN_PREFIX .'exhibitors?accept='.$exhibitor->id;?>" class="btn btn-success btn-sm">Approve</a>
                                        <a href="<?= ADMIN_PREFIX .'exhibitors' ?>" class="btn btn-danger btn-sm">Decline</a>
                                    <? } else { ?> <label class="label label-info">Thank you. Already Activated!</label> <? } ?>

                                </div>
                            </div>
                            <!--<div class="col-md-4">Picture</div>-->

                        <? endforeach; ?>
                    <? endif; ?>

                    <?  if($DONOR) : ?>
                        <? foreach ($DONOR as $donor) : ?>
                            <div class="art-works">
                                <? if($donor->art_work) { ?>
                                    <h4>Select Art Work to view:</h4>
                                    <ul class="tz-gallery list-inline nostyle">
                                        <? foreach (json_decode($donor->art_work) as $img) : ?>
                                            <li class="thumbnail">
                                                <a class="lightbox" href="<?= LINK_PREFIX .'artworks/donators/'. $img ?>">
                                                    <img src="<?= LINK_PREFIX .'artworks/donators/'. $img; ?>" alt="art work">
                                                </a>
                                            </li>
                                        <? endforeach; ?>
                                    </ul>
                                <? } else { ?>
                                    <h5>No Art Work Uploaded</h5>
                                <? } ?>
                            </div>
                            <div class="col-md-7">
                                <table class="table table-bordered table-condensed reduced">
                                    <tr>
                                        <td>FullName</td>
                                        <td><?= $donor->fullname; ?></td>
                                    </tr>
                                    <tr></tr>
                                    <tr>
                                        <td>Email Address</td>
                                        <td><label class="label label-success"><?= $donor->useremail; ?></label></td>
                                    </tr>
                                    <tr>
                                        <td>Phone Number</td>
                                        <td><?= $donor->phone; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Location</td>
                                        <td><?= $donor->location; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Profile</td>
                                        <td><?= $donor->other_info; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td><span class="label label-<?= $donor->status == 1 ? 'success' : ($donor->status == 0 ? 'danger' : '') ?>">
                                            <?= $donor->status == 1 ? 'Activated' : ($donor->status == 0 ? 'Not Activated' : ''); ?></td>
                                    </tr>

                                    <? if ($donor->activate_on) : ?>
                                        <tr>
                                            <td>Activated On</td>
                                            <td>
                                                <?= date('M d Y', strtotime($donor->activate_on)); ?>
                                                (<small class="text text-success"><?= $Class->gen->prettyDate($donor->activate_on); ?></small>)
                                            </td>
                                        </tr>
                                    <? endif; ?>
                                    <tr>
                                        <td>Date Registered</td>
                                        <td>
                                            <?= date('M d Y', strtotime($donor->date_created)); ?>
                                            (<small class="text text-warning"><?= $Class->gen->prettyDate($donor->date_created); ?></small>)
                                        </td>
                                    </tr>
                                </table>

                                <div class="form-group text-center">
                                    <? if($donor->status == 0) { ?>
                                        <a href="<?= ADMIN_PREFIX .'donators?accept_donor='. $donor->id;?>" class="btn btn-success btn-sm">Activate</a>
                                        <a href="<?= ADMIN_PREFIX .'donators'; ?>" class="btn btn-danger btn-sm">Decline</a>
                                    <? } else { ?> <label class="label label-info">Thank you. Already Activated!</label> <? } ?>

                                </div>
                            </div>
                            <!--<div class="col-md-4">Picture</div>-->

                        <? endforeach; ?>
                    <? endif; ?>
                
                    <? if ($COMMUNITY): ?>
                        <? foreach ($COMMUNITY as $com) : ?>
                            <div class="art-works">
                                <? if($com->art_work) { ?>
                                    <h4>Select Art Work to view:</h4>
                                    <ul class="tz-gallery list-inline nostyle">
                                        <? foreach (json_decode($com->art_work) as $img) : ?>
                                            <li class="thumbnail">
                                                <a class="lightbox" href="<?= LINK_PREFIX .'artworks/community/'. $img ?>">
                                                    <img src="<?= LINK_PREFIX .'artworks/community/'. $img; ?>" alt="art work">
                                                </a>
                                            </li>
                                        <? endforeach; ?>
                                    </ul>
                                <? } else { ?>
                                    <h5>No Art Work Uploaded</h5>
                                <? } ?>

                            </div>
                            <div class="col-md-7">
                                <table class="table table-bordered table-condensed reduced">
                                    <tr>
                                        <td>Organization Name</td>
                                        <td><label class="label label-success"><?= $com->organization; ?></label></td>
                                    </tr>
                                    <tr></tr>
                                    <tr>
                                        <td>Contact</td>
                                        <td><i class="fa fa-user"></i> <?= $com->contact_name; ?>
                                            <a href="tel:<?= $com->phone_no; ?>"><i class="fa fa-phone"></i> <?= $com->phone_no; ?></a> </td>
                                    </tr>
                                    <tr>
                                        <td>Email Address</td>
                                        <td><label class="label label-success"><?= $com->useremail; ?></label></td>
                                    </tr>
                                    <tr>
                                        <td>Interest</td>
                                        <td><?= $com->interest; ?></td>
                                    </tr>
                                    <tr>
                                        <td>3-Day Booth Allocation</td>
                                        <td><? if($com->booth_allocation == '100000') { ?>
                                                <label>Indoor Pavilion Exhibition Space</label>
                                            <? } else { ?>
                                                <label>Outdoor Pavilion Exhibition Space</label>
                                            <? } ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Number of Booth</td>
                                        <td><?= $com->no_of_booth; ?></td>
                                    </tr>

                                    <tr>
                                        <td>Status</td>
                                        <td><span class="label label-<?= $com->status == 1 ? 'success' : ($com->status == 0 ? 'danger' : '') ?>">
                                            <?= $com->status == 1 ? 'Activated' : ($com->status == 0 ? 'Not Activated' : ''); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Profile</td>
                                        <td><?= $com->about_me; ?></td>
                                    </tr>

                                    <? if ($com->activate_on) : ?>
                                        <tr>
                                            <td>Activated On</td>
                                            <td>
                                                <?= date('M d Y', strtotime($com->activate_on)); ?>
                                                (<small class="text text-success"><?= $Class->gen->prettyDate($com->activate_on); ?></small>)
                                            </td>
                                        </tr>
                                    <? endif; ?>
                                    <tr>
                                        <td>Date Registered</td>
                                        <td>
                                            <?= date('M d Y', strtotime($com->date_created)); ?>
                                            (<small class="text text-warning"><?= $Class->gen->prettyDate($com->date_created); ?></small>)
                                        </td>
                                    </tr>
                                </table>

                                <div class="form-group text-center">
                                    <? if($com->status == 0) { ?>
                                        <a href="<?= ADMIN_PREFIX .'exhibitors?accept='.$com->id;?>" class="btn btn-success btn-sm">Approve</a>
                                        <a href="<?= ADMIN_PREFIX .'exhibitors' ?>" class="btn btn-danger btn-sm">Decline</a>
                                    <? } else { ?> <label class="label label-info">Thank you. Already Activated!</label> <? } ?>

                                </div>
                            </div>
                            <!--<div class="col-md-4">Picture</div>-->

                        <? endforeach; ?>
                    <? endif; ?>
                </div>
            </div>
        </div>

   <!--     <footer class="sticky-footer">
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
