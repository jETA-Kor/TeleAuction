<!doctype html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/common.css" />
        <link rel="stylesheet" type="text/css" href="css/registProduct.css" />
        
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/showdown/1.3.0/showdown.min.js"></script>
        <script>
            var converter = new showdown.Converter({"tables": "true", "simplifiedAutoLink": "true", "ghCodeBlocks": "true"});
            var acceptableExtension = ['bmp', 'png', 'gif', 'jpg', 'jpeg'];
            
            $(document).ready(function() {
                $("#productDesc").on('keyup keypress blur change', function() {
                    $("#productDescPreview").html(converter.makeHtml($("#productDesc").val()));
                });
                
                $("#imageupload").hover(function() {
                    $("#fakeupload").addClass("selected");
                }, function() {
                    $("#fakeupload").removeClass("selected");
                });
                
                $("#imageupload").change(function() {
                    var uploader = $("#imageupload")[0];
                    
                    if(uploader.files.length != 0) {
                        $("#fakeupload").html(uploader.files.length + "개 파일 선택됨");
                    } else {
                        $("#fakeupload").html("클릭해서 이미지 업로드");
                    }
                    
                    if(uploader.files.length > 3) {
                        alert("최대 3개의 파일만 업로드 할 수 있습니다.");
                        $("#fakeupload").addClass("hasTrouble");
                        return;
                    }
                    
                    for(var i = 0; i < uploader.files.length; i++) {
                        var tmpfile = uploader.files.item(i);
                        var extension = tmpfile.name.split('.').pop().toLowerCase();
                        var extensionMatch = false;
                        
                        for(var j = 0; j < acceptableExtension.length; j++) {
                            if(extension == acceptableExtension[j]) {
                                extensionMatch = true;
                                break;
                            }
                        }
                        
                        if(!extensionMatch) {
                            var msg = "";
                            for(var j = 0; j < acceptableExtension.length; j++) {
                                msg += acceptableExtension[j];
                                if(!(j + 1 == acceptableExtension.length))
                                    msg += ", ";
                            }
                            msg += " 확장자만 첨부할 수 있습니다.";
                            alert(msg);
                            $("#fakeupload").addClass("hasTrouble");
                            return;
                        }
                    }
                    
                    $("#fakeupload").removeClass("hasTrouble");
                });
                
                $("input[type=date]").change(function(event) {
                    try {
                        var tmp = new Date(event.target.value.replace(/\./gi, "-"));
                        if(tmp.toDateString() == "Invalid Date") throw new Exception();
                        
                        var year = tmp.getFullYear();
                        var month = (tmp.getMonth() < 9 ? "0" + (tmp.getMonth() + 1) : tmp.getMonth() + 1);
                        var date = (tmp.getDate() < 10 ? "0" + tmp.getDate() : tmp.getDate());
                        
                        event.target.value = year + "-" + month + "-" + date;
                        
                        event.target.classList.remove("hasTrouble");
                    } catch(e) {
                        event.target.classList.add("hasTrouble");
                    }
                });
            });
        </script>
    </head>
    <body>
        <header>
            <div class="fixedWrap">
                TeleAuction
                <input id="findForm" type="text" placeholder="기존 상품 조회" />
            </div>
        </header>
        <section>
            <form id="productInfoForm">
                <div id="titleWrap">
                    <label for="title">제목</label><input type="text" id="title" />
                </div>
                <div id="imageWrap">
                    <div id="fakeupload">클릭해서 이미지 업로드</div>
                    <input type="file" id="imageupload" accept="image/*" multiple />
                </div>
                <div id="priceWrap">
                    <label for="minPrice">최소 금액</label><input type="number" id="minPrice" /><br />
                    <label for="priceUnit">입찰 단위 가격</label><input type="number" id="priceUnit" />
                </div>
                <div id="durationWrap">
                    <label>경매 기간</label><input type="date" id="startdate" />~<input type="date" id="enddate" />
                </div>
                <div id="productDescWrap">
                    <textarea id="productDesc" placeholder="제품 설명"></textarea>
                    <div id="productDescPreview"></div>
                </div>
            </form>
        </section>
        <footer>
            <div class="fixedWrap">
                <div class="fr"><button>상품 등록</button></div>
            </div>
        </footer>
    </body>
</html>