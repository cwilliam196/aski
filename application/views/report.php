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
	<!-- C3 Chart css -->
	<link href="<?php echo base_url();?>assets/libs/c3/c3.min.css" rel="stylesheet" type="text/css" />
	<!-- third party css end -->


	<!-- App css -->
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" />
	<style>
		.hide-this {
			display: none;
		}
	</style>
</head>

<?php $this->load->view('templates/header'); ?>

<div class="wrapper" style="padding-top: 80px;">
	<div class="container-fluid">

		<!-- start page title -->
		<div class="row">
			<div class="col-12">
				<div class="page-title-box">
					<div class="page-title-right">
						<ol class="breadcrumb m-0">
							<li class="breadcrumb-item"><a href="<?php echo site_url('home');?>">Home</a></li>
							<li class="breadcrumb-item active">Storage</li>
						</ol>
					</div>
					<h4 class="page-title">Product List </h4>
				</div>
			</div>
		</div>     
		<!-- end page title -->

		<div class="row">
			<div class="col-xl-12">
				<div class="card-box">
				    <!-- <button id="btnScan" data-toggle="modal" data-target="#modalScan" class="btn btn-success btn- mb-4">SCAN BARANG MASUK</button> -->
					<table id="dataTable" class="table table-hover">
						<thead class="bg-soft-primary">
							<tr>
								<th>Kategori</th>
								<th>Material No</th>
								<th>Job No</th>
								<th>Type</th>
								<th>Part No</th>
								<th>UOM</th>
								<th>Stock</th>
								<th>Created At</th>
								<th>Update At</th>
							</tr>
						</thead>
						<tbody>
                                <?php foreach($report AS $report) : ?>
                                <tr>
                                    <td>
                                        <?php if ($report['kategori'] == "1"){
                                        echo "<span class='badge bg-soft-success text-success'> Barang Masuk</span>";
                                        }else if($report['kategori'] == "2"){
                                            echo "<span class='badge bg-soft-danger text-danger'>Barang Keluar</span>";
                                        } ?>
										
                                    </td>
                                    <td><?= $report['material_no'] ?></td>
                                    <td><?= $report['job_no'] ?></td>
                                    <td><?= $report['type'] ?></td>
                                    <td><?= $report['part_no'] ?></td>
                                    <td><?= $report['uom'] ?></td>
                                    <td><?= $report['stock'] ?></td>
                                    <td><?= $report['created_at'] ?></td>
                                    <td><?= $report['update_at'] ?></td>
                                </tr>
                                <?php endforeach; ?>
                        </tbody>
					</table>
				</div> <!-- end card-box-->
			</div> <!-- end col -->
		</div>

	</div> <!-- end container -->
</div>

<!-- Modal -->
<div class="modal fade" id="modalScan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-body">
				<form id="formScan">
					<h4 class="text-center">Scan barcode barang sekarang</h4>
                 
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<input type="text" class="form-control" name="jobNo" id="jobNo" style="opacity:0;">
							</div>
						</div>
					</div>
				</form>
				<form id="formStock" class="hide-this">
					<div class="row">
						<div class="col-12">
							<div class="form-group text-center">
								<label for="">Jumlah stok yang akan ditambahkan</label>
								<input type="number" class="form-control" name="stock" id="stock">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group text-center">
								<button class="btn btn-success">Tambah stok barang</button>
							</div>
						</div>
					</div>
				</form>
        	</div>
		</div>
	</div>
</div>
    
    
<?php $this->load->view('templates/footer'); ?>

<!-- Vendor js -->
<script src="<?php echo base_url();?>assets/js/vendor.min.js"></script>
<!--C3 Chart-->
<script src="<?php echo base_url();?>assets/libs/d3/d3.min.js"></script>
<script src="<?php echo base_url();?>assets/libs/c3/c3.min.js"></script>

<!-- App js-->
<script src="<?php echo base_url();?>assets/js/app.min.js"></script>

