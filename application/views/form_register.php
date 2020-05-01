<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>BOOK STORE</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <link rel="apple-touch-icon" sizes="76x76" href="assetss/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assetss/img/favicon.png" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="<?php echo base_url('assetss/form/css/bootstrap.min.css') ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assetss/form/css/material-bootstrap-wizard.css') ?>" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo base_url('assetss/form/css/demo.css') ?>" rel="stylesheet" />
</head>

<body>
    <div class="image-container set-full-height" style="background-image: url('<?php echo base_url('assetss/face/img/buku1.jpg')?>')">
        <!--   Creative Tim Branding   -->
        <a href="<?php echo base_url('Welcome')?>">
             <div class="logo-container">
                
            </div>
        </a>

        <!--   Big container   -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                    <!--      Wizard container        -->
                    <div class="wizard-container">
                        <div class="card wizard-card" data-color="red" id="wizard">
                            <form action="<?php echo base_url('backend/C_user/do_insert1') ?>" method="post" enctype="multipart/form-data" >
                        <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->
                                <div class="wizard-header">
                                    <h3 class="wizard-title">
                                        Register
                                    </h3>
                                </div>
                                <div class="wizard-navigation">
                                    <ul>
                                        <li><a href="#register" data-toggle="tab">BOOK STORE</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane" id="register">
                                        <h4 class="info-text">Isi Data Diri dengan Lengkap dan Benar</h4>
                                        <div class="row">
                                            <div class="col-sm-9 col-sm-offset-1">
                                            <?=$this->session->flashdata('pesan')?>
                                                <div class="input-group">
                                                    
                                                    
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Username</label>
                                                        <input name="username" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-lock"></i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Password</label>
                                                        <input name="password" type="password" class="form-control">
                                                        <span style="font-size: 12px; color: #666;"><i>Gunakan kombinasi huruf dengan angka </i></span>
                                                    </div>
                                                </div>
                                               <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Email</label>
                                                        <input name="email" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                    <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                                                    <div class="form-group label-floating">
                                                        <label class="control-label">Nomor Telpon</label>
                                                        <input name="no_telp" type="text" class="form-control">
                                                    </div>
                                                </div>
                                                
                                               
                                               
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="wizard-footer">
                                    <div class="pull-right">
                                        <input type='submit' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Daftar' />
                                    </div>
                                    <div class="pull-left">
                                        <a href="<?php echo base_url('Cart')?>"><input type='button' class='btn btn-primary' name='previous' value='Kembali' />
                                        <div class="footer-checkbox">
                                            <div class="col-sm-12">
                                          </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div> <!-- row -->
        </div> <!--  big container -->

        <div class="footer">
            <div class="container text-center">
                 Made by Indra Bayu 
            </div>
        </div>
    </div>
</body>
    <!--   Core JS Files   -->
    <script src="<?php echo base_url('assetss/form/js/jquery-2.2.4.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assetss/form/js/bootstrap.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assetss/form/js/jquery.bootstrap.js') ?>" type="text/javascript"></script>

    <!--  Plugin for the Wizard -->
    <script src="<?php echo base_url('assetss/form/js/material-bootstrap-wizard.js') ?>"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
    <script src="<?php echo base_url('assetss/form/js/jquery.validate.min.js') ?>"></script>
</html>
