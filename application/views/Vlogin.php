<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>global_assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>global_assets/assets/css/binary.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>global_assets/assets/css/binary_limitless.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>global_assets/assets/css/layout.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>global_assets/assets/css/components.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>global_assets/assets/css/colors.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url(); ?>global_assets/assets/ladda/ladda-themeless.min.css" rel="stylesheet" type="text/css">

    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script src="<?php echo base_url(); ?>global_assets/js/main/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>global_assets/js/main/binary.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>global_assets/js/plugins/loaders/blockui.min.js"></script>
    <script src="<?php echo base_url(); ?>global_assets/js/plugins/ui/ripple.min.js"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="<?php echo base_url(); ?>global_assets/js/plugins/forms/validation/validate.min.js"></script>
    <script src="<?php echo base_url(); ?>global_assets/js/plugins/forms/styling/uniform.min.js"></script>

    <script src="<?php echo base_url(); ?>global_assets/assets/js/app.js"></script>
    <!-- /theme JS files -->

    <!-- <script src="<?php echo base_url(); ?>assets/js/auth/login.js"></script> -->
    <script src="<?php echo base_url(); ?>global_assets/js/plugins/notifications/pnotify.min.js"></script>
    <script src="<?php echo base_url(); ?>global_assets/assets/js/form_validator/jquery.form-validator.js"></script>

    <script src="<?php echo base_url(); ?>global_assets/assets/ladda/spin.min.js"></script>
    <script src="<?php echo base_url(); ?>global_assets/assets/ladda/ladda.min.js"></script>

</head>

<body data-base="<?php echo base_url(); ?>">

    <!-- Main navbar -->

    <!-- /main navbar -->

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content d-flex justify-content-center align-items-center">

                <!-- Login card -->
                <form class="login-form form-validate" action="<?php echo base_url();?>/login" method="POST" id="login_form">
                    <div class="card mb-0">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                                <h5 class="mb-0">Login</h5>
                            </div>
                            
                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="text" class="form-control" name="identity" id="identity" placeholder="Email" data-validation="email required">
                                <div class="form-control-feedback">
                                    <i class="icon-envelop text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group form-group-feedback form-group-feedback-left">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" data-validation="required">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                    

                            <div class="form-group">
                                <button type="submit" id="submit_button" class="btn btn-primary btn-block ladda-button" data-style="expand-right"><span class="ladda-label">Login</span></button>
                            </div>
                            
                        </div>
                    </div>
                </form>
                <!-- /login card -->
            </div>
            <!-- /content area -->


            <!-- Footer -->

            <!-- /footer -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->
   

</body>
</html>
