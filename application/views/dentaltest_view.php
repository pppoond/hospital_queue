<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>โรงพยาบาลเทศบาลนครอุดรธานี</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/dental2.css'); ?>">

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
                    <h1 style="font-weight: 600;">โรงพยาบาลเทศบาลนครอุดรธานี</h1>
                </div>
                <div style="text-align: center;">
                    <h1 style="font-weight: 600;">ทันตกรรม (Dental Division)</h1>
                    <div style="font-size: large;font-weight: 700;border: 3px solid white;border-radius: 12px;padding: 5px;background-color: Salmon;" id="timecurrent">
                    </div>
                </div>

            </div>
            <div class="body-home" style="height: 80vh;">
                <div class="items1">
                    <div class="in-items-main" id="link_page_main">
                        <div class="item-card">
                            <div class="card1">
                                <h1 style="padding: 0;margin: 0;font-weight: 600;">หมายเลข</h1>
                            </div>
                            <div class="card2">
                                <h1 style="padding: 0;margin: 0;font-weight: 600;">ห้อง</h1>
                            </div>
                        </div>
                        <!-- คิวหลัก -->
                        <div id="patient-queue-main">
                        </div>
                    </div>
                </div>
                <div class="items2">
                    <!-- คิวลิมิต 10 -->
                    <div class="in-items" id="link_wrapper"></div>
                </div>
            </div>
            <div class="bottom-home">
                เทคโนโลยีสารสนเทศ โรงพยาบาลเทศบาลนครอุดรธานี
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.24.0/axios.min.js" integrity="sha512-u9akINsQsAkG9xjc1cnGF4zw5TFDwkxuc9vUp5dltDWYCSmyd0meygbvgXrlc/z7/o4a19Fb5V0OUE58J7dcyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function loadXMLDoc() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("link_wrapper").innerHTML =
                        this.responseText;
                }
            };
            xhttp.open("GET", "<?php echo site_url('DentalTest/qnumber') ?>", true);
            xhttp.send();
        }

        function loadMainQueue() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("patient-queue-main").innerHTML =
                        this.responseText;
                }
            };
            xhttp.open("GET", "<?php echo site_url('DentalTest/dental_qmain') ?>", true);
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