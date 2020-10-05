<? include __DIR__ . '/view-stubs/port-header.php'; ?>
    <div class="w3-container gallery-show">
        <h3>Update your profile</h3>
        <br>
        <div class="row">
            <div class="col-md-9 col-sm-11 col-lg-11 col-md-offset-0 form-update wow animated fadeInUp" data-wow-delay = "1.2s">
                <div class="">
                    <? if ($UPDATE_PWD && isset($SUCCESS)) { ?>
                        <div style="margin-left: 15px;" class="alert alert-success wow animated fadeInDown" data-wow-delay="450ms" data-wow-duration="400ms">
                            <span><?= $ERRMSG; ?></span>
                        </div>
                    <? } ?>
                    <form action="" method="post" class="" enctype="multipart/form-data">
                        <div class="form-group col-md-4">
                            <label for="contact_name" class="control-label">Contact Name</label>
                            <input type="text" value="<?= $IS_LOGGED->contact_name ?>" name="contact_name"
                                   class="form-control" id="contact_name">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="organization">Organization Name</label>
                            <input type="text" value="<?= $IS_LOGGED->organization ?>" readonly name="organization"
                                   class="form-control" id="organization">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="useremail">Email Address</label>
                            <input type="email" value="<?= $IS_LOGGED->useremail ?>" readonly name="useremail"
                                   class="form-control" id="useremail">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="phone">Phone Number</label>
                            <input type="tel" value="<?= $IS_LOGGED->phone_no ?>" name="phone" class="form-control"
                                   id="phone">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="username" class="control-label">Username</label>
                            <input type="text" id="username" name="username" readonly value="<?= $IS_LOGGED->username ?>" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="location" class="control-label">Location</label>
                            <input type="text" id="location" name="location" value="<?= $IS_LOGGED->location ?>"
                                   class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="about_me">My Profile</label>
                            <textarea name="about_me" id="about_me" cols="15" rows="5" class="form-control"><?= $IS_LOGGED->about_me ?></textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="skills">Update Skills</label>
                            <textarea name="skills" id="skills" cols="15" rows="5" class="form-control"><?= $IS_LOGGED->skills ?></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="gender">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="photo">Profile Picture</label>
                            <input type="file" name="photo" id="photo" class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="resume_doc">Upload Your Resume</label>
                            <input type="file" name="resume_doc" id="resume_doc" class="form-control" accept="application/pdf">
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-md-12 text-center">
                            <input type="submit" name="update" class="btn btn-register" value="Update Profile">
                        </div>
                    </form>
                    <div class="clearfix"></div>
                    <hr>

                    <form action="?pwd-update" method="post">
                        <div class="form-group col-md-6">
                            <label for="password">New Password</label>
                            <input type="password" value="" name="userpass" placeholder="Enter New Password" class="form-control" id="password" required>
                            <?= isset($errors['userpass']) ? '<span class="label label-danger">'.$errors['userpass'].'</span>':'' ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="c_password">Confirm Password</label>
                            <input type="password" value="" name="confirm_password" placeholder="Confirm New Password" class="form-control" id="c_password" required>
                            <?= isset($errors['confirm_password']) ? '<span class="label label-danger">'.$errors['confirm_password'].'</span>':'' ?>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group col-md-12 text-center">
                            <input type="submit" name="update_pass" class="btn btn-primary" value="Change Password">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

<? include __DIR__ . '/view-stubs/port-footer.php'; ?>