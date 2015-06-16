<div class="header">
    <h1>학생정보 입력</h1>
    <h2>엑셀 파일을 이용하여 손쉽게 데이터를 입력하세요.</h2>
</div>

<div class="content" style="text-align: center;">
    <br>
    <p>학생 정보는 엑셀 파일로 입력하실 수 있습니다. <a href="/static/seat.xlsx">(예시 엑셀 파일 다운받기)</a></p>

    <form class="pure-form" action="/InputStudent/upload" method="POST" enctype="multipart/form-data">
        <input id="name" name="classid" type="text" placeholder="고유ID(10자 이내, 한글X)">
        <input type="file" name="userfile" />
        <button type="submit" class="pure-button pure-button-primary">전송</button>
    </form>
</div>