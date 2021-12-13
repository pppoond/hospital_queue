<?php
if ($num_row == 1) {
?>
    <div class="card" style="background-color: white;border-radius: 16px;margin-bottom: 8px;">
        <div class="card-body" style="text-align: center;">
            <h1 class="card-title" style="font-size: 100px;color: #FF8484;"><?php echo $oqueue; ?></h1>
        </div>
    </div>
<?php
} else {
?>
    <div class="card" style="background-color: white;border-radius: 16px;margin-bottom: 8px;">
        <div class="card-body" style="text-align: center;">
            <h1 class="card-title" style="font-size: 100px;color: #FF8484;"><?php echo $oqueue; ?></h1>
        </div>
    </div>
<?php
}
