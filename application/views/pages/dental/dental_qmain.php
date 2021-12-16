<?php
$url = 'http://localhost/hospital_queue/api_speech/speechapi';;
$content = file_get_contents($url);
$json = json_decode($content, true);

foreach ($json as $item) {
?>
<div class="row">
    <textarea>   <?php echo "เชิญหมายเลข{$item['oqueue']}ที่ห้อง{$item['curdep_name']}ครับ"; ?>   </textarea>
    </div>

    <div class="row ">
        <button>Convert To Speech</button>
    </div>
    </form>
    </div>


<?php } ?>

<?php
if ($num_row == 1) {
?>
    <div class="item-card2">
        <div class="card1 g-color" style="color: white;">
            <h1 style="padding: 0;margin: 0;font-weight: 600;"><?php echo $oqueue; ?></h1>
            <h4 style="padding: 0;margin: 0;font-weight: 600;"><?php echo $ptname; ?></h4>
        </div>
        <div class="card2 g-color" style="background-color: #616EFF;color: white;">
            <h2 style="padding: 0;margin: 0;font-weight: 600;"><?php echo $curdep_name; ?></h2>
        </div>
        <div class="card3 g-color" style="background-color: #616EFF;color: white;">
            <h3 style="padding: 0;margin: 0;font-weight: 600;"><?php echo date("H:i", strtotime("$sign_datetime")); ?></h6>
                <!-- <textarea  name="hide" style="display:none; id="" cols="30" rows="10"><?php echo $oqueue; ?></textarea> -->

                <textarea name="" id="" cols="30" rows="10"><?php echo $oqueue; ?></textarea>


                <textarea id="" cols="30" rows="10"><?php echo "เชิญหมายเลข{$item['oqueue']}ที่ห้อง{$item['curdep_name']}ครับ"; ?></textarea>


        </div>
    </div>

<?php
} else {
?>
    <div class="item-card2">
        <div class="card1">
            <h1 style="padding: 0;margin: 0;font-weight: 600;"><?php echo $oqueue; ?></h1>
            <h4 style="padding: 0;margin: 0;font-weight: 600;"><?php echo $ptname; ?></h4>
        </div>
        <div class="card2">
            <h2 style="padding: 0;margin: 0;font-weight: 600;"><?php echo $curdep_name; ?></h2>
        </div>
        <div class="card3">
            <h3 style="padding: 0;margin: 0;font-weight: 600;"><?php echo date("H:i", strtotime("$sign_datetime")); ?></h6>
        </div>
    </div>
<?php

}