<script>
	let jobNo = '';
	$('#formScan').on('submit', function(e){
		e.preven1efault();
		$('#formScan').hide();
		$('#formStock').show();
		jobNo = $('#jobNo').val();
	});

	$('#formStock').on('submit', function(e){
		let stock = $('#stock').val();
		jobNo = jobNo.substr(0,7);
		e.preventDefault();
		$.ajax({
			type: "POST",
			url: "<?php echo site_url('products/update_stock');?>",
			data: {jobNo:jobNo, stock:stock},
			dataType: 'JSON',
			success: function (response) {
				
			}
		});
	})

	$.ajax({
		type: "GET",
		url: "<?php echo site_url('products/get_table');?>",
		dataType: "JSON",
		success: function (response) {
			let html = '';
			for (let i = 0; i < response.data.length; i++) {
				if (response.data[i].product_status == '1') {
					response.data[i].product_status = '<label class="badge bg-soft-success py-1 px-2">Tersedia</label>';
				}
				else if (response.data[i].product_status == '2') {
					response.data[i].product_status = '<label class="badge bg-soft-danger py-1 px-2">Keluar</label>';
				}
				html += `
					<tr>
						<td>${response.data[i].job_no}</td>
						<td>${response.data[i].product_category_name}</td>
						<td>${response.data[i].material}</td>
						<td>${response.data[i].parts_name}</td>
						<td>${response.data[i].color}</td>
						<td>${response.data[i].stock}</td>
						<td>${response.data[i].uom}</td>
					</tr>
				`;
			}
			$('#dataTable').find('tbody').html(html);
		}
	});

	$('#btnScan').on('click', function(){
		setTimeout(() => {
			$('#jobNo').trigger('focus');		
		}, 1000);
	});

	var chart = c3.generate({
		bindto: '#chart1',
		data: {
			columns: [
				["setosa", 0.2, 0.2, 0.2, 0.2, 0.2, 0.4, 0.3, 0.2, 0.2, 0.1, 0.2, 0.2, 0.1, 0.1, 0.2, 0.4, 0.4, 0.3, 0.3, 0.3, 0.2, 0.4, 0.2, 0.5, 0.2, 0.2, 0.4, 0.2, 0.2, 0.2, 0.2, 0.4, 0.1, 0.2, 0.2, 0.2, 0.2, 0.1, 0.2, 0.2, 0.3, 0.3, 0.2, 0.6, 0.4, 0.3, 0.2, 0.2, 0.2, 0.2],
				["versicolor", 1.4, 1.5, 1.5, 1.3, 1.5, 1.3, 1.6, 1.0, 1.3, 1.4, 1.0, 1.5, 1.0, 1.4, 1.3, 1.4, 1.5, 1.0, 1.5, 1.1, 1.8, 1.3, 1.5, 1.2, 1.3, 1.4, 1.4, 1.7, 1.5, 1.0, 1.1, 1.0, 1.2, 1.6, 1.5, 1.6, 1.5, 1.3, 1.3, 1.3, 1.2, 1.4, 1.2, 1.0, 1.3, 1.2, 1.3, 1.3, 1.1, 1.3],
				["virginica", 2.5, 1.9, 2.1, 1.8, 2.2, 2.1, 1.7, 1.8, 1.8, 2.5, 2.0, 1.9, 2.1, 2.0, 2.4, 2.3, 1.8, 2.2, 2.3, 1.5, 2.3, 2.0, 2.0, 1.8, 2.1, 1.8, 1.8, 1.8, 2.1, 1.6, 1.9, 2.0, 2.2, 1.5, 1.4, 2.3, 2.4, 1.8, 1.8, 2.1, 2.4, 2.3, 1.9, 2.3, 2.5, 2.3, 1.9, 2.0, 2.3, 1.8],
			],
			type : 'donut',
			onclick: function (d, i) { console.log("onclick", d, i); },
			onmouseover: function (d, i) { console.log("onmouseover", d, i); },
			onmouseout: function (d, i) { console.log("onmouseout", d, i); }
		}
	});

	var chart = c3.generate({
		bindto: '#chart2',
		data: {
			columns: [
				["setosa", 0.2, 0.2, 0.2, 0.2, 0.2, 0.4, 0.3, 0.2, 0.2, 0.1, 0.2, 0.2, 0.1, 0.1, 0.2, 0.4, 0.4, 0.3, 0.3, 0.3, 0.2, 0.4, 0.2, 0.5, 0.2, 0.2, 0.4, 0.2, 0.2, 0.2, 0.2, 0.4, 0.1, 0.2, 0.2, 0.2, 0.2, 0.1, 0.2, 0.2, 0.3, 0.3, 0.2, 0.6, 0.4, 0.3, 0.2, 0.2, 0.2, 0.2],
				["versicolor", 1.4, 1.5, 1.5, 1.3, 1.5, 1.3, 1.6, 1.0, 1.3, 1.4, 1.0, 1.5, 1.0, 1.4, 1.3, 1.4, 1.5, 1.0, 1.5, 1.1, 1.8, 1.3, 1.5, 1.2, 1.3, 1.4, 1.4, 1.7, 1.5, 1.0, 1.1, 1.0, 1.2, 1.6, 1.5, 1.6, 1.5, 1.3, 1.3, 1.3, 1.2, 1.4, 1.2, 1.0, 1.3, 1.2, 1.3, 1.3, 1.1, 1.3],
				["virginica", 2.5, 1.9, 2.1, 1.8, 2.2, 2.1, 1.7, 1.8, 1.8, 2.5, 2.0, 1.9, 2.1, 2.0, 2.4, 2.3, 1.8, 2.2, 2.3, 1.5, 2.3, 2.0, 2.0, 1.8, 2.1, 1.8, 1.8, 1.8, 2.1, 1.6, 1.9, 2.0, 2.2, 1.5, 1.4, 2.3, 2.4, 1.8, 1.8, 2.1, 2.4, 2.3, 1.9, 2.3, 2.5, 2.3, 1.9, 2.0, 2.3, 1.8],
			],
			type : 'pie',
			onclick: function (d, i) { console.log("onclick", d, i); },
			onmouseover: function (d, i) { console.log("onmouseover", d, i); },
			onmouseout: function (d, i) { console.log("onmouseout", d, i); }
		}
	});
</script>

</body>

</html>
