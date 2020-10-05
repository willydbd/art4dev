<? include 'view-stubs/header.php';
require_once __DIR__ .'/../lib/Helpers/register-helper.php';
?>
    <section class="nav-cover"></section>
    <section class="register">
        <div class="inner-register">
            <? if ($PARTICIPANT && !$SUCCESS) { ?>
                <div class="alert alert-danger fadeInDown">
                    <strong>Something's wrong.</strong>
                    <span>Fill All the Fields</span>
                </div>
            <? } ?>
            <? if ($EXHIBITOR && !$SUCCESS) { ?>
                <div class="alert alert-danger fadeInDown">
                    <strong>Something's wrong.</strong>
                    <span>Fill All the Fields</span>
                </div>
            <? } ?>
            <? if (!($EXHIBITOR || $PARTICIPANT && $SUCCESS)) { ?>
                <h3>How do you want to register?</h3>
                <div class="reg-center">
                    <a href="#myModalE" class="btn btn-select" data-toggle="modal" data-target="#myModalE">As An Exhibitor?</a> &nbsp; &nbsp;
                    <span>---OR---</span>&nbsp; &nbsp;
                    <a href="#myModalP" data-target="#myModalP" data-toggle="modal" class="btn btn-select">As A Participant</a>
                </div>
            <? } else { ?>
                <div class="form-group text-center wow animated fadeInDown">
                    <div class="success-msg">
                        <i class="fa fa-fw fa-check-circle"></i> Submission Successful <br>
                        <div class="wow animated fadeInTop" data-delay = ".7s" style="text-align: center; padding-top: 20px;">
                            <a href="<?= LINK_PREFIX . 'registration'; ?>" class="btn btn-register">Go Back</a>
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>

        <div class="modal hide animated fadeInDown <?= isset($EXHIBITOR) ? 'open2':'closed' ?>" id="myModalE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <a class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></a>

                        <form action="?exhibitor" method="post" enctype="multipart/form-data" onSubmit="return checkForm(this)">
                            <header>
                                <h2>Exhibitor/Vendor</h2>
                                <small>Are you an Art or Craft maker? Do you sell art or craft materials? Are you a food vendor or an
                                    entrepreneur? Do you need a space to sell or showcase your materials? Then you are on the right
                                    page!</small>
                                <br>
                                <div style="margin-top: 3px;" class="alert alert-info">
                                    <strong>Payment Account: <br> Access Bank 0724104341 ActionAid Intl foundation nig Ltd</strong>
                                </div>
                            </header>
                            <div class="form-content">
                                <div class="form-group">
                                    <label>Organization's Name</label>
                                    <input class="form-control" type="text" name="organization" placeholder="Enter your Organization's name">
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Contact Name:</label>
                                    <div class="input-group">
                                        <input type="text" name="contact_name" class="form-control" placeholder="Enter Contact Name" required>
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Email Address</label>
                                    <div class="input-group">
                                        <input type="email" name="useremail" class="form-control" placeholder="Enter Email Address" required>
                                        <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Phone Number</label>
                                    <div class="input-group">
                                        <input type="tel" name="phone" class="form-control" placeholder="Enter Phone Number" required>
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Creative Categories</label>
                                    <select class="form-control" name="interest">
                                        <option value="0" hidden>-- Select Choice --</option>
                                        <option value="Pottery">Pottery</option>
                                        <option value="Decorative Art (Wood works, Decorative chairs, Hides and Skin, Weaving, Baskets, etc)">
                                            Decorative Art (Wood works, Decorative chairs, Hides and Skin, Weaving, Baskets, etc)
                                        </option>
                                        <option value="Fashion (beads, jewelleries, bags, shoes etc)">
                                            Fashion (beads, jewelleries, bags, shoes etc)
                                        </option>
                                        <option value="Sculptor">Sculptor</option>
                                        <option value="Painting">Painting</option>
                                        <option value="Graphics">Graphics</option>
                                        <option value="Photography">Photography</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label id ="booth_allocation" class="control-label">3-Day Exhibition Booth Detail</label>
                                    <select class="form-control" name="booth_allocation" id = "booth_all">
                                        <option value="0" hidden>Select Choice Indoor Pavilion Outdoor Pavilion</option>
                                        <option value="100000">Indoor Pavilion Exhibition Space (4m*3m) = 100, 000 Naira only </option>
                                        <option value="25000">Outdoor Pavilion Exhibition Space (3m*2m) = 25, 000 Naira only </option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for = "booth" class="control-label">Number of Booth</label>
                                    <?
                                    $options = 0;
                                    for ($booth = 1; $booth <= 5; $booth++) {
                                        $options .= "<option value='$booth'>" . $booth . "</option>";
                                    }
                                    ?>
                                    <select name="booth" id="booth" required class="form-control">
                                        <option value="0" hidden> --Select Number of Booth-- </option>
                                        <?= $options; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                   <h5><strong class="text-danger">Amount to be Paid:
                                           <span id ="amt" class="animated fadeIn">#0 </span></strong></h5>
                                </div>

                                <div class="form-group">
                                    <label for="other_info" class="control-label">Artist Profile</label>
                                    <textarea name="other_info" placeholder="Can we know you better?" class = "form-control" id="other_info" cols="15" rows="5"></textarea>
                                </div>
                                <div class="form-group">
                                    <input id="artwork" type="file" name="artwork[]" multiple class = "form-control inputfile inputfile-1" data-multiple-caption="{count} files selected">
                                    <label for="artwork"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                            <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg>
                                        <span>Upload Your Art Work (Max: 6)&hellip;</span></label> <br>
                                    <small>ActionAid Nigeria will promote uploaded artworks/materials on the art4dev website and social media pages</small>
                                </div>
                                <div class="form-group">
                                    <input id="payment_proof" type="file" name="payment_proof" required class = "form-control inputfile inputfile-1">
                                    <label for="payment_proof"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                            <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg>
                                        <span>Upload Your Proof of Payment</span></label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <input type="submit" name="x-register" class="btn btn-add btn-sm" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal animated fadeInDown <?= isset($PARTICIPANT) ? 'closed':'open' ?>" id="myModalP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="?participant" method="post" enctype="multipart/form-data" onSubmit="return checkForm(this)">
                        <div class="modal-body">
                            <a class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></a>
                                <header><h2>Participant!</h2></header>
                                <h6>A participant registers to book a space in the lecture series of art4dev program </h6>
                                <p></p>
                                <div class="form-content">
                                        <div class="form-group">
                                            <label class="control-label">Fullname</label>
                                            <div class="input-group">
                                                <input type="text" name="fullname" class="form-control" placeholder="Enter Your Name" required>
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Email Address</label>
                                            <div class="input-group">
                                                <input type="email" name="useremail" class="form-control" placeholder="Enter Email Address" required>
                                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <label class="control-label">Phone Number</label>
                                                <input type="tel" name="phone" class="form-control" placeholder="Enter Phone Number" required>
                                        </div>
                                        <div class="form-group">
                                            <label for = "service_needed" class="form-control-label">Topics</label>
                                            <select id="service_needed" class="form-control" name="service_needed">
                                                <option value="0" hidden> -- select --</option>
                                                <option>Arts/Crafts Interest</option>
                                                <option>Bead Making</option>
                                                <option>Wood work</option>
                                                <option>Cane works</option>
                                                <option>Pottery</option>
                                                <option>Photography</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Other Important Information</label>
                                            <textarea class="form-control" name="other_info" placeholder="Other Important Information"></textarea>
                                        </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <input type="submit" name="register" class="btn btn-add" value="Submit">
                                <!--<button type="reset" class="btn btn-danger">Reset/Cancel</button>-->
                            </div>
                        </div>
                    </form>
            </div>
        </div>

        <div class="modal animated fadeInDown" id = "noftModal" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop = "static" data-keyboard = "false">
            <div class=""></div>
        </div>
    </section>
    <!-- <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script> -->
    <? include 'view-stubs/footer.php' ?>
