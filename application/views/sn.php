<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>โรงพยาบาลเทศบาลนครอุดรธานี</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/home.css'); ?>">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
</head>

<body>
	<div class="container-main">
		<div class="container-home">
			<div class="navbar-home" style="height: 15vh ;">
				<div class="navbar-items">
					<img src="<?php echo base_url('assets/images/logo.png'); ?>" width="75px">
					<div style="width: 16px;"></div>
					<h1 style="color: white;font-weight: 400;">โรงพยาบาลเทศบาลนครอุดรธานี</h1>
				</div>
				<div style="text-align: end;">
					<h1 style="color: white;font-weight: 400;">แผนกผู้ป่วยนอก (OPD)</h1>
					<p style="color: white;font-size: large;font-weight: 700;border-style: solid;width: fit-content;">วันที่ 07/12/2565 เวลา 16:08 น.</p>
				</div>
			</div>
			<div class="body-home" style="height: 80vh;">
				<div class="items1">
					<div class="card text-center container-fluid" style="background-color: #FF8484 ;border-radius: 16px; ">
						<div  >
							<h1 style="font-size: 100px;color: white;">---- หมายเลข ----</h1>
						</div>
                        



                        
						<div class="card-body">
                        <div class="card text-white" style="background-color: #FF8484; border-radius: 16px; ">
									<div class="card-body-test" style="text-align: center;">
										<h1 class="card-title" style="font-size: 100px;">TEST</h1>
                                   
									</div>
								</div>
								<div style="height: 16px;"></div>



                       
                    

						</div>
					
                    
                    
                    
                    
                    </div>
				</div>

                <div class="items2">
					<div class="in-items">
						<?php
						for ($i = 1; $i < 20; $i++) {
							if ($i == 1) {
						?>
								<div class="card text-white" style="background-color: #FF8484; border-radius: 16px;">
									<div class="card-body" style="text-align: center;">
										<h1 class="card-title" style="font-size: 100px;">203</h1>
									</div>
								</div>
								<div style="height: 16px;"></div>
							<?php
							} else {
							?>
								<div class="card" style="background-color: white; border-radius: 16px; ">
									<div class="card-body" style="text-align: center;">
										<h1 class="card-title" style="font-size: 100px;color: #FF8484;">203</h1>
									</div>
								</div>
								<div style="height: 16px;"></div>
						<?php
							}
						}
						?>
					</div>
				</div>
			</div>
			<div class="bottom-home" style="height: 5vh;">
				<p>xxxxxxxxxx</p>
			</div>
		</div>
	</div>
	<script>

	</script>
</body>

</html>