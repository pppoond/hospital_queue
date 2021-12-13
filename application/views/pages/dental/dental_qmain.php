<?php
if ($num_row == 1) {
?>
    <div class="item-card2">
        <div class="card1" style="background-color: #616EFF;color: white;">
            <h1 style="padding: 0;margin: 0;font-weight: 600;"><?php echo $oqueue; ?></h1>
            <h4 style="padding: 0;margin: 0;font-weight: 600;"><?php echo $ptname; ?></h4>
        </div>
        <div class="card2" style="background-color: #616EFF;color: white;">
            <h2 style="padding: 0;margin: 0;font-weight: 600;"><?php echo $curdep_name; ?></h2>
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
    </div>
<?php
}
