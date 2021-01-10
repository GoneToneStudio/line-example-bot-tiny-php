<?php
/**
 * Copyright 2020 GoneTone
 *
 * Line Bot
 * 範例 Example Bot (Location)
 *
 * 此範例 GitHub 專案：https://github.com/GoneToneStudio/line-example-bot-tiny-php
 * 此範例教學文章：https://blog.reh.tw/archives/988
 *
 * 官方文檔：https://developers.line.biz/en/reference/messaging-api#location-message
 */

/*
陣列輸出 Json
==============================
{
    "type": "location",
    "title": "Example location",
    "address": "台灣高雄市三民區大昌一路 98 號 (立志中學)",
    "latitude": 22.653742,
    "longitude": 120.32652400000006
}
==============================
*/
global $client, $message, $event;
if (strtolower($message['text']) == "location" || $message['text'] == "地址" || $message['text'] == "位置") {
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'location', //訊息類型 (位置)
                'title' => 'Example location', //回覆標題
                'address' => '台灣高雄市三民區大昌一路 98 號 (立志中學)', //回覆地址
                'latitude' => 22.653742, //地址緯度
                'longitude' => 120.32652400000006 //地址經度
            )
        )
    ));
}
