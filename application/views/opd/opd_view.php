<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>โรงพยาบาลเทศบาลนครอุดรธานี</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/opd.css'); ?>">
</head>

<body>
    <div class="container-main">

        <div class="container-home">
            <?php $this->load->view('includes/header'); ?>
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
                                <h1 style="padding: 0;margin: 0;font-weight: 600;">เวลาที่เรียกคิว</h1>
                            </div>
                        </div>

                        <!-- คิวหลัก -->
                        <div id="patient-queue-main">

                        </div>
                    </div>
                </div>

            </div>
            <!-- <button type="button" onclick="showAlert()" class="btn btn-primary" id="test">Click me</button> -->
            <?php $this->load->view('includes/footer'); ?>
        </div>
    </div>
    <!-- Trigger/Open The Modal -->
    <!-- <button id="ButtonDep">เลือกรายการ</button> -->

    <!-- The Modal -->
    <div id="myModal" class="modal" data-backdrop="false">
        <!-- Modal content -->
        <div class="modal-content col-4">
            <div class="modal-header">
                <h4 class="modal-title">กรุณาเลือกแผนก</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <select id="dep_select" name="dep_select" class="form-control">
                    <!-- <option value="Dental"> <?php echo "<p>{$item['name']}</p>"; ?></option> -->
                </select>
            </div>
            <div class="modal-footer">
                <a onclick="findBySpclty()" class="btn btn-primary">ยืนยันรายการ</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">ปิดหน้าต่าง</button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>
    <script>
        var data = {};

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
            loadMainQueue();
            timeRefresh();
            // 1sec
        }, 1000);

        function checkDataByTime() {

        }

        async function showAlert2() {
            Swal.fire({
                title: 'asdasd',
                input: 'select',
                inputOptions: data,
                inputPlaceholder: 'required',
                showCancelButton: true,
                inputValidator: function(value) {
                    return new Promise(function(resolve, reject) {
                        if (value !== '') {
                            resolve();
                        } else {
                            reject('You need to select a Tier');
                        }
                    });
                }
            }).then(function(result) {
                swal({
                    type: 'success',
                    html: 'You selected: ' + result
                });
            });
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