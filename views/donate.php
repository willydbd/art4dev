<? include 'view-stubs/header.php';
    require_once __DIR__ .'/../lib/Helpers/register-helper.php';
?>
<section class="nav-cover"></section>
<section class="register">
        <div class="inner-register row">
            <!--<h3>Donate Form</h3>-->
            <div class = "donate-info">
               <h3>Art4Charity</h3>
                <span>As part of the activities for the Art4Dev Gala Night program , there would be an Art Auction “Art4Charity” , which would be auctioning off selected works of artists , to help raise funds . Proceeds from the auction of donated artworks would be used to further ActionAid's community sponsorship initiative for community development in Nigeria </span>
                <!--<h3>Art For Charity , How does it work?</h3>
                <ul>
                    <li>Design an artwork that in line with the theme of the expo on development ( creativity, empowerment, livelihood, sustainability)</li>
                    <li>Donate a piece of Art work for Charity</li>
                    <li>Your Artwork would be auctioned for Charity</li>
                    <li>Proceeds from the auction of donated artworks would be used to further ActionAid's community sponsorship initiative for community development in Nigeria</li>
                </ul>-->
            </div>
            <hr>
            <div class = "col-md-6 col-md-offset-3">
                <? if ($DONATE && !$SUCCESS) { ?>
                    <div class="alert alert-danger create-order-alert anim-js fadeInDown" data-ajs-delay="450ms" data-ajs-duration="400ms">
                        <strong>Something's wrong.</strong>
                        <span>Fill All the Fields</span>
                    </div>
                <? } ?>
                <? if (!($DONATE && $SUCCESS)) { ?>
                <form action="?donate" method="post" onSubmit="return checkForm(this)" enctype="multipart/form-data">
                    <div class="form-content">
                        <? if (isset($report)) echo $report; ?>
                        <div class="form-group">
                            <label class="control-label">Your Name:</label>
                            <div class="input-group">
                                <input type="text" name="fullname" class="form-control" placeholder="Enter Your Name" required>
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Email Address</label>
                            <div class="input-group">
                                <input type="email" name="useremail" class="form-control" placeholder="Enter Email Address"
                                       required>
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                            </div>
                        </div>
                        <div class="form-group" id="spwd">
                            <label class="control-label">Phone Number</label>
                            <input class="form-control" type="tel" name="phone" placeholder="Enter your Phone Number">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Location</label>
                            <input class="form-control" type="text" name="location" placeholder="Enter your Location">
                        </div>
                        <div class="form-group">
                            <label for = "other_info" class="control-label">Other Important Information</label>
                            <textarea name="other_info" class="form-control" id="other_info" cols="15" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <input id="artwork" type="file" name="artwork[]" multiple class = "form-control inputfile inputfile-1" data-multiple-caption="{count} files selected">
                            <label for="artwork"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg>
                                <span>Upload Your Art Work (Max: 6)&hellip;</span></label> <br>
                            <small>ActionAid Nigeria will promote uploaded artworks/materials on the art4dev website and social media pages</small>
                        </div>
                        <div class="form-group">
                            <label><strong>Term & Conditions</strong></label> <br>
                            <small>I. Successful donors will be contacted after selection screening by the Art Experts. Your
                                submission does not imply acceptance.
                                <br>II. All donors shall be responsible for postage to ActionAid Nigeria’s office in Abuja,
                                Lagos or Borno.
                            </small>
                        </div>
                        <div class="row">
                        <div class="form-group col-sm-12">
                            <div class="checkbox checkbox-circle checkbox-primary">
                                <input type="checkbox" name="declaration" id="declaration" class="styled">
                                <label for="declaration">&nbsp;I accept all terms and conditions. </label>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" id = "accept" name="donate" class="btn btn-add btn-sm" value="Submit" disabled>
                    </div>
                </form>
                <? } else { ?>
                    <div class="form-group text-center wow animated fadeInDown">
                        <div class="success-msg">
                            <i class="fa fa-fw fa-check-circle"></i> Submission Successful <br>
                            <div class="wow animated fadeInTop" data-delay = ".7s" style="text-align: center; padding-top: 20px;">
                                <a href="<?= LINK_PREFIX . 'donation'; ?>" class="btn btn-register">Go Back</a>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
</section>
<? include 'view-stubs/footer.php' ?>
