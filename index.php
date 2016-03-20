<!doctype html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>TeleAuction :: Auction System for Telegram</title>
        
        <link rel="stylesheet" type="text/css" href="css/common.css" />
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        
        <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript">
            $("document").ready(function() {
                $("#purchase").mouseenter(function() {
                    $("#findForm").stop().animate({"margin-left": 0}, 500, function() {
                        $("#codeToFind").removeAttr("disabled").focus();
                    });
                });
                $("#purchase").mouseleave(function() {
                    $("#findForm").stop().animate({"margin-left": "100%"}, 500);
                    $("#codeToFind").attr("disabled", "disabled");
                });
            });
        </script>
    </head>
    <body>
        TeleAuction
        <div id="regist" class="mainSection">
            <div class="fl">새 상품 등록</div>
            <div class="fr"></div>
        </div>
        <div id="purchase" class="mainSection">
            <div class="fl">기존 상품 조회</div>
            <div class="fr">
                <div id="findForm">
                    <input id="codeToFind" type="text" placeholder="상품코드" disabled="disabled" />
                </div>
            </div>
        </div>
    </body>
</html>