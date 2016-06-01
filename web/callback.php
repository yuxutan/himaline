<?php
$request = file_get_contents("php://input");
$json = json_decode($request);
$content = $json->result[0]->content;

$header = array(
    'Content-Type: application/json; charser=UTF-8',
    'X-Line-ChannelID: 1469305722',  // Channel ID
    'X-Line-ChannelSecret: cc89ddcb66e50aed4cf8e34ef804f5d3',  // ChannelID Secret
    'X-Line-Trusted-User-With-ACL: uaf3cd56e71d94d09acc4cd5d9c75a985',  // MID
);
$post = array(
    'to' => array($content->from),
    'toChannel' => 1383378250,  // Fixed value.
    'eventType' => '138311608800106203',  // Fixed value.
    'content' => array(
        'contentType' => 1,
        'toType' => 1,
    ),
);

// ボットが返答する内容。ここでは送られた内容を復唱するだけ
$post['content']['text'] = $content->text.' ですね';

$post = json_encode($post);

$ch = curl_init("https://trialbot-api.line.me/v1/events");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);