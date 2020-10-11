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

	<!-- Plugins css -->
	<link href="<?php echo base_url();?>assets/libs/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

	<!-- App css -->
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url();?>assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>
<?php $this->load->view('templates/header'); ?>




	<div class="wrapper" style="padding-top: 80px;">
		<div class="container-fluid">

			<!-- start page title -->
			<div class="row">
				<div class="col-12">
					<div class="page-title-box">
						<div class="page-title-right">
							<form class="form-inline">
								<div class="form-group">
									<div class="input-group input-group-sm">
										<select class="form-control" name="" id="">
											<option value="">Hari ini</option>
											<option value="">Minggu Ini</option>
											<option value="">Bulan Ini</option>
											<option value="">Tahun Ini</option>
										</select>
									</div>
								</div>
							</form>
						</div>
						<h4 class="page-title">Home</h4>
					</div>
				</div>
			</div>
            <div class="container">
                <div class="page-header d-flex align-items-center justify-content-between">
                    <div class="page-title">
                    </div>
                    <div class="page-buttons">
                        <button class="btn btn-grey">Filter Data</button>
                    </div>
                </div>
            </div>
			<!-- end page title -->
			<?php foreach($product AS $product) : ?>
			<div class="row">
				<div class="col-md-6 col-xl-4">
					<div class="widget-rounded-circle card-box">
						<div class="row">
							<div class="col-6">
								<div class="avatar-lg rounded-circle bg-soft-primary border-primary border">
									<i class="fas fa-boxes font-22 avatar-title text-primary"></i>
								</div>
							</div>
							<div class="col-6">
								<div class="text-right">
									<h3 class="mt-1"><span data-plugin="counterup"><?= $product['stock_awal'] ?></span></h3>
									<p class="text-muted mb-1 text-truncate">Total Barang</p>
								</div>
							</div>
						</div> <!-- end row-->
					</div> <!-- end widget-rounded-circle-->
				</div> <!-- end col-->
				
				<?php endforeach; ?>

				
				<div class="col-md-6 col-xl-4">
					<div class="widget-rounded-circle card-box">
						<div class="row">
							<div class="col-6">
								<div class="avatar-lg rounded-circle bg-soft-success border-success border">
									<i class="fas fa-box font-22 avatar-title text-success"></i>
								</div>
							</div>
							<div class="col-6">
								<div class="text-right">
									<h3 class="mt-1"><span data-plugin="counterup"><?= $countMasuk?></span></h3>
									<p class="text-muted mb-1 text-truncate">Barang Masuk</p>
								</div>
							</div>
						</div> <!-- end row-->
					</div> <!-- end widget-rounded-circle-->
				</div> <!-- end col-->
				
				
				
				<div class="col-md-6 col-xl-4">
					<div class="widget-rounded-circle card-box">
						<div class="row">
							<div class="col-6">
								<div class="avatar-lg rounded-circle bg-soft-info border-info border">
									<i class="fas fa-box-open font-22 avatar-title text-info"></i>
								</div>
							</div>
							<div class="col-6">
								<div class="text-right">
									<h3 class="mt-1"><span data-plugin="counterup"><?= $countKeluar?></span></h3>
									<p class="text-muted mb-1 text-truncate">Barang Keluar</p>
								</div>
							</div>
						</div> <!-- end row-->
					</div> <!-- end widget-rounded-circle-->
				</div> <!-- end col-->
				
				
			</div>
			<!-- end row-->

			<div class="row">
				<div class="col-xl-12">
					<div class="card-box">
						<h4 class="header-title mb-2">5 Transaksi terakhir</h4>
						<p class="mb-3">Berikut adalah 5 transaksi terakhir yang terjadi di sistem</p>
						<a href='<?= base_url() ?>home/exportCSV'>Export</a><br><br>
						<div class="table-responsive">
							<table class="table table-borderless table-hover table-centered m-0">
								<thead class="thead-light">
									<tr>
										<th>Job No</th>
										<th>part Name</th>
										<th>Type</th>
										<th>Stock Awal</th>
										<th>Stock In</th>
										<th>Stock Out</th>
										<th>Stock Akhir</th>
										<th>Tanggal</th>
										
										<th class="text-center">Jenis</th>
										
										<!-- <th class="text-center">Aksi</th> -->
									</tr>
								</thead>
								<tbody>
								<?php foreach($report AS $report) : ?>
									<tr>
										<td><h5 class="m-0 font-weight-normal"><?php echo $report['job_no'] ?></h5></td>
										<td><?php echo $report['part_no'] ?></td>
										<td><?php echo $report['type'] ?></td>
										<td><?php echo $report['stock_awal'] ?></td>
										<td><?php echo $report['stock_in'] ?></td>
										<td><?php echo $report['stock_out'] ?></td>
										<td><?php echo $report['stock_akhir'] ?></td>
										<td class="text-center"><?php echo $report['created_at'] ?></td>
										<td class="text-center">
											<?php if ($report['kategori'] == "1"){
											echo "<span class='badge bg-soft-success text-success'> Barang Masuk</span>";
											}else if($report['kategori'] == "2"){
												echo "<span class='badge bg-soft-danger text-danger'>Barang Keluar</span>";
											} ?>
										</td>
										
										<!-- <td class="text-center"><a href="javascript: void(0);" class="btn btn-xs btn-primary">Detail</a></td> -->
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div> <!-- end .table-responsive-->
					</div> <!-- end card-box-->
				</div> <!-- end col -->
			</div>
			<!-- end row -->

		</div> <!-- end container -->
	</div>
	<!-- end wrapper -->




	<?php $this->load->view('templates/footer'); ?>

	<!-- Vendor js -->
	<script src="<?php echo base_url();?>assets/js/vendor.min.js"></script>

	<!-- App js-->
	<script src="<?php echo base_url();?>assets/js/app.min.js"></script>

</body>

</html>
