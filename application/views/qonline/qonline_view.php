<?php

/**
 * Dashboard Page
 * 
 * @link https://appzstory.dev
 * @author Yothin Sapsamran (Jame AppzStory Studio)
 */

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>จองคิวโรงพยาบาลเทศบาลนครอุดรธานี</title>
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/images/favicon.ico">
    <!-- stylesheet -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/queueOnline.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/adminlte.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/qonline.css'); ?>">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php $this->load->view('includes/slidebar.php'); ?>
        <div class="content-wrapper pt-3">
            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info shadow">
                                <div class="inner text-center">
                                    <h1 class="py-3">&nbsp;คิวปัจจุบัน&nbsp;</h1>
                                </div>
                                <a href="../manager/" class="small-box-footer py-3"> คลิกเพื่อเข้า <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-primary shadow">
                                <div class="inner text-center">
                                    <h1 class="py-3">จองคิวออนไลน์</h1>
                                </div>
                                <a href="../members/" class="small-box-footer py-3"> คลิกเพื่อเข้า <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success shadow">
                                <div class="inner text-center">
                                    <h1 class="py-3">ตรวจสอบคิว</h1>
                                </div>
                                <a href="../products/" class="small-box-footer py-3"> คลิกเพื่อเข้า <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-danger shadow">
                                <div class="inner text-center">
                                    <h1 class="py-3">___</h1>
                                </div>
                                <a href="../orders/" class="small-box-footer py-3"> คลิกเพื่อเข้า <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="d-flex">
                                        <p class="d-flex flex-column">
                                            <span class="text-bold text-xl" id="salesReport"></span>
                                            <span class="text-danger" id="salesTextReport"></span>
                                        </p>
                                        <p class="ml-auto flex-row" id="salesbtn">
                                            <button class="btn btn-secondary m-1 d-block d-md-inline ml-auto" onclick="selectReport('report-month.php', this, 'line')">อายุรกรรม</button>
                                            <button class="btn btn-outline-secondary m-1 d-block d-md-inline ml-auto" onclick="selectReport('report-sixmonths.php', this, 'bar')">ทันตกรรม</button>
                                            <button class="btn btn-outline-secondary m-1 d-block d-md-inline ml-auto" onclick="selectReport('report-twelvemonths.php', this, 'bar')">กายภาพ</button>
                                            <button class="btn btn-outline-secondary m-1 d-block d-md-inline ml-auto" onclick="selectReport('report-year.php', this, 'bar')">ห้องไต</button>
                                        </p>
                                    </div>
                                    <div class="position-relative">
                                        <!-- <canvas id="visitors-chart" height="350"></canvas> -->



                                        <!-- <div class="container-main">

                                            <div class="container-home">
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
                                                                <div class="card3">
                                                                    <h1 style="padding: 0;margin: 0;font-weight: 600;">เวลาที่เรียก</h1>
                                                                </div>
                                                            </div>

                                                            <!-- คิวหลัก -->
                                        <!-- <div id="patient-queue-main">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div> -->



                                        <!-- Trigger/Open The Modal -->
                                        <!-- <button id="ButtonDep">เลือกรายการ</button> -->

                                        <!-- The Modal -->
                                        <div id="myModal" class="modal" data-backdrop="false">
                                            <!-- Modal content -->
                                            <div class="modal-content col-4">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">กรุณาเลือกแผนก</h4>
                                                    <button type="button" class="close" data-dismiss="modal">X</button>
                                                </div>
                                                <div class="modal-body">
                                                    <select id="dep_select" name="dep_select" class="form-control">
                                                        <!-- <option value="Dental"> <?php echo "<p>{$item['name']}</p>"; ?></option> -->
                                                    </select>
                                                </div>
                                                <div class="modal-footer">
                                                    <a onclick="play()" class="btn btn-primary">ยืนยันรายการ</a>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">ปิดหน้าต่าง</button>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <?php include_once('../includes/footer.php') ?> -->
    </div>


    <!-- SCRIPTS -->
    <script src="assets/js/adminlte.js"></script>

    <script>
        var data = {};
        var currentQueueTime;

        settingBtn = document.getElementById('setting-btn');




        window.onresize = function(event) {
            var maxHeight = window.screen.height,
                maxWidth = window.screen.width,
                curHeight = window.innerHeight,
                curWidth = window.innerWidth;

            if (maxWidth == curWidth && maxHeight == curHeight) {
                console.log('F11');

                settingBtn.style.display = "none";
            } else {
                settingBtn.style.display = "flex";
            }
        }

        function loadMainQueue() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("patient-queue-main").innerHTML =
                        this.responseText;
                }
            };
            xhttp.open("GET", "<?php echo site_url('Opd/dental_qmain') ?>", true);
            xhttp.send();
        }

        loadMainQueue();



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
            timeRefresh();
            // 1sec
        }, 500);

        setInterval(function() {
            checkDataByTime();
        }, 2000);

        // check new data
        async function checkDataByTime() {
            var uri = '<?php echo site_url('Api/ovst/') ?>';
            axios.get(uri).then(function(response) {
                if (currentQueueTime != null) {
                    if (response.data[0]['sign_datetime'] != currentQueueTime) {
                        try {
                            console.log('New Data');
                            currentQueueTime = response.data[0]['sign_datetime'];
                            checkDataSpeech();
                            loadMainQueue();
                        } catch (error) {
                            console.log(error);
                        }
                    } else {
                        // nothing
                        console.log('Nothing');
                    }
                } else {
                    currentQueueTime = response.data[0]['sign_datetime'];
                }
            }).catch((err) => console.log(err));
        }



        var data;

        var spcltySelect = document.getElementById('dep_select');

        async function getSpclty() {
            data = [];
            var html;
            var uri = '<?php echo site_url('Api/spclty') ?>';

            //axios เป็น library สำหรับ ดึงข้อมูล api
            axios.get(uri).then(function(response) {
                html = ``;

                //foreach ลูป ข้อมูลจาก json array มาเก็บใส่ html และ data (เก็บไว้ก่อน ยังไม่ได้ใช้อะไร)
                response.data.forEach(element => {
                    html += `<option value="${element.spclty}">${element.name} ${element.spname == null ? '' : '(' + element.spname + ')'}</option>`;
                    data.push(element); //push ข้อมูลเข้า array
                });
                spcltySelect.innerHTML = html;
            }).catch((err) => console.log(err));
        }

        function findBySpclty() {
            var spcltySelectValue = document.getElementById('dep_select');
            window.location.href = "Department/" + spcltySelectValue.value;
            // console.log(spcltySelectValue.value);
        }

        // --------------------Modal-----------------------

        // Get the modal
        var modal = document.getElementById("myModal");

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

</body>

</html>