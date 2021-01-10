<?php
/**
 * Copyright 2020 GoneTone
 *
 * Line Bot
 * 範例 Example Bot (Sticker)
 *
 * 此範例 GitHub 專案：https://github.com/GoneToneStudio/line-example-bot-tiny-php
 * 此範例教學文章：https://blog.reh.tw/archives/988
 *
 * 官方文檔：https://developers.line.biz/en/reference/messaging-api#sticker-message
 * 貼圖 ID 查詢：https://developers.line.biz/media/messaging-api/sticker_list.pdf
 */

/*
陣列輸出 Json
==============================
{
    "type": "sticker",
    "packageId": 1,
    "stickerId": 1
}
==============================
*/
global $client, $message, $event;
if (strtolower($message['text']) == "sticker" || $message['text'] == "貼圖" || $message['text'] == "貼紙") {
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'sticker', //訊息類型 (貼圖)
                'packageId' => 1, //貼圖包 ID
                'stickerId' => 1 //貼圖 ID
            )
        )
    ));
}
