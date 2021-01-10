<?php
/**
 * Copyright 2017 GoneTone
 *
 * Line Bot
 * 範例 Example Bot (Image)
 *
 * 此範例 GitHub 專案：https://github.com/GoneTone/line-example-bot-php
 * 官方文檔：https://developers.line.biz/en/reference/messaging-api#image-message
 */

/*
陣列輸出 Json
==============================
{
    "type": "image",
    "originalContentUrl": "https://api.reh.tw/images/gonetone/logos/icons/icon-256x256.png",
    "previewImageUrl": "https://api.reh.tw/images/gonetone/logos/icons/icon-256x256.png"
}
==============================
*/
global $client, $message, $event;
if (strtolower($message['text']) == "image" || $message['text'] == "圖片") {
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'image', //訊息類型 (圖片)
                'originalContentUrl' => 'https://api.reh.tw/images/gonetone/logos/icons/icon-256x256.png', //回復圖片
                'previewImageUrl' => 'https://api.reh.tw/images/gonetone/logos/icons/icon-256x256.png' //回復的預覽圖片
            )
        )
    ));
}
