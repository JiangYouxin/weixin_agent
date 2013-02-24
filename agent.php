<?php

require "_wechat.php";

$agent = new WechatAgent();
$agent->init();
$agent->replyText("Hello World !");

?>