<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Storage - PT Astra Komponen Indonesia</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon-aski.ico">

        <!-- App css -->
        <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

	</head>
	
	<style>
		.hide-this {
			display: none;
		}
	</style>

    <body class="authentication-bg pb-0">

        <div class="account-pages mt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a href="index.html">
                                        <span><img src="<?php echo base_url();?>assets/images/logo-aski.png" alt="" height="40"></span>
                                    </a>
                                    <p class="text-muted mb-4 mt-3">Storage System <br/> PT. Astra Komponen Indonesia</p>
                                </div>
								<div class="alert alert-danger alert-dismissible fade show hide-this" id="failedAlert" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									Username atau Password salah !
								</div>
								<div class="alert alert-success alert-dismissible fade show hide-this" id="successAlert" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									Anda berhasil masuk
								</div>
                                <form id="formLogin" method="POST" action="">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Username</label>
                                        <input class="form-control" type="username" id="username" name="username" required="" placeholder="Tuliskan username anda">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required="" id="password" name="password" placeholder="Tuliskan password anda">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox checkbox-danger">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
										<button class="btn btn-danger btn-block" id="btn-login" type="submit"> Log In </button>
									</div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <!-- Vendor js -->
        <script src="<?php echo base_url();?>assets/js/vendor.min.js"></script>

        <!-- App js -->
		<script src="<?php echo base_url();?>assets/js/app.min.js"></script>
		
        
    </body>
</html>
