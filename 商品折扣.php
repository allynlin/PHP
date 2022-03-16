<?php
function shop($price,$discount){
    global $cost;
    $cost=$price*$discount/100;
    echo "商品原价为：$price"."元";
    echo "<br>";
    echo "商品$discount"."折后价格为：$cost"."元";
}
shop(100,75);