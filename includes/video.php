<?php
/**
 * Copyright 2017 GoneTone
 *
 * Line Bot
 * 範例 Example Bot (Video)
 *
 * 此範例 GitHub 專案：https://github.com/GoneTone/line-example-bot-php
 * 官方文檔：https://developers.line.biz/en/reference/messaging-api#video-message
 */
/**
陣列輸出 Json
==============================
{
    "type": "video",
    "originalContentUrl": "https://api.reh.tw/line/bot/example/assets/videos/example.mp4",
    "previewImageUrl": "https://api.reh.tw/line/bot/example/assets/images/example.jpg"
}
==============================
*/
if (strtolower($message['text']) == "video" || $message['text'] == "視頻" || $message['text'] == "影片"){
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'video', // 訊息類型 (影片)
                'originalContentUrl' => 'https://api.reh.tw/line/bot/example/assets/videos/example.mp4', // 回復影片
                'previewImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg' // 回復的預覽圖片
            )
        )
    ));
}
