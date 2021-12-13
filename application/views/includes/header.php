<div class="navbar-home" style="height: 15vh;">
    <div class="navbar-items">
        <img src="<?php echo base_url('assets/images/logo.png'); ?>" width="75px">
        <div style="width: 16px;"></div>
        <h1 style="font-weight: 600;">โรงพยาบาลเทศบาลนครอุดรธานี</h1>
    </div>
    <div style="text-align: center;">
        <h1 style="font-weight: 600;">อายุรกรรม (OPD)</h1>
        <div style="font-size: large;font-weight: 700;border: 3px solid white;border-radius: 12px;padding: 5px;background-color: Salmon;" id="timecurrent">
        </div>
    </div>
    <div style="text-align: center;">
        <?php $this->load->view('includes/department'); ?>
    </div>
</div>