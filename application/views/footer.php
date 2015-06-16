        </div>
    </div>

    <script src="/static/js/ui.js"></script>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="/static/js/html2canvas.min.js"></script>
    <script src="/static/js/download.min.js"></script>

    <script>

        var isChanged = 0;
        var isWaiting = 0;

        $('.button-changeSeat').click(function(){
            if(isWaiting) {
                alert("진행중입니다. 잠시만 기다려주세요..");
                return false;
            }

            array = [];
            arrException = [];
            var rndNo, temp, temp2, i, j;

//            $(".seatDiv .button-wrap a").each(function() {
//                $(this).text($(this).data("name"));
//            });

            $(".seatDiv .button-wrap a").each(function() {
                if($(this).hasClass("button-wet")){
                    console.log("a");
                    //ㅁarrException.push({stdNo: $(this).data("stdno"), seatNo: $(this).parent().data("seatno")});
                } else {
                    array.push({stdNo: $(this).data("stdno"), seatNo: $(this).parent().data("seatno")});
                }
            });

            printArray(array);

            setTimeout(function(){
                for(i=0;i<array.length;i++){
                    rndNo = Math.floor(Math.random() * (array.length - 1 + 1)) + 1 - 1;

                    rndNo = array[rndNo].seatNo;
                    for(j=0;j<array.length;j++){
                        if(array[j].seatNo == rndNo){temp2 = j; break;}
                    }
                    temp = array[i].seatNo;
                    array[i].seatNo = rndNo;
                    array[temp2].seatNo = temp;

                    var a = $(".seatDiv .button-wrap[data-seatno=" + temp + "]").find("a");
                    var b = $(".seatDiv .button-wrap[data-seatno=" + rndNo + "]").find("a");

                    temp = a.data("name");
                    a.data("name", b.data("name"));
                    b.data("name", temp);

                    temp = a.data("stdno");
                    a.data("stdno", b.data("stdno"));
                    b.data("stdno", temp);
                }
            }, 1);


//            $(".seatDiv .button-wrap a").each(function() {
//                array.push({stdNo: $(this).data("stdno"), seatNo: $(this).parent().data("seatno")});
//            });

            $(".seatDiv .button-wrap a").each(function() {
                isWaiting = 1;

                $(this).slideUp("fast", function() {
                    $(this).removeClass("pure-button-primary").addClass("button-warning");
                    //$(this).data("name", $(this).text());
                    $(this).text("클릭");
                    $(this).slideDown("slow", function() {
                        ///$('.seatDiv').randomize();
                        isChanged = 1;
                        isWaiting = 0;
                    });
                });
            });
        });

        $('.button-seat').bind("contextmenu",function(e){
            e.preventDefault();
            if($(this).hasClass("button-wet")){
                $(this).removeClass("button-wet");
            } else {
                $(this).addClass("button-wet");
            }
        });

        $('.button-seat').click(function() {
            if(isWaiting) {
                alert("진행중입니다. 잠시만 기다려주세요..");
                return false;
            }

            if($(this).text() != "클릭" && $(this).hasClass("button-success")){
                if($(this).hasClass("button-secondary")) {
                    $(this).removeClass("button-secondary");
                    $(this).addClass("button-success");
                } else {
                    if($(this).hasClass("button-wet")) {
                        alert("고정 자리는 변경하실 수 없습니다. 고정을 푸신 후 다시 시도해주세요.");
                        return false;
                    }
                    if($(this).parent().parent().find(".button-secondary").length){
                        var temp;
                        var ele1 = $(this).parent().parent().find(".button-secondary");

                        temp = ele1.data("stdno");
                        ele1.data("stdno", $(this).data("stdno"));
                        $(this).data("stdno", temp);

                        temp = ele1.data("name");
                        ele1.data("name", $(this).data("name"));
                        $(this).data("name", temp);

                        temp = ele1.text();
                        ele1.text($(this).text());
                        $(this).text(temp);

                        $(this).parent().parent().find(".button-secondary").removeClass("button-secondary").addClass("button-success");
                        return false;
                    }
                    $(this).removeClass("button-success");
                    $(this).addClass("button-secondary");
                }
                return false;
            }
            if($(this).text() != "클릭" || $(this).data("name") == "") {
                alert("자리를 먼저 바꿔주세요!");
                return false;
            }
            $(this).removeClass("button-warning").addClass("button-success");
            $(this).text($(this).data("name"));
        });

        $('.button-openall').click(function(){
            if(isWaiting) {
                alert("진행중입니다. 잠시만 기다려주세요..");
                return false;
            }

            if(!isChanged) {
                alert("먼저 자리를 바꿔주세요!");
                return false;
            }
            $(".seatDiv .button-wrap a").each(function() {
                $(this).removeClass("button-warning").addClass("button-success");
                $(this).text($(this).data("name"));
            });
        });

        $('.button-saveimage').click(function(){
            html2canvas([document.getElementById('seatDiv')], {
                useCORS: true,
                onrendered: function(canvas) {
                    var seatImg = canvas.toDataURL('image/png');

                    download(seatImg, classId + "_자리.png", "image/png");
                }
            });
        });

        $('.button-saveseat').click(function(){
            var seatNo = 1;
            var seatData = [];
            $(".seatDiv .button-wrap a").each(function() {
                seatData.push([seatNo++, $(this).data("stdno")]);
            });

            $.post("/Seat/save", {seatData: seatData}, function(data){
                try {
                    var json = $.parseJSON(data);
                    if (json.result == 1) {
                        alert("저장을 완료하였습니다.");
                    } else {
                        alert("저장에 실패하였습니다.");
                    }
                } catch (e) {
                    console.log(e);
                    alert("저장에 실패하였습니다.");
                }
            });
        });

        $('.button-loadStudent').click(function(){
            var classId = prompt("고유 ID를 입력해주세요.");
            if(prompt == "" || prompt == null){
                alert("아이디를 정확히 입력해주세요!");
                return false;
            }

            $.post("/InputStudent/load", {classId: classId}, function(data){
                console.log(data);
                try {
                    var json = $.parseJSON(data);
                    if (json.result == 1) {
                        alert("로드를 완료하였습니다.");
                        location.reload();
                    } else if(json.result == 0) {
                        alert("해당 ID가 없습니다.");
                    } else {
                        alert("로드를 실패하였습니다.");
                    }
                } catch (e) {
                    console.log(e);
                    alert("로드를 실패하였습니다.");
                }
            });
        });

        $.fn.randomize = function(selector){
            var $elems = selector ? $(this).find(selector) : $(this).children(),
                $parents = $elems.parent();

            $parents.each(function(){
                $(this).children(selector).sort(function(){
                    return Math.round(Math.random()) - 0.5;

                    // }). remove().appendTo(this); // 2014-05-24: Removed `random` but leaving for reference. See notes under 'ANOTHER EDIT'
                }).detach().appendTo(this);
            });

            return this;
        };

        function printArray(array){
            for(var i=0;i<array.length;i++){
                console.log("std : " + array[i].stdNo + " / seat : " + array[i].seatNo);
            }
        }
    </script>

    </body>
</html>