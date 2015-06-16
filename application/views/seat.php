<script>
    var classId = '<?php echo $classId;?>';
</script>
<div class="header">
    <h1>자리바꾸기</h1>
    <h2>
        <button class="button-success pure-button button-changeSeat">자리 바꾸기</button>
        <a class="button-secondary pure-button" href="/InputStudent">학생정보 입력</a>
        <button class="button-wet pure-button button-loadStudent">학생정보 불러오기</button>
    </h2>
</div>

<div class="content">
    <div style="text-align: center; margin: 10px 0;">
        <button class="button-error pure-button button-openall">모두 열기</button>
        <button class="button-secondary pure-button button-saveimage">이미지로 저장하기</button>
        <button class="button-success pure-button button-saveseat">자리배열 저장하기</button>
    </div>
    <div class="pure-g">
        <div class="pure-u-24-24" style="text-align: center; margin: 10px 0;">
            <a class="pure-button button-error" style="background: #d35400; width: 90%;">교탁</a>
        </div>
    </div>
    <div class="pure-g">
        <div class="pure-u-8-24" style="text-align: center;">
            1분단
        </div>
        <div class="pure-u-8-24" style="text-align: center;">
            2분단
        </div>
        <div class="pure-u-8-24" style="text-align: center;">
            3분단
        </div>
    </div>

    <div class="pure-g seatDiv" id="seatDiv">
        <?php $idx = 0; $seatNo = 1; ?>

        <?php foreach($seatData as $seatRow => $sd) : ?>
            <?php if($idx == 0) { ?>
            <?php } ?>
            <?php $idx++;?>
            <div class="pure-u-4-24 button-wrap" data-seatno="<?php echo $seatNo++;?>">
                <a class="pure-button pure-button-primary button-large button-seat" data-stdno="<?php echo $sd['stdNo'];?>" data-name="<?php echo $sd['stdName'];?>"><?php echo $sd['stdName'];?></a>
            </div>
            <?php if($idx == 6) { $idx = 0 ?>
            <?php } ?>
        <?php endforeach ?>
        <?php if($seatNo == 1) { ?>
            <div class="pure-u-24-24 button-wrap">
                <h2 style="text-align: center;">학생정보를 먼저 불러와주세요.</h2>
            </div>
        <?php } ?>
    </div>
</div>