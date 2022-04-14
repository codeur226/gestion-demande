@csrf

       <!-- Progress Bar Wizard Block -->
       <div class="block">
        <!-- Progress Bars Wizard Title -->
        <div class="block-title">
            <h2><strong>Progress Bar</strong> Wizard</h2>
        </div>
        <!-- END Progress Bar Wizard Title -->

        <!-- Progress Bar Wizard Content -->
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                
            </div>
            <div class="col-sm-6 col-sm-offset-1">
                <!-- Wizard Progress Bar, functionality initialized in js/pages/formsWizard.js -->
                <div class="progress progress-striped active">
                    <div id="progress-bar-wizard" class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0"></div>
                </div>
                <!-- END Wizard Progress Bar -->

                <!-- Progress Wizard Content -->
                <form id="progress-wizard" action="#" method="post" class="form-horizontal">
                    <!-- First Step -->
                    <div id="progress-first" class="step">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-username">Nom</label>
                            <div class="col-md-8">
                                <input type="text" id="example-progress-username" name="example-progress-username" class="form-control" placeholder="Your Nom..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-email">Email</label>
                            <div class="col-md-8">
                                <input type="text" id="example-progress-email" name="example-progress-email" class="form-control" placeholder="test@example.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-password">Password</label>
                            <div class="col-md-8">
                                <input type="password" id="example-progress-password" name="example-progress-password" class="form-control" placeholder="Choose a crazy one..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-password2">Retype Password</label>
                            <div class="col-md-8">
                                <input type="password" id="example-progress-password2" name="example-progress-password2" class="form-control" placeholder="..and confirm it!">
                            </div>
                        </div>
                    </div>
                    <!-- END First Step -->

                    <!-- Second Step -->
                    <div id="progress-second" class="step">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-firstname">Firstname</label>
                            <div class="col-md-8">
                                <input type="text" id="example-progress-firstname" name="example-progress-firstname" class="form-control" placeholder="John..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-lastname">Lastname</label>
                            <div class="col-md-8">
                                <input type="text" id="example-progress-lastname" name="example-progress-lastname" class="form-control" placeholder="Doe..">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-address">Address</label>
                            <div class="col-md-8">
                                <input type="text" id="example-progress-address" name="example-progress-address" class="form-control" placeholder="Where do you live?">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-city">City</label>
                            <div class="col-md-8">
                                <input type="text" id="example-progress-city" name="example-progress-city" class="form-control" placeholder="Which one?">
                            </div>
                        </div>
                    </div>
                    <!-- END Second Step -->

                    <!-- Third Step -->
                    <div id="progress-third" class="step">
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-bio">Bio</label>
                            <div class="col-md-8">
                                <textarea id="example-progress-bio" name="example-progress-bio" rows="5" class="form-control" placeholder="Tell us your story.."></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="example-newsletter">Newsletter</label>
                            <div class="col-md-8">
                                <div class="checkbox">
                                    <label for="example-progress-newsletter">
                                        <input type="checkbox" id="example-progress-newsletter" name="example-progress-newsletter"> Sign up
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 control-label"><a href="#modal-terms" data-toggle="modal">Terms</a></label>
                            <div class="col-md-8">
                                <label class="switch switch-primary" for="example-progress-terms">
                                    <input type="checkbox" id="example-progress-terms" name="example-progress-terms" value="1">
                                    <span data-toggle="tooltip" title="I agree to the terms!"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- END Third Step -->

                    <!-- Form Buttons -->
                    <div class="form-group form-actions">
                        <div class="col-md-8 col-md-offset-4">
                            <input type="reset" class="btn btn-sm btn-warning" id="back3" value="Bacck">
                            <input type="submit" class="btn btn-sm btn-primary" id="next3" value="Next">
                        </div>
                    </div>
                    <!-- END Form Buttons -->
                </form>
                <!-- END Progress Wizard Content -->
            </div>
        </div>
        <!-- END Progress Bar Wizard Content -->
    </div>
    <!-- END Progress Bar Wizard Block -->          
    <script src="{{ asset('../../back-office/assets/js/pages/formsWizard.js ') }}"></script>
    <link rel="stylesheet" href="../../back-office/assets/css/bootstrap.min.css">

    <!-- Related styles of various icon packs and plugins -->
    <link rel="stylesheet" href="../../back-office/assets/css/plugins.css">

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="../../back-office/assets/css/main.css">

    <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="../../back-office/assets/css/themes.css">
    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) -->
    <script src="../../back-office/assets/js/vendor/modernizr.min.js"></script>