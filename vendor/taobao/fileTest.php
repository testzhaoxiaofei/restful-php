<?php
 include "TopSdk.class.php";
 date_default_timezone_set('Asia/Shanghai'); 
//$c = new TopClient;
//$c->appkey = '23682543';
//$c->secretKey = 'b5322aa587feb3c619f195c78a396b59';
    // $req = new TradeVoucherUploadRequest;
    // $req->setFileName("example");
    // $req->setFileData("@/Users/xt/Downloads/1.jpg");
    // $req->setSellerNick("奥利奥官方旗舰店");
    // $req->setBuyerNick("101NufynDYcbjf2cFQDd62j8M/mjtyz6RoxQ2OL1c0e/Bc=");
    // var_dump($c->execute($req));






$c = new TopClient;
$c->appkey = '23682543';
$c->secretKey = 'b5322aa587feb3c619f195c78a396b59';
$req = new TbkItemGetRequest;
$req->setFields("num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,seller_id,volume,nick");
$req->setQ("女装");
$req->setCat("16,18");
$req->setItemloc("杭州");
$req->setSort("tk_rate_des");
$req->setIsTmall("false");
$req->setIsOverseas("false");
$req->setStartPrice("10");
$req->setEndPrice("10");
$req->setStartTkRate("123");
$req->setEndTkRate("123");
$req->setPlatform("1");
$req->setPageNo("123");
$req->setPageSize("20");

$resp = $c->execute($req);
echo '<pre/>';
print_r($resp);

?>