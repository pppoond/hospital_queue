<?php
defined('BASEPATH') or exit('No direct script access allowed');

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>โรงพยาบาลเทศบาลนครอุดรธานี</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sidemenu.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/opd.css'); ?>">
    <link rel="icon" href="<?php echo base_url('assets/images/logo.png'); ?>">

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
                    <h1 style="font-weight: 600;"><?php if ($hsd_name != null)  echo $hsd_name;
                                                    else echo "อื่นๆ"; ?></h1>
                </div>
            </div>
            <div class="body-home" style="height: 80vh;">
                <div class="items1">
                    <div class="in-items-main" id="link_page_main">
                        <div class="item-card">
                            <div class="card1">
                                <h1 style="padding: 0;margin: 0;font-weight: 600;font-size: 60px;">หมายเลข</h1>
                            </div>
                            <div class="card2">
                                <h1 style="padding: 0;margin: 0;font-weight: 600;font-size: 60px;">จุดบริการ</h1>
                            </div>
                            <div class="card3">
                                <h1 style="padding: 0;margin: 0;font-weight: 600;font-size: 60px;">เวลา</h1>
                            </div>
                            <audio id="audio" src="<?php echo base_url('assets/sound/bell.wav'); ?>"></audio>
                        </div>

                        <!-- คิวหลัก -->
                        <div id="patient-queue-main">

                        </div>
                    </div>
                </div>
            </div>
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
                <button type="button" class="close" data-dismiss="modal">X</button>
            </div>
            <div class="modal-body">
                <select id="hsd_id_select" name="hsd_id_select" class="form-control">
                    <!-- <option value="Dental"> <?php echo "<p>{$item['name']}</p>"; ?></option> -->
                </select>
            </div>
            <div class="modal-footer">
                <a onclick="findBySpclty()" class="btn btn-primary">ยืนยันรายการ</a>
                <button type="button" class="btn btn-danger" data-dismiss="modal">ปิดหน้าต่าง</button>
            </div>
        </div>
    </div>

    <div class="wrapper" style="display: none;">
        <header>INSERT TEXT</header>
        <form>
            <div class="row">
                <textarea></textarea>
            </div>
            <div class="row">
                <label>Select Voice</label>
                <div class="outer">
                    <select id="voiceList"></select>
                </div>
            </div>
            <button id="speechBtn">Convert To Speech</button>
        </form>
    </div>

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="ml-4" style="color: white;">ตั้งค่า</div>
        <div class="custom-control custom-switch ml-4">
            <input type="checkbox" class="custom-control-input" id="customSwitch1">
            <label class="custom-control-label" for="customSwitch1" style="color: white;">แสดงชื่อตรงกลาง</label>
        </div>
        <div class="custom-control custom-switch ml-4">
            <input type="checkbox" class="custom-control-input" id="customSwitch2">
            <label class="custom-control-label" for="customSwitch2" style="color: white;">พูดชื่อ</label>
        </div>
        <div class="custom-control custom-switch ml-4">
            <input type="checkbox" class="custom-control-input" id="customSwitch3">
            <label class="custom-control-label" for="customSwitch3" style="color: white;">พูดซ้ำสองครั้ง</label>
        </div>
        <!-- <div class="ml-4" style="color: white;">
            Color 1: <input id="color1" value="#3399FF80" data-jscolor="{}">
        </div>
        <div class="ml-4" style="color: white;">
            Color 2: <input id="color2" value="#3399FF80" data-jscolor="{}">
        </div> -->
        <hr style="border-top: 3px solid #bbb;">
        <a type="button" onclick="getSpclty()" data-toggle="modal" data-target="#myModal" class="icon-hover">
            <i class="fas fa-users-cog fa-1x"></i> เลือกแผนก
        </a>
        <!-- <a type="button" class="icon-hover">
            <i class="fas fa-download"></i> ดาวน์โหลด
        </a> -->
        <p style="padding-left: 32px;color: white;">Lasted 2022/02/24</p>
    </div>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url('assets/js/jscolor.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bluebird/2.9.4/bluebird.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // const color1 = document.getElementById('color1');
        // const color2 = document.getElementById('color2');
        // const gcolor = document.querySelectorAll('.g-color');
        // color1.addEventListener("change", setColorItem);
        // color2.addEventListener("change", setColorItem);

        // function setColorItem() {
        //     console.log('Onchange Color.');
        //     var collection = document.getElementsByClassName('g-color');
        //     for (var i = 0; i < collection.length; ++i) {
        //         collection[i].style.background = "linear-gradient(-45deg, white, #3c86e7, #4d9191,  white)";
        //         collection[i].style.animation = "gradient 10s ease infinite";
        //     }
        //     // gcolor.style.background = "linear-gradient(-45deg, white, #3c86e7, #4d9191,  white)";
        // }
    </script>
    <script>
        const serverUrl = 'https://hospital.udoncity.go.th/hos_q/server';
        let data = {};
        let currentQueueTime = '';
        let queueList = [];
        let onShowPtname = false;
        let onTwoTimeSpeak = false;
        let onSpeakName = false;
        let dataQueueSpeak = {};

        const settingBtn = document.getElementById('setting-btn');
        const customSwitch1 = document.getElementById("customSwitch1");
        const customSwitch2 = document.getElementById("customSwitch2");
        const customSwitch3 = document.getElementById("customSwitch3");
        const spcltySelect = document.getElementById('hsd_id_select');
        const modal = document.getElementById("myModal");
        const textarea = document.querySelector("textarea");
        const voiceList = document.querySelector("#voiceList");
        const speechBtn = document.querySelector("#speechBtn");

        customSwitch1.addEventListener("click", updateSettingShowPtname);
        customSwitch2.addEventListener("click", updateSettingSpeakName);
        customSwitch3.addEventListener("click", updateSettingTwoTimeSpeak);

        let elem = document.documentElement;
        let myInterval = null;
        let timeToReload = 1;
        let dataDepart;

        /* Get the element you want displayed in fullscreen */

        function recheckScreen() {
            let maxHeight = window.screen.height,
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

        /* Function to open fullscreen mode */
        function openFullscreen() {
            if (elem.requestFullscreen) {
                elem.requestFullscreen();
            } else if (elem.mozRequestFullScreen) {
                /* Firefox */
                elem.mozRequestFullScreen();
            } else if (elem.webkitRequestFullscreen) {
                /* Chrome, Safari & Opera */
                elem.webkitRequestFullscreen();
            } else if (elem.msRequestFullscreen) {
                /* IE/Edge */
                elem = window.top.document.body; //To break out of frame in IE
                elem.msRequestFullscreen();
            }
        }

        /* Function to close fullscreen mode */
        function closeFullscreen() {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            } else if (document.msExitFullscreen) {
                window.top.document.msExitFullscreen();
            }
        }

        function checkSettingShowPtname() {
            let uri = serverUrl + '/api/settingShowPtname/get?hsd_id=<?php echo $hsd_id; ?>';
            axios.get(uri).then(function(response) {
                try {
                    let data = response.data;
                    console.log(data[0]['hqs_name']);
                    if (data != null) {
                        if (data[0]['hqs_status'] == "0") {
                            onShowPtname = false;
                            console.log('On false PTname');
                            customSwitch1.checked = false;
                            loadMainQueue();
                        } else {
                            onShowPtname = true;
                            console.log('On true PTname');
                            customSwitch1.checked = true;
                            loadMainQueue();
                        }
                    }
                } catch (error) {
                    console.log(error);
                }
            }).catch((err) => console.log(err));
        }

        function checkSettingSpeakName() {
            let uri = serverUrl + '/api/settingSpeakName/get?hsd_id=<?php echo $hsd_id; ?>';
            axios.get(uri).then(function(response) {
                try {
                    let data = response.data;
                    if (data != null) {
                        if (data[0]['hqs_status'] == "0") {
                            onSpeakName = false;
                            customSwitch2.checked = false;
                            console.log('On False Speak Name');
                        } else {
                            onSpeakName = true;
                            customSwitch2.checked = true;
                            console.log('On True Speak Name');
                        }
                    }
                } catch (error) {
                    console.log(error);
                }
            }).catch((err) => console.log(err));
        }

        function checkSettingTwoTimeSpeak() {
            let uri = serverUrl + '/api/settingTwoTimeSpeak/get?hsd_id=<?php echo $hsd_id; ?>';
            axios.get(uri).then(function(response) {
                try {
                    let data = response.data;
                    if (data != null) {
                        if (data[0]['hqs_status'] == "0") {
                            onTwoTimeSpeak = false;
                            customSwitch3.checked = false;
                        } else {
                            onTwoTimeSpeak = true;
                            customSwitch3.checked = true;
                        }
                    }
                } catch (error) {
                    console.log(error);
                }
            }).catch((err) => console.log(err));
        }

        function updateSettingShowPtname() {
            if (onShowPtname == true) {
                onShowPtname = false;
                let uri = serverUrl + '/api/settingShowPtname/update?hqs_status=0&hsd_id=<?php echo $hsd_id; ?>';
                axios.get(uri).then(function(response) {
                    try {
                        console.log('update ptstatus success');
                        loadMainQueue();
                    } catch (error) {
                        console.log(error);
                    }
                }).catch((err) => console.log(err));
            } else {
                onShowPtname = true;
                let uri = serverUrl + '/api/settingShowPtname/update?hqs_status=1&hsd_id=<?php echo $hsd_id; ?>';
                axios.get(uri).then(function(response) {
                    try {
                        console.log('update ptstatus success');
                        loadMainQueue();
                    } catch (error) {
                        console.log(error);
                    }
                }).catch((err) => console.log(err));
            }
        }

        function updateSettingSpeakName() {
            if (onSpeakName == true) {
                onSpeakName = false;
                let uri = serverUrl + '/api/settingSpeakName/update?hqs_status=0&hsd_id=<?php echo $hsd_id; ?>';
                axios.get(uri).then(function(response) {
                    try {
                        console.log('update settingSpeakName success');
                    } catch (error) {
                        console.log(error);
                    }
                }).catch((err) => console.log(err));
            } else {
                onSpeakName = true;
                let uri = serverUrl + '/api/settingSpeakName/update?hqs_status=1&hsd_id=<?php echo $hsd_id; ?>';
                axios.get(uri).then(function(response) {
                    try {
                        console.log('update settingSpeakName success');
                    } catch (error) {
                        console.log(error);
                    }
                }).catch((err) => console.log(err));
            }
        }

        function updateSettingTwoTimeSpeak() {
            if (onTwoTimeSpeak == true) {
                onTwoTimeSpeak = false;
                let uri = serverUrl + '/api/settingTwoTimeSpeak/update?hqs_status=0&hsd_id=<?php echo $hsd_id; ?>';
                axios.get(uri).then(function(response) {
                    try {
                        console.log('update twotimeseak success');
                    } catch (error) {
                        console.log(error);
                    }
                }).catch((err) => console.log(err));
            } else {
                onTwoTimeSpeak = true;
                let uri = serverUrl + '/api/settingTwoTimeSpeak/update?hqs_status=1&hsd_id=<?php echo $hsd_id; ?>';
                axios.get(uri).then(function(response) {
                    try {
                        console.log('update twotimeseak success');
                    } catch (error) {
                        console.log(error);
                    }
                }).catch((err) => console.log(err));
            }
        }

        async function checkSetting() {
            await checkSettingShowPtname();
            await checkSettingSpeakName();
            await checkSettingTwoTimeSpeak();
        }

        function onShowPtnameClick() {
            if (onShowPtname == true) {
                onShowPtname = false;

            } else {
                onShowPtname = true;
            }
            console.log(onShowPtname);
            loadMainQueue();
        }

        function convertTimestamp(timeStr) {
            let date = new Date(timeStr);
            let dateTime = date.getTime();
            return dateTime;
        }

        function findBySign_datetime(sign_datetime) {
            console.log('findBySign_datetime : ' + sign_datetime);
            let uri = serverUrl + '/api/findBySign_datetime?sign_datetime=' + sign_datetime;
            delete dataQueueSpeak[sign_datetime];
            return axios.get(uri).then(function(response) {
                try {
                    let data = response.data[0];
                    if (data != null) {
                        if (onSpeakName == true) {
                            textarea.innerText = `เชิญหมายเลข ${data.oqueue} คุณ${data.ptname} ที่ห้อง ${data.curdep_name} `;
                        } else {
                            textarea.innerText = `เชิญหมายเลข ${data.oqueue} ที่ห้อง ${data.curdep_name} `;
                        }
                        play(); //play sound
                    }
                } catch (error) {
                    console.log(error);
                }
            }).catch((err) => console.log(err));
        }

        function myLoop(i) {
            return Promise.delay(1000)
                .then(function() {
                    if (i > 0) {
                        console.log('Wait : ');
                        return myLoop(i -= 1);
                    }
                });
        }

        function queueListPlay(queue) {
            console.log('Oqueue : ' + queue.oqueue);
            var curdepName = queue.curdep_name;
            var positionPoint = "ห้อง";
            switch (queue.curdep_name) {
                case "ชำระเงินทันตกรรม":
                    curdepName = "ชำระเงินทันตระกรรม";
                    break;
                case "ตรวจทันตกรรม 1":
                    curdepName = "ตรวจทันตระกรรม 1";
                    break;
                case "ตรวจทันตกรรม 2":
                    curdepName = "ตรวจทันตระกรรม 2";
                    break;
                case "ตรวจทันตกรรม 3":
                    curdepName = "ตรวจทันตระกรรม 3";
                    break;
                case "ตรวจทันตกรรม 4":
                    curdepName = "ตรวจทันตระกรรม 4";
                    break;

                case "ซักประวัติ 1":
                    positionPoint = "โต๊ะ";
                    break;
                case "ซักประวัติ 2":
                    positionPoint = "โต๊ะ";
                    break;
                case "ซักประวัติ 3":
                    positionPoint = "โต๊ะ";
                    break;
                case "ซักประวัติ 4":
                    positionPoint = "โต๊ะ";
                    break;
                case "ซักประวัติ 5":
                    positionPoint = "โต๊ะ";
                    break;
                case "ซักประวัติ 6":
                    positionPoint = "โต๊ะ";
                    break;

                default:
                    break;
            }

            if (onSpeakName == true) {
                textarea.innerText = `เชิญหมายเลข ${queue.oqueue} คุณ${queue.ptname} ที่${positionPoint} ${curdepName} `;
            } else {
                textarea.innerText = `เชิญหมายเลข ${queue.oqueue} ที่${positionPoint} ${curdepName} `;
            }
            console.log('bf play.');
            play();
            console.log('af play.');
        }

        function waitToSpeakQueue() {
            let uri = serverUrl + '/api/request_queue_by_hsd/<?php echo $hsd_id; ?>';
            axios.get(uri).then(async function(response) {
                try {
                    let data = response.data;
                    if (data != null) {
                        data.forEach(element => {
                            console.log(element.sign_datetime);
                            console.log(currentQueueTime);
                            // ถ้า เวลา มากกว่า  Q ปัจจุบัน
                            if (moment(element.sign_datetime).format('YYYY-MM-DD HH:mm:ss') > moment(currentQueueTime).format('YYYY-MM-DD HH:mm:ss')) {
                                queueList.push(element);
                                console.log('add Data');
                            } else {
                                console.log('No add Data');
                            }
                        });

                        if (queueList.length > 0) {
                            let secondTime = Math.ceil(textarea.value.length / 5);
                            let lengthQueue = queueList.length;
                            console.log('dataQueueSpeak length : ' + lengthQueue);
                            let arrLoop = [1, 2, 3, 4];
                            switch (queueList.length) {
                                case 1:
                                    console.log('Case 1');

                                    await queueListPlay(queueList[0]);
                                    secondTime = Math.ceil(textarea.value.length / 5);
                                    await myLoop(secondTime);
                                    break;

                                case 2:
                                    console.log('Case 2');

                                    console.log('Round 1');
                                    await queueListPlay(queueList[1]);
                                    secondTime = Math.ceil(textarea.value.length / 5);
                                    await myLoop(secondTime);

                                    console.log('Round 2');
                                    await queueListPlay(queueList[0]);
                                    secondTime = Math.ceil(textarea.value.length / 5);
                                    await myLoop(secondTime);
                                    break;

                                case 3:
                                    console.log('Case 3');

                                    console.log('Round 1');
                                    await queueListPlay(queueList[2]);
                                    secondTime = Math.ceil(textarea.value.length / 5);
                                    await myLoop(secondTime);

                                    console.log('Round 2');
                                    await queueListPlay(queueList[1]);
                                    secondTime = Math.ceil(textarea.value.length / 5);
                                    await myLoop(secondTime);

                                    console.log('Round 3');
                                    await queueListPlay(queueList[0]);
                                    secondTime = Math.ceil(textarea.value.length / 5);
                                    await myLoop(secondTime);
                                    break;

                                case 4:
                                    console.log('Case 4');

                                    console.log('Round 1');
                                    await queueListPlay(queueList[3]);
                                    secondTime = Math.ceil(textarea.value.length / 5);
                                    await myLoop(secondTime);

                                    console.log('Round 2');
                                    await queueListPlay(queueList[2]);
                                    secondTime = Math.ceil(textarea.value.length / 5);
                                    await myLoop(secondTime);

                                    console.log('Round 3');
                                    await queueListPlay(queueList[1]);
                                    secondTime = Math.ceil(textarea.value.length / 5);
                                    await myLoop(secondTime);

                                    console.log('Round 4');
                                    await queueListPlay(queueList[0]);
                                    secondTime = Math.ceil(textarea.value.length / 5);
                                    await myLoop(secondTime);
                                    break;

                                default:
                                    console.log('Case 5');

                                    console.log('Round 1');
                                    await queueListPlay(queueList[4]);
                                    secondTime = Math.ceil(textarea.value.length / 5);
                                    await myLoop(secondTime);

                                    console.log('Round 2');
                                    await queueListPlay(queueList[3]);
                                    secondTime = Math.ceil(textarea.value.length / 5);
                                    await myLoop(secondTime);

                                    console.log('Round 3');
                                    await queueListPlay(queueList[2]);
                                    secondTime = Math.ceil(textarea.value.length / 5);
                                    await myLoop(secondTime);

                                    console.log('Round 4');
                                    await queueListPlay(queueList[1]);
                                    secondTime = Math.ceil(textarea.value.length / 5);
                                    await myLoop(secondTime);

                                    console.log('Round 5');
                                    await queueListPlay(queueList[0]);
                                    secondTime = Math.ceil(textarea.value.length / 5);
                                    await myLoop(secondTime);
                                    break;
                            }

                            queueList = [];

                            runTimeout();
                        } else {
                            console.log('Queue is zero.');
                            runTimeout();
                        }
                        currentQueueTime = response.data[0]['sign_datetime'];
                        localStorage.setItem("currentQueueTime", currentQueueTime); //set Local Storage

                    } else {
                        runTimeout();
                    }
                } catch (error) {
                    console.log(error);
                }
            }).catch((err) => console.log(err));
        }

        async function loadMainQueue() {
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("patient-queue-main").innerHTML =
                        this.responseText;
                }
            };
            //Show ptname Center screen
            if (onShowPtname == true) {
                xhttp.open("GET", "<?php echo site_url('Hsd/qmain2/') . $hsd_id; ?>", true);
            } else {
                xhttp.open("GET", "<?php echo site_url('Hsd/qmain/') . $hsd_id; ?>", true);
            }
            xhttp.send();
            return;
        }

        async function checkDataSpeech() {
            let uri = serverUrl + '/api/request_queue_by_hsd/<?php echo $hsd_id; ?>';
            axios.get(uri).then(function(response) {
                try {
                    let data = response.data[0];
                    if (data != null) {
                        if (onSpeakName == true) {
                            var curdepName = data.curdep_name;
                            switch (data.curdep_name) {
                                case "ชำระเงินทันตกรรม":
                                    curdepName = "ชำระเงินทันตระกรรม";
                                    break;
                                case "ตรวจทันตกรรม 1":
                                    curdepName = "ตรวจทันตระกรรม 1";
                                    break;
                                case "ตรวจทันตกรรม 2":
                                    curdepName = "ตรวจทันตระกรรม 2";
                                    break;
                                case "ตรวจทันตกรรม 3":
                                    curdepName = "ตรวจทันตระกรรม 3";
                                    break;
                                case "ตรวจทันตกรรม 4":
                                    curdepName = "ตรวจทันตระกรรม 4";
                                    break;

                                default:
                                    break;
                            }
                            textarea.innerText = `เชิญหมายเลข ${data.oqueue} คุณ${data.ptname} ที่ห้อง ${curdepName} `;
                        } else {
                            textarea.innerText = `เชิญหมายเลข ${data.oqueue} ที่ห้อง ${curdepName} `;
                        }
                        play(); //play sound
                    }

                } catch (error) {
                    console.log(error);
                }
            }).catch((err) => console.log(err));
            return;
        }

        function myAwaitFunction1() {
            return loadMainQueue();
        }

        function myAwaitFunction2() {
            return checkDataSpeech();
        }

        async function firstCheckDataSpeech() {
            let uri = serverUrl + '/api/request_queue_by_hsd/<?php echo $hsd_id; ?>';
            axios.get(uri).then(function(response) {
                try {
                    let data = response.data[0];
                    if (data != null) {
                        var curdepName = data.curdep_name;
                        var positionPoint = "ห้อง";
                        switch (data.curdep_name) {
                            case "ชำระเงินทันตกรรม":
                                curdepName = "ชำระเงินทันตระกรรม";
                                break;
                            case "ตรวจทันตกรรม 1":
                                curdepName = "ตรวจทันตระกรรม 1";
                                break;
                            case "ตรวจทันตกรรม 2":
                                curdepName = "ตรวจทันตระกรรม 2";
                                break;
                            case "ตรวจทันตกรรม 3":
                                curdepName = "ตรวจทันตระกรรม 3";
                                break;
                            case "ตรวจทันตกรรม 4":
                                curdepName = "ตรวจทันตระกรรม 4";
                                break;

                            case "ซักประวัติ 1":
                                positionPoint = "โต๊ะ";
                                break;
                            case "ซักประวัติ 2":
                                positionPoint = "โต๊ะ";
                                break;
                            case "ซักประวัติ 3":
                                positionPoint = "โต๊ะ";
                                break;
                            case "ซักประวัติ 4":
                                positionPoint = "โต๊ะ";
                                break;
                            case "ซักประวัติ 5":
                                positionPoint = "โต๊ะ";
                                break;
                            case "ซักประวัติ 6":
                                positionPoint = "โต๊ะ";
                                break;

                            default:
                                break;
                        }
                        if (onSpeakName == true) {
                            textarea.innerText = `เชิญหมายเลข ${data.oqueue} คุณ${data.ptname} ที่${positionPoint} ${curdepName} `;
                        } else {
                            textarea.innerText = `เชิญหมายเลข ${data.oqueue} ที่${positionPoint} ${curdepName} `;
                        }
                    }
                } catch (error) {
                    console.log(error);
                }
            }).catch((err) => console.log(err));
            return;
        }



        // setInterval(function() {
        //     // timeRefresh();
        //     // 1sec
        //     window.location.href = window.location.href;
        // }, 300000);

        // check new data
        function checkDataByTime() {
            myStop(); //stop time
            let uri = serverUrl + '/api/request_queue_by_hsd/<?php echo $hsd_id; ?>';
            axios.get(uri).then(async function(response) {
                if (response.data[0] != null) {
                    if (currentQueueTime != null) {
                        if (response.data[0] != null) {
                            if (response.data[0]['sign_datetime'] != currentQueueTime) {
                                try {
                                    console.log('New Data');
                                    // currentQueueTime = response.data[0]['sign_datetime'];
                                    // localStorage.setItem("currentQueueTime", currentQueueTime); //set Local Storage
                                    await myAwaitFunction1();
                                    // await myAwaitFunction2();
                                    await waitToSpeakQueue();
                                } catch (error) {
                                    console.log(error);
                                }
                            } else {
                                myStart(); //start time
                                // nothing
                                console.log('Nothing');
                            }
                        } else {
                            myStart();
                        }
                    } else {
                        if (localStorage.getItem("currentQueueTime") != null) {
                            let localStorageTime = localStorage.getItem("currentQueueTime");
                            currentQueueTime = localStorageTime;
                            myStart();
                        } else {
                            let now = new Date();
                            // let dateString = moment(now).format('YYYY-MM-DD');
                            let dateStringWithTime = moment(now).format('YYYY-MM-DD HH:mm:ss');
                            let timeStamp = dateStringWithTime;
                            currentQueueTime = timeStamp;
                            myStart();
                        }
                    }
                } else {
                    //ถ้าไม่มีข้อมูลวันนี้ ให้เพิ่ม คิว 0 
                    let uri = serverUrl + '/api/firstTimeOnCurrentDate?hsd_id=<?php echo $hsd_id; ?>';
                    await axios.get(uri).then(function(response) {
                        console.log(response.data);
                    }).catch((err) => console.log(err));
                    myStart();
                }
            }).catch((err) => {
                console.log(err)
                alertError(err);
            });
            return;
        }

        function myStart() {
            myInterval = setInterval(function() {
                timeToReload++;
                if (timeToReload == 300) {
                    window.location.href = "<?php echo base_url('PointCenter/') . $hsd_id; ?>";
                } else {
                    checkDataByTime();
                }
            }, 1000);
        }

        function myStop() {
            clearInterval(myInterval);
        }

        function play() {
            let audio = document.getElementById("audio");
            if (textarea.value !== "") {
                if (!synth.speaking) {
                    textToSpeech(textarea.value);
                }
                if (textarea.value.length > 80) {
                    setInterval(() => {
                        if (!synth.speaking && !isSpeaking) {
                            isSpeaking = true;
                            speechBtn.innerText = "Convert To Speech";
                        } else {}
                    }, 500);
                    if (isSpeaking) {
                        synth.resume();
                        isSpeaking = false;
                        speechBtn.innerText = "Pause Speech";
                    } else {
                        synth.pause();
                        isSpeaking = true;
                        speechBtn.innerText = "Resume Speech";
                    }
                } else {
                    speechBtn.innerText = "Convert To Speech";
                }
            }

        }



        function getSpclty() {
            dataDepart = [];
            spcltySelect.innerHTML = `<option>Loading...</option>`;
            let html;
            let uri = '<?php echo site_url('Api/hsd_sum_d'); ?>';

            //axios เป็น library สำหรับ ดึงข้อมูล api
            axios.get(uri).then(function(response) {
                html = ``;

                //foreach ลูป ข้อมูลจาก json array มาเก็บใส่ html และ data (เก็บไว้ก่อน ยังไม่ได้ใช้อะไร)
                response.data.forEach(element => {
                    html += `<option value="${element.hsd_id}">${element.hsd_name}</option>`;
                    dataDepart.push(element); //push ข้อมูลเข้า array
                });
                spcltySelect.innerHTML = html;
            }).catch((err) => console.log(err));
        }

        function findBySpclty() {
            let hsdSelectValue = document.getElementById('hsd_id_select');
            window.location.href = "<?php echo base_url('PointCenter/') ?>" + hsdSelectValue.value;
            // console.log(hsdSelectValue.value);
        }



        let synth = speechSynthesis,
            isSpeaking = true;

        function voices() {
            for (let voice of synth.getVoices()) {
                // let selected = voice.name === "Google US English" ? "selected" : "";
                let selected = voice.name === "Microsoft Pattara - Thai (Thailand)" ? "selected" : "";
                let option = `<option value="${voice.name}" ${selected}>${voice.name} (${voice.lang})</option>`;
                voiceList.insertAdjacentHTML("beforeend", option);
            }
        }
        synth.addEventListener("voiceschanged", voices);

        function runTimeout() {
            setTimeout(myStart, 3000);
        }

        function textToSpeech(text) {
            let utterance = new SpeechSynthesisUtterance(text);
            for (let voice of synth.getVoices()) {
                if (voice.name === voiceList.value) {
                    utterance.voice = voice;
                }
            }
            utterance.rate = 0.65;
            if (onTwoTimeSpeak == true) {
                synth.speak(utterance);
                setTimeout(function() {}, 5000);
                // await myLoop(5);
            }
            synth.speak(utterance);
            // setTimeout(function() {}, 6000);
            // runTimeout();
            // const myTimeout = setTimeout(myStart, 5000);
            // myStart();
        }

        function alertError(message) {
            let timerInterval;
            Swal.fire({
                icon: 'warning',
                title: 'Network error!',
                html: '<span>' + message + "</span><br><b style='color: #ff0000'>Network Connecting...</b>",
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(async () => {
                        var isConnected = await isInternetConnected();
                        if (isConnected == true) {
                            clearInterval(timerInterval);
                            const b = Swal.getHtmlContainer().querySelector('b');
                            const span = Swal.getHtmlContainer().querySelector('span');
                            b.innerText = `Network Connected.`;
                            b.style.color = "#1DB717";
                            span.innerText = `Will reload in 5 second.`;
                            setTimeout(() => {
                                window.location.href = "<?php echo base_url('PointCenter/') . $hsd_id; ?>";
                            }, 5000);
                        }
                    }, 1000)
                },
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            });
        }

        function isInternetConnected() {
            return navigator.onLine;
        }

        speechBtn.addEventListener("click", e => {
            e.preventDefault();
            if (textarea.value !== "") {
                if (!synth.speaking) {
                    textToSpeech(textarea.value);
                }
                if (textarea.value.length > 80) {
                    setInterval(() => {
                        if (!synth.speaking && !isSpeaking) {
                            isSpeaking = true;
                            speechBtn.innerText = "Convert To Speech";
                        } else {}
                    }, 500);
                    if (isSpeaking) {
                        synth.resume();
                        isSpeaking = false;
                        speechBtn.innerText = "Pause Speech";
                    } else {
                        synth.pause();
                        isSpeaking = true;
                        speechBtn.innerText = "Resume Speech";
                    }
                } else {
                    speechBtn.innerText = "Convert To Speech";
                }
            }
        });

        //กด keyboard จะเข้าฟังชั่น
        document.onkeydown = function(event) {
            if (event.keyCode == "90") {
                play();
            } else if (event.keyCode == "27") {
                // closeFullscreen();
                // alert("sdasdasd");
            }
        }

        //fullscreen to hide setting btns
        window.onresize = function(event) {
            recheckScreen();
        }

        // --------------------Modal-----------------------
        // Get the modal
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }



        voices();
        recheckScreen();
        loadMainQueue();
        firstCheckDataSpeech();
        myStart();
        checkSetting();
    </script>
</body>

</html>