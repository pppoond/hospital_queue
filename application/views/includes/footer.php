<div class="d-flex" style="height: 5vh;">
    <div style="width: 100%;">
        <span class="Apple-style-span">
            <marquee>
                <b>
                    <span style="color: white;">พัฒนาโดย : ฝ่ายเทคโนโลยีสารสนเทศ โรงพยาบาลเทศบาลนครอุดรธานี</span>
                </b>
            </marquee>
        </span>
    </div>
    <div style=" display: flex;text-align: center;margin-left: 16px;margin-right: 16px;" id="setting-btn">
        <h6 style="width: 300px;display: flex;color: white;">F11 Full Screen Mode</h6>
        <?php $this->load->view('includes/department'); ?>
        <!-- <div style="width: 200px;display: flex;flex-direction: row;margin-left: 16px;color: white;">แสดงชื่อตรงกลาง : <input type="checkbox" id="myCheck" onclick="myFunction()"></div> -->
        <div class="form-check ml-2">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" onclick="onShowPtnameClick()" checked>
            <label class="form-check-label" for="invalidCheck2" style="color: white;">
                ชื่อ
            </label>
        </div>

    </div>
</div>