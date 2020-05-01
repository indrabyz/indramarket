<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Sigitmarket</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url('assetss/admin/css/bootstrap.css') ?>" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url('assetss/admin/css/font-awesome.css') ?>" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url('assetss/admin/css/custom.css') ?>" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">

                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><a href="<?php echo base_url('logout/index') ?>" class="btn btn-danger square-btn-adjust">Keluar</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
             <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="<?php echo base_url().'assetss/admin/img/find_user.png'?>" class="user-image img-responsive"/>
                    </li>
                   <li>
                        <a href="<?php echo base_url('backend/Admin') ?>"><i class="fa fa-dashboard fa-3x"></i> Data Barang </a>
                    </li>
                    <li>
                        <a  href="<?php echo base_url('backend/C_kategori') ?>"><i class="fa fa-book fa-3x"></i>Kategori Barang</a>
                    </li>
                   <li>
                        <a  href="<?php echo base_url('backend/C_user') ?>"><i class="fa fa-user fa-3x"></i>Pengguna</a>
                    </li>
                </ul>
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Halaman Edit Barang</h2>   
                        
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Element Examples
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>Barang</h3>
                                    <form action="<?php echo base_url('backend/Admin/do_update') ?>" method="POST" enctype="multipart/form-data">
                                   
                                        
                                        
                                        <div class="form-group">
                                           <label>Nama Barang</label>
                                            <input type="hidden" name="produk_id" value="<?php echo $produk_id; ?>">
                                            <input name="produk_nama" class="form-control"  value="<?php echo $produk_nama; ?>" />
                                            
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Harga Barang</label>
                                            <input name="produk_harga" class="form-control" value="<?php echo $produk_harga; ?>" />
                                            
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <input name="kategori" class="form-control" value="<?php echo $kategori; ?>" />
                                            
                                        </div>
                                      
                                        <div class="form-group" <img src="<?php echo base_url('assetss/uploads/image_resize/buku/')?>">
                                            
                                            <label>Gambar</label>
                                            <input type="file" name="produk_image" value="upload"/>
                                        
                                        </div>
                                        <button type="submit"  class="btn btn-primary">SIMPAN</button>
                                    </form>
                                    <br />
                                      

                                 
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
                <!-- /. ROW  -->
                
                <!-- /. ROW  -->
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url('assetss/admin/js/jquery-1.10.2.js') ?>"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url('assetss/admin/js/bootstrap.min.js') ?>"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url('assetss/admin/js/jquery.metisMenu.js') ?>"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url('assetss/admin/js/custom.js')?>"></script>
    
   
</body>
</html>
