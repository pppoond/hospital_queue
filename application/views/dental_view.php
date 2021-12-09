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
			<div class="navbar-home" style="height: 15vh;">
				<div class="navbar-items">
					<img src="<?php echo base_url('assets/images/logo.png'); ?>" width="75px">
					<div style="width: 16px;"></div>
					<h1 style="color: white;font-weight: 400;">โรงพยาบาลเทศบาลนครอุดรธานี</h1>
				</div>


				<?php
				// date_default_timezone_set("Asia/Bangkok");
				// function DateThai($strDate)
				// {
				// 	$strYear = date("Y", strtotime($strDate)) + 543;
				// 	$strMonth = date("n", strtotime($strDate));
				// 	$strDay = date("j", strtotime($strDate));
				// 	$strHour = date("H", strtotime($strDate));
				// 	$strMinute = date("i", strtotime($strDate));
				// 	$strSeconds = date("s", strtotime($strDate));
				// 	$strMonthCut = array("", "ม.ค.", "ก.พ.", "มี.ค.", "เม.ย.", "พ.ค.", "มิ.ย.", "ก.ค.", "ส.ค.", "ก.ย.", "ต.ค.", "พ.ย.", "ธ.ค.");
				// 	$strMonthThai = $strMonthCut[$strMonth];
				// 	return "$strDay $strMonthThai $strYear";
				// }

				// $strDate = date("h:i");
				?>


				<div style="text-align: center;">
					<h1 style="color: white;font-weight: 400;">ทันตกรรม (Dental Division)</h1>
					<div style="color: white;font-size: large;font-weight: 700;border: 3px solid white;border-radius: 12px;padding: 5px;background-color: Salmon;" id="timecurrent">
					</div>
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
				<p>xxxxxxxxxx</p>
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
			xhttp.open("GET", "<?php echo site_url('Dental/qnumber') ?>", true);
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
			xhttp.open("GET", "<?php echo site_url('Dental/qmain') ?>", true);
			xhttp.send();
		}

		function timeRefresh() {
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("timecurrent").innerHTML =
						this.responseText;
				}
			};
			xhttp.open("GET", "<?php echo site_url('Dental/timecurrent') ?>", true);
			xhttp.send();
		};



		setInterval(function() {
			loadXMLDoc();
			loadMainQueue();
			timeRefresh();
			// 1sec
		}, 1000);

		window.onload = loadXMLDoc;
	</script>
</body>

</html>