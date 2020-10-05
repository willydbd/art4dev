<? include __DIR__ .'/admin-header.php'; ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?= ADMIN_PREFIX .'dashboard' ?>">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"><a>Community</a></li>
        </ol>
        <!-- Icon Cards-->
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-12 community">
                    <h3>Add Exhibitors to the Community</h3>
                    <div class="col-md-11" style="margin-left: 10%;">
                        <? if ($ADD_TO_COMMUNITY && !$SUCCESS) { ?>
                            <div class="alert alert-danger create-order-alert anim-js fadeInDown" data-ajs-delay="450ms" data-ajs-duration="400ms">
                                <strong>Something's wrong.</strong>
                                <span>Fill All the Fields</span>
                            </div>
                        <? } ?>
                        <? if (!($ADD_TO_COMMUNITY && $SUCCESS)) { ?>
                        <form action="?community" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">Organization Name</label>
                                        <input type="text" name="organization" class="form-control" placeholder="Organization Name">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">Contact Name</label>
                                        <input type="text" name="contact_name" class="form-control" placeholder="Contact Name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">Email Address</label>
                                        <input type="email" class="form-control" name="com_email" placeholder="Enter Email Address">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="control-label">Phone Number</label>
                                        <input placeholder="Enter Phone Number" type="tel" name="phone_no" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
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
                                </div>
                                <div class="col-md-5">
                                    <label id ="booth_allocation" class="control-label">3-Day Exhibition Booth Detail</label>
                                    <select class="form-control" name="booth_allocation" id = "booth_all">
                                        <option value="0" hidden> --Select--</option>
                                        <option value="100000">Indoor Pavilion Exhibition Space (4m*3m) = 100, 000 Naira only </option>
                                        <option value="25000">Outdoor Pavilion Exhibition Space (3m*2m) = 25, 000 Naira only </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
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
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <input id="artwork" type="file" name="artwork[]" multiple class = "form-control inputfile inputfile-1" data-multiple-caption="{count} files selected">
                                        <label for="artwork"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17">
                                                <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg>
                                            <span>Upload Your Art Work (Max: 6)&hellip;</span></label> <br>
                                        <small>ActionAid Nigeria will promote uploaded artworks/materials on the art4dev website and social media pages</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <label for="other_info" class="control-label">Artist Profile</label>
                                        <textarea name="other_info" placeholder="Can we know you better?" class = "form-control" id="other_info" cols="15" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-10">
                                <div class="form-group">
                                    <input type="submit" value="Add to Community" name = "addToCommunity" class="btn btn-danger">
                                </div>
                            </div>
                        </form>
                        <? } else { ?>
                            <div class="form-group">
                                <span class="success-msg">Added Successfully</span>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- <footer class="sticky-footer">
             <div class="container">
                 <div class="text-center">
                     <small>Copyright © Art4Dev 2018</small>
                 </div>
             </div>
         </footer>-->
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
    let inputs = document.querySelectorAll('.community .inputfile');
    Array.prototype.forEach.call(inputs, function (input) {
        let label = input.nextElementSibling,
            labelVal = label.innerHTML;

        input.addEventListener('change', function (e) {
            let fileName = '';
            if ( this.file && this.files.length > 1 )
                fileName = e.target.value.split('\\').pop();

            if(fileName)
                label.querySelector('span').innerHTML = fileName;
            else
                label.innerHTML = labelVal;
        });
        input.addEventListener('focus', function () {
            input.classList.add('has-focus');
        });
        input.addEventListener('blur', function () {
            input.classList.add('has-focus');
        });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
<script>
    baguetteBox.run('.tz-gallery');
</script>
</body>

</html>
