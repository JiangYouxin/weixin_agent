<?php

class WechatAgent
{
    var $fromUsrename="";
    var $toUsername="";
    var $content="";

    public function init()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if (!empty($postStr))
        {
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $this->fromUsername = $postObj->FromUserName;
            $this->toUsername = $postObj->ToUserName;
            $this->content = trim($postObj->Content);     
        }
        else
        {
            echo $_GET["echostr"];
            exit;
        }
    }
    public function replyText($text)
    {
        $textTpl = "<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
<Content><![CDATA[%s]]></Content>
<FuncFlag>0</FuncFlag>
</xml>";

        $reply = sprintf(
            $textTpl,
            $this->fromUsername,
            $this->toUsername,
            time(),
            "text",
            $text);

        echo $reply;
    }
}
?>