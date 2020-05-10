<?php
/**
 * Copyright 2017 GoneTone
 *
 * Line Bot
 * 範例 Example Bot (Location)
 *
 * 此範例 GitHub 專案：https://github.com/GoneTone/line-example-bot-php
 * 官方文檔：https://developers.line.biz/en/reference/messaging-api#location-message
 */
/**
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
if (strtolower($message['text']) == "location" || $message['text'] == "地址" || $message['text'] == "位置") {
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'location', // 訊息類型 (位置)
                'title' => 'Example location', // 回復標題
                'address' => '台灣高雄市三民區大昌一路 98 號 (立志中學)', // 回復地址
                'latitude' => 22.653742, // 地址緯度
                'longitude' => 120.32652400000006 // 地址經度
            )
        )
    ));
}
