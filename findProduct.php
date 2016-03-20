<!doctype html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/common.css" />
    </head>
    <body>
        <header>
            TeleAuction
            <input type="text" placeholder="기존 상품 조회" />
        </header>
        <section>
            <div id="productImg">
                <img id="bigImg" />
                <img id="thumb1" />
                <img id="thumb2" />
                <img id="thumb3" />
            </div>
            <article>
            </article>
        </section>
        <footer>
            <div id="currentInfo">
                <div class="fl">현재 가격: <span id="currentPrice"></span></div>
                <div class="fr"><span id="timeRemains"></span> 남음</div>
            </div>
            <div id="biddingArea">
                <div class="fl"><input type="text" placeholder="입찰 가격" /></div>
                <div class="fr"><button>입찰</button></div>
            </div>
        </footer>
    </body>
</html>