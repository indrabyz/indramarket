<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Book Store</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?php echo base_url('assetss/admin/css/bootstrap.css') ?>" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?php echo base_url('assetss/admin/css/font-awesome.css') ?>" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="<?php echo base_url('assetss/admin/css/custom.css') ?>" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="<?php echo base_url('assetss/admin/js/dataTables/dataTables.bootstrap.css') ?>" rel="stylesheet" />
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
                <a class="navbar-brand" href="<?php echo base_url('admin/Admin') ?>">Admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">  <a href="<?php echo base_url('logout/index') ?>" class="btn btn-danger square-btn-adjust">Keluar</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li class="text-center">
                    <img src="<?php echo base_url().'assetss/admin/img/find_user.png'?>" class="user-image img-responsive"/>
                    </li>
                   <li>
                        <a href="<?php echo base_url('backend/Admin') ?>"><i class="fa fa-dashboard fa-3x"></i> Data Buku </a>
                    </li>
                    <li>
                        <a  href="<?php echo base_url('backend/C_kategori') ?>"><i class="fa fa-book fa-3x"></i>Kategori Buku</a>
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
                     <h2>Data Buku</h2>   
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Table Pengaturan Status
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                 <a href="<?php echo base_url('backend/Admin/add')?>"><button class="btn btn-success" style="margin-bottom: 10px;">TAMBAH</button></a>
                                <?=$this->session->flashdata('pesan')?>
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nomor</th>
                                            <th>Nama Buku</th>
                                            <th>Harga Buku</th>
                                            <th>Kategori</th>
                                            <th>Image Buku</th>
                                            
                                            <th></th>  
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                         $nomor = 1;
                                         foreach($data as $d){ ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $d['produk_nama']; ?></td>
                                            <td><?php echo $d['produk_harga']; ?></td>
                                            <td><?php echo $d['kategori']; ?></td>
                                            <td>
                                                <img src="<?php echo base_url().'assetss/backend/uploads/image_resize/buku/'.$d['produk_image'] ?>">
                                            </td>
                                            
                                            <td align="center">
                                                <a href="<?php echo base_url()."backend/admin/do_edit/".$d['produk_id']; ?>"><button class="btn btn-primary btn-xs"><i class="fa fa-edit "></i> Edit</button>
                                                <a href="<?php echo base_url()."backend/admin/do_delete/".$d['produk_id']; ?>"><button class="btn btn-danger btn-xs"><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
                                        <?php 
                                            $nomor = $nomor+1; } ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
        </div>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="<?php echo base_url('assetss/admin/js/jquery-1.10.2.js') ?>"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?php echo base_url('assetss/admin/js/bootstrap.min.js') ?>"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?php echo base_url('assetss/admin/js/jquery.metisMenu.js') ?>"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo base_url('assetss/admin/js/dataTables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assetss/admin/js/dataTables/dataTables.bootstrap.js') ?>"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="<?php echo base_url('assetss/admin/js/custom.js') ?>"></script>
</body>
</html>
