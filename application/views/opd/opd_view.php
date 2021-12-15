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

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Modal Heading</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        Modal body..
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Open modal
    </button>
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


        // Get the modal
        // var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        // var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        // var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        // btn.onclick = function() {
        //     modal.style.display = "block";
        // }

        // When the user clicks on <span> (x), close the modal
        // span.onclick = function() {
        //     modal.style.display = "none";
        // }

        // When the user clicks anywhere outside of the modal, close it
        // window.onclick = function(event) {
        //     if (event.target == modal) {
        //         modal.style.display = "none";
        //     }
        // }

        async function showAlert() {

            var data;

            var uri = '<?php echo site_url('Api/spclty') ?>';

            axios.get(uri).then(function(response) {
                // showData.innerHTML = response.data;
                console.log(response.data);

            }).catch((err) => console.log(err));

            var data = {
                '1': 'สองโหล',
                '2': 'สามโหล'
            };
            Swal.fire({
                title: 'Select Outage Tier',
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
                showAlert2();
            });
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
    </script>
</body>

</html>