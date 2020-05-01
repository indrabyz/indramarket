<!DOCTYPE html>
<html>
<head>
	<title>Book Store</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css'?>">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
<div class="container" ><br/>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">INDRA MARKET</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li><a href="<?php echo base_url('backend/C_user/register') ?>">Daftar</a></li>
        <li><a href="<?php echo base_url('backend/C_user/login') ?>">Masuk</a></li>
        
        <form class="navbar-form navbar-left" action="#" method="get">
        <div class="form-group">
          <input type="text" name="produk_nama" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      </ul>
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	
	<div class="row">
		<div class="col-md-8">
			<h4>Produk</h4>
			
			<div class="row">
			<?php foreach ($data as $row) : ?>
				<div class="col-md-4">
					<div class="thumbnail">
						<img width="80%" height="80%" src="<?php echo base_url().'assetss/backend/uploads/image/buku/'.$row->produk_image;?>">
						<div class="caption">
							<h4><?php echo $row->produk_nama;?></h4>
							<div class="row">
								<div class="col-md-7">
									<h4><?php echo 'Rp '.number_format($row->produk_harga);?></h4>
								</div>
								<div class="col-md-5">
									<input type="number" name="quantity" id="<?php echo $row->produk_id;?>" value="1" class="quantity form-control">
								</div>
							</div>
							<button class="add_cart btn btn-success btn-block" data-produkid="<?php echo $row->produk_id;?>" data-produknama="<?php echo $row->produk_nama;?>" data-produkharga="<?php echo $row->produk_harga;?>">Add To Cart</button>
						</div>
					</div>
				</div>
			<?php endforeach;?>
				
			</div>

		</div>
		<div class="col-md-4">
			<h4>Shopping Cart</h4>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Produk</th>
						<th>Harga</th>
						<th>Qty</th>
						<th>Subtotal</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody id="detail_cart">

				</tbody>
				
			</table>
		</div>
	</div>
</div>
<div class="navbar navbar-inverse navbar-fixed-bottom">
	<div class="container col-md-4">
		
		<p style="color:#fff">
			Contact : Indra Bayu<br>
			No HP   : 085921664279<br>
			Email   : indra.bayu1254@gmail.com<br>
		</p>
	</div>
	<div class="col-md-8 col-md-offset-5">
		<p style="color:#fff">
		&#169; Copyright : Indra Bayu
		</p>
	</div>
	
</div>

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.2.3.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.add_cart').click(function(){
			var produk_id    = $(this).data("produkid");
			var produk_nama  = $(this).data("produknama");
			var produk_harga = $(this).data("produkharga");
			var quantity     = $('#' + produk_id).val();
			$.ajax({
				url : "<?php echo base_url();?>index.php/cart/add_to_cart",
				method : "POST",
				data : {produk_id: produk_id, produk_nama: produk_nama, produk_harga: produk_harga, quantity: quantity},
				success: function(data){
					$('#detail_cart').html(data);
				}
			});
		});

		// Load shopping cart
		$('#detail_cart').load("<?php echo base_url();?>index.php/cart/load_cart");

		//Hapus Item Cart
		$(document).on('click','.hapus_cart',function(){
			var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
			$.ajax({
				url : "<?php echo base_url();?>cart/hapus_cart",
				method : "POST",
				data : {row_id : row_id},
				success :function(data){
					$('#detail_cart').html(data);
				}
			});
		});
	});
</script>
</body>
</html>