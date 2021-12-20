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

            <div class="navbar-home" style="height: 15vh;">
                <div class="navbar-items">
                    <img src="<?php echo base_url('assets/images/logo.png'); ?>" width="75px">
                    <div style="width: 16px;"></div>
                    <h1 style="font-weight: 600;">โรงพยาบาลเทศบาลนครอุดรธานี</h1>
                </div>
                <div style="text-align: center;">
                    <h1 style="font-weight: 600;">Spclty</h1>
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
                            <div class="card3">
                                <h1 style="padding: 0;margin: 0;font-weight: 600;">เวลาที่เรียกคิว</h1>
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

    <div class="wrapper">
        <header>INSERT TEXT</header>
        <form>
            <div class="row">
                <?php
                $url = 'http://localhost/ci/api_speech/speechapi';
                $content = file_get_contents($url);
                $json = json_decode($content, true);
                foreach ($json as $item) {
                ?>
                    <textarea><?php echo "เชิญหมายเลข{$item['oqueue']}ที่ห้อง{$item['curdep_name']} "; ?></textarea>
            </div>
            <!-- <form action="#">
            <div class="row">
                <label>Enter Text</label>
                <textarea></textarea>
            </div> -->
            <div class="row">
                <label>Select Voice</label>
                <div class="outer">
                    <select id="voiceList"></select>
                </div>
            </div>
            <!-- </form> -->
            <button id="speechBtn">Convert To Speech</button>
        </form>
    </div>
<?php } ?>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.0/dist/sweetalert2.all.min.js"></script>
<script>
    var data = {};
    var currentQueueTime;

    settingBtn = document.getElementById('setting-btn');


    //กด keyboard จะเข้าฟังชั่น
    document.onkeydown = function(event) {
        if (event.keyCode == "90") {
            play();
        }
    }

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

    async function play() {
        var audio = document.getElementById("audio");
        // audio.play();
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



    const textarea = document.querySelector("textarea"),
        voiceList = document.querySelector("#voiceList"),
        speechBtn = document.querySelector("#speechBtn");
    let synth = speechSynthesis,
        isSpeaking = true;
    voices();

    function voices() {
        for (let voice of synth.getVoices()) {
            // let selected = voice.name === "Google US English" ? "selected" : "";
            let selected = voice.name === "Microsoft Pattara - Thai (Thailand)" ? "selected" : "";
            let option = `<option value="${voice.name}" ${selected}>${voice.name} (${voice.lang})</option>`;
            voiceList.insertAdjacentHTML("beforeend", option);
        }
    }
    synth.addEventListener("voiceschanged", voices);

    function textToSpeech(text) {
        let utterance = new SpeechSynthesisUtterance(text);
        for (let voice of synth.getVoices()) {
            if (voice.name === voiceList.value) {
                utterance.voice = voice;
            }
        }
        synth.speak(utterance);
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

    async function checkDataSpeech() {
        var uri = '<?php echo site_url('Api_speech/speechapi') ?>';
        axios.get(uri).then(function(response) {
            try {
                var data = response.data[0];
                textarea.innerText = `เชิญหมายเลข${data.oqueue} ที่ห้อง ${data.curdep_name} `;
                play();
            } catch (error) {
                console.log(error);
            }
        }).catch((err) => console.log(err));
    }
</script>
</body>

</html>