<?php
/**
 * Copyright 2020 GoneTone
 *
 * Line Bot
 * 範例 Example Bot (Audio)
 *
 * 此範例 GitHub 專案：https://github.com/GoneToneStudio/line-example-bot-tiny-php
 * 此範例教學文章：https://blog.reh.tw/archives/988
 *
 * 官方文檔：https://developers.line.biz/en/reference/messaging-api#audio-message
 */

/*
陣列輸出 Json
==============================
{
    "type": "audio",
    "originalContentUrl": "https://api.reh.tw/line/bot/example/assets/audios/example.ogg",
    "duration": 3000
}
==============================
*/
global $client, $message, $event;
if (strtolower($message['text']) == "audio" || $message['text'] == "音頻" || $message['text'] == "音樂") {
    $audiofile = dirname(dirname(__FILE__)) . '/assets/audios/example.ogg'; //音樂文件路徑
    $audiofileurl = 'https://api.reh.tw/line/bot/example/assets/audios/example.ogg'; //音樂文件網址

    //使用 getID3 取得音樂長度 (毫秒)
    require_once(dirname(dirname(__FILE__)) . '/lib/getid3/getid3.php');
    $getID3 = new getID3;
    $file = $getID3->analyze($audiofile);
    $milliseconds = round($file['playtime_seconds'] * 1000); //音樂長度 (毫秒)

    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'audio', //訊息類型 (音樂)
                'originalContentUrl' => $audiofileurl, //回覆音樂
                'duration' => $milliseconds //音樂長度 (毫秒)
            )
        )
    ));
}
