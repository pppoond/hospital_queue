<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<?php $this->load->view('includes/css'); ?>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/home.css'); ?>">
</head>

<body>
	<div class="container-main">
		<div class="container-home">
			<div class="navbar-home" style="height: 15vh;">
				<div class="navbar-items">
					<img src="<?php echo base_url('assets/images/logo.png'); ?>" width="75px">
					<div style="width: 16px;"></div>
					<h1 style="color: white;">โรงพยาบาลเทศบาลนครอุดรธานี</h1>
				</div>
				<div>
					<h1>แผนกผู้ป่วยนอก (OPD)</h1>
				</div>
			</div>
			<div class="body-home" style="height: 80vh;">
				<div class="items1">
					<div class="card text-center container-fluid">
						<div class="card-header">
							<h1>คิวปัจจุบัน</h1>
						</div>
						<div class="card-body">
							<p class="card-title" style="font-size: 8rem;font-weight: 600;">คิวที่ 203</p>
							<p class="card-title" style="font-size: 8rem;">ห้อง 2</p>
						</div>
					</div>
				</div>
				<div class="items2">
					<div style="height: 16px;"></div>
					<?php
					for ($i = 1; $i < 20; $i++) {
						if ($i == 1) {
					?>
							<div class="card text-white bg-primary">
								<div class="card-body">
									<h1 class="card-title">คิวที่ 203</h1>
								</div>
							</div>
							<div style="height: 16px;"></div>
						<?php
						} else {
						?>
							<div class="card">
								<div class="card-body">
									<h1 class="card-title">คิวที่ 203</h1>
								</div>
							</div>
							<div style="height: 16px;"></div>
					<?php
						}
					}
					?>
				</div>
			</div>
			<div class="bottom-home" style="height: 5vh;">
				<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias, porro.</p>
			</div>
		</div>
	</div>
	<script>

	</script>
</body>

</html>