<?php

require "_wechat.php";

$agent = new WechatAgent();
$agent->init();
$agent->replyText("您好，这是我的微信公众账号，用来发布消息。沟通可加我的私人号 (也是QQ号): 193830。");

?>