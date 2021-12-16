<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Text To Speech in JavaScript </title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/speech.css'); ?>">

    <script type='text/javascript' src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>

</head>

<body>
    <div class="wrapper">
        <header>INSERT TEXT</header>
        <!-- <form action="#">
            <div class="row">


                <?php
                $url = 'http://localhost/hospital_queue/api_speech/speechapi';;
                $content = file_get_contents($url);
                $json = json_decode($content, true);

                foreach ($json as $item) {
                ?>

                    <textarea>   <?php echo "เชิญหมายเลข{$item['oqueue']}ที่ห้อง{$item['curdep_name']}ครับ"; ?>   </textarea>
            </div> -->

        <form action="#">
            <div class="row">
                <label>Enter Text</label>
                <textarea></textarea>
            </div>
            <div class="row">
                <label>Select Voice</label>
                <div class="outer">
                    <select></select>
                </div>
            </div>
            <button>Convert To Speech</button>
            <!-- </form> -->



        </form>
    </div>


<?php } ?>


<script>
    const textarea = document.querySelector("textarea"),
        voiceList = document.querySelector("select"),
        speechBtn = document.querySelector("button");
    let synth = speechSynthesis,
        isSpeaking = true;
    voices();

    function voices() {
        for (let voice of synth.getVoices()) {
            let selected = voice.name === "Google US English" ? "selected" : "";
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
</script>


</body>

</html>