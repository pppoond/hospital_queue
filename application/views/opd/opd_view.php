<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>โรงพยาบาลเทศบาลนครอุดรธานี</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/opd.css'); ?>">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

            <!-- Trigger/Open The Modal
            <button id="myBtn">Open Modal</button> -->

            <button type="button" onclick="showAlert()" class="btn btn-primary" id="depButton">เปลี่ยนแผนก</button>

            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <span class="close">&times;</span>

                    <p>Some text in the Modal..</p>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div> -->

            <?php $this->load->view('includes/footer'); ?>
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
            xhttp.open("GET", "<?php echo site_url('Opd/qnumber') ?>", true);
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
            loadXMLDoc();
            loadMainQueue();
            timeRefresh();
            // 1sec
        }, 1000);

        window.onload = loadXMLDoc;


        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        function showAlert() {
            Swal.fire({
                title: 'เลือกแผนก',
                input: 'select',
                inputOptions: {
                    '1': 'ทันตกรรม Dental',
                    '2': 'อายุรกรรม OPD',
                    '3': 'ห้องตรวจทั่วไป',
                    '4': 'กายภาพบำบัด'

                },
                inputPlaceholder: 'กรุณาเลือกแผนก',
                showCancelButton: true,
                inputValidator: function(value) {
                    return new Promise(function(resolve, reject) {
                        if (value !== '') {
                            resolve();
                        } else {
                            reject('กรุณาเลือกแผนก');
                        }
                    });
                }
            }).then(function(result) {
                swal({
                    type: 'success',
                    html: 'คุณได้เลือก: ' + result.value
                });

            });
        }
    </script>
</body>

</html>