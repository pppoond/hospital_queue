<?php
if ($num_row == 1) {
?>
    <div class="item-card2">
        <div class="card1 g-color" style="color: white;">
            <h1 style="padding: 0;margin: 0;font-weight: 600;font-size: 120px;"><?php echo $oqueue; ?></h1>
            <h4 style="padding: 0;margin: 0;font-weight: 600;font-size: 40px;"><?php echo $ptname; ?></h4>
        </div>
        <div class="card2 g-color" style="background-color: #616EFF;color: white;">
            <h2 style="padding: 0;margin: 0;font-weight: 600;font-size: 70px;"><?php echo $curdep_name; ?></h2>
        </div>
        <div class="card3 g-color" style="background-color: #616EFF;color: white;">
            <h3 style="padding: 0;margin: 0;font-weight: 600;font-size: 50px;"><?php echo date("H:i", strtotime("$sign_datetime")); ?></h6>
                <!-- <textarea  name="hide" style="display:none; id="" cols="30" rows="10"><?php echo $oqueue; ?></textarea> -->
        </div>
    </div>

<?php
} else {
?>
    <div class="item-card2">
        <div class="card1">
            <h1 style="padding: 0;margin: 0;font-weight: 600;font-size: 120px;"><?php echo $oqueue; ?></h1>
            <h4 style="padding: 0;margin: 0;font-weight: 600;font-size: 40px;"><?php echo $ptname; ?></h4>
        </div>
        <div class="card2">
            <h2 style="padding: 0;margin: 0;font-weight: 600;font-size: 70px;"><?php echo $curdep_name; ?></h2>
        </div>
        <div class="card3">
            <h3 style="padding: 0;margin: 0;font-weight: 600;font-size: 50px;"><?php echo date("H:i", strtotime("$sign_datetime")); ?></h6>
        </div>
    </div>
<?php

}
