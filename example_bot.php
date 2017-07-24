<?php
/**
 * Copyright 2017 GoneTone
 *
 * Line Bot
 * 範例 Example Bot 執行主文件
 *
 * 此範例 GitHub 專案：https://github.com/GoneTone/line-example-bot-php
 * 官方文檔：https://devdocs.line.me/en/
 */
error_reporting(0); // 不顯示錯誤 (Debug 時請註解掉)
date_default_timezone_set("Asia/Taipei"); // 設定時區為台北時區

require_once('LINEBotTiny.php');

// Channel Access Token
$channelAccessToken = '<您的 Channel Access Token>';
$channelSecret = '<您的 Channel Secret>'; // Channel Secret

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                    require_once('includes/text.php'); // Type: Text
                    require_once('includes/image.php'); // Type: Image
                    require_once('includes/video.php'); // Type: Video
                    require_once('includes/audio.php'); // Type: Audio
                    require_once('includes/location.php'); // Type: Location
                    require_once('includes/sticker.php'); // Type: Sticker
                    require_once('includes/imagemap.php'); // Type: Imagemap
                    require_once('includes/template.php'); // Type: Template
                    break;
                default:
                    //error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        case 'postback':
            //require_once('postback.php'); // postback
            break;
        default:
            //error_log("Unsupporeted event type: " . $event['type']);
            $client->replyMessage(array(
                'replyToken' => $event['replyToken'],
                'messages' => array(
                    array(
                        'type' => 'text',
                        'text' => '大家好，這是一個範例 Bot OuO

範例程式開源至 GitHub：
https://github.com/GoneTone/line-example-bot-php

請輸入 /help 開始查詢指令或關鍵詞'
                    )
                )
            ));
            break;
    }
};
?>