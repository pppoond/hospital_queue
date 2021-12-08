<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/home.css'); ?>">
</head>

<body>
	<div class="container-main">
		<div class="container-home">
			<div class="navbar-home" style="height: 15vh;">
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
					<div class="card text-center container-fluid" style="background-color: #FF8484;" id="link_qmain">
						
					</div>
				</div>
				<div class="items2">
					<!-- คิวลิมิต 10 -->
					<div class="in-items" id="link_wrapper"></div>
				</div>
			</div>
			<div class="bottom-home" style="height: 5vh;">
				<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestias, porro.</p>
			</div>
		</div>
	</div>
	<script>
		function loadXMLDoc() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("link_wrapper").innerHTML =
						this.responseText;
				}
			};
			xhttp.open("GET", "<?php echo site_url('home/qnumber') ?>", true);
			xhttp.send();
		}

		function loadMainQueue() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("link_qmain").innerHTML =
						this.responseText;
				}
			};
			xhttp.open("GET", "<?php echo site_url('home/qmain') ?>", true);
			xhttp.send();
		}
		setInterval(function() {
			loadXMLDoc();
			loadMainQueue();
			// 1sec
		}, 1000);

		window.onload = loadXMLDoc;
	</script>
</body>

</html>