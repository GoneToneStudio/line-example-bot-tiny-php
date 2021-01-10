<?php
/**
 * Copyright 2020 GoneTone
 *
 * Line Bot
 * 範例 Example Bot (Video)
 *
 * 此範例 GitHub 專案：https://github.com/GoneToneStudio/line-example-bot-tiny-php
 * 此範例教學文章：https://blog.reh.tw/archives/988
 *
 * 官方文檔：https://developers.line.biz/en/reference/messaging-api#video-message
 */

/*
陣列輸出 Json
==============================
{
    "type": "video",
    "originalContentUrl": "https://api.reh.tw/line/bot/example/assets/videos/example.mp4",
    "previewImageUrl": "https://api.reh.tw/line/bot/example/assets/images/example.jpg"
}
==============================
*/
global $client, $message, $event;
if (strtolower($message['text']) == "video" || $message['text'] == "視頻" || $message['text'] == "影片") {
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'video', //訊息類型 (影片)
                'originalContentUrl' => 'https://api.reh.tw/line/bot/example/assets/videos/example.mp4', //回覆影片
                'previewImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg' //回覆的預覽圖片
            )
        )
    ));
}
