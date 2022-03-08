<?php
if ($num_row == 1) {
?>
    <div class="item-card2">
        <div class="card1 g-color" style="color: white;">
            <div class="i"><?php echo $oqueue; ?></div>
        </div>
        <div class="card2 g-color" style="background-color: #616EFF;color: white;">
            <div style="padding: 0px;margin: 0px;font-weight: 400;font-size: 7vh;"><?php echo $ptname; ?></div>
            <h2 style="padding: 0;margin: 0;font-weight: 600;font-size: 70px;"><?php echo $curdep_name; ?></h2>
        </div>
        <div class="card3 g-color" style="background-color: #616EFF;color: white;">
            <h3 style="padding: 0px;margin: 0px;font-weight: 600;font-size: 50px;"><?php echo date("H:i", strtotime("$sign_datetime")); ?></h6>
                <!-- <textarea  name="hide" style="display:none; id="" cols="30" rows="10"><?php echo $oqueue; ?></textarea> -->
        </div>
    </div>
<?php
} else {
?>
    <div class="item-card2">
        <div class="card1">
            <div class="i"><?php echo $oqueue; ?></div>
        </div>
        <div class="card2">
            <div style="padding: 0px;margin: 0px;font-weight: 400;font-size: 7vh;"><?php echo $ptname; ?></div>
            <h2 style="padding: 0px;margin: 0px;font-weight: 600;font-size: 70px;"><?php echo $curdep_name; ?></h2>
        </div>
        <div class="card3">
            <h3 style="padding: 0px;margin: 0px;font-weight: 600;font-size: 50px;"><?php echo date("H:i", strtotime("$sign_datetime")); ?></h6>
        </div>
    </div>
<?php

}
