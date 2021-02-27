<?php
/**
 * Copyright 2021 GoneTone
 *
 * Line Bot
 * 範例 Example Bot (Flex)
 *
 * 此範例 GitHub 專案：https://github.com/GoneToneStudio/line-example-bot-tiny-php
 * 此範例教學文章：https://blog.reh.tw/archives/988
 *
 * 官方文檔：https://developers.line.biz/en/reference/messaging-api/#flex-message
 */

/*
 * 可以使用 Line 官方提供的 Flex Message Simulator 排版
 * https://developers.line.biz/flex-simulator/
 *
 * Flex Message Simulator 是生成 Json，可以利用下方網頁快速轉換成陣列，當然你要手動寫也是可XDD
 * https://www.appdevtools.com/json-php-array-converter
 */

/*
陣列輸出 Json
==============================
{
    "type": "flex",
    "altText": "Example flex message template",
    "contents": {
        "type": "bubble",
        "hero": {
            "type": "image",
            "url": "https://api.reh.tw/images/gonetone/logos/icons/icon-256x256.png",
            "aspectRatio": "16:9",
            "size": "full",
            "aspectMode": "cover"
        },
        "body": {
            "type": "box",
            "layout": "vertical",
            "contents": [
                {
                    "type": "text",
                    "text": "Hello, world!",
                    "weight": "bold",
                    "size": "xl",
                    "margin": "md",
                    "wrap": true
                },
                {
                    "type": "text",
                    "text": "你好，世界！",
                    "wrap": true,
                    "color": "#e96bff"
                }
            ]
        },
        "footer": {
            "type": "box",
            "layout": "vertical",
            "contents": [
                {
                    "type": "button",
                    "action": {
                        "type": "uri",
                        "label": "教學文章",
                        "uri": "https://blog.reh.tw/archives/988#Flex-%E8%A8%8A%E6%81%AF"
                    },
                    "style": "secondary",
                    "color": "#FFD798"
                },
                {
                    "type": "button",
                    "action": {
                        "type": "uri",
                        "uri": "https://github.com/GoneToneStudio/line-example-bot-tiny-php",
                        "label": "GitHub"
                    }
                }
            ]
        },
        "size": "giga"
    }
}
==============================
*/
global $client, $message, $event;
if (strtolower($message['text']) == "flex") {
    /* 注意，Flex Message Simulator 生成並轉換的陣列貼在這邊 */
    $contentsArray = array(
        "type" => "bubble",
        "hero" => array(
            "type" => "image",
            "url" => "https://api.reh.tw/images/gonetone/logos/icons/icon-256x256.png",
            "aspectRatio" => "16:9",
            "size" => "full",
            "aspectMode" => "cover"
        ),
        "body" => array(
            "type" => "box",
            "layout" => "vertical",
            "contents" => array(
                array(
                    "type" => "text",
                    "text" => "Hello, world!",
                    "weight" => "bold",
                    "size" => "xl",
                    "margin" => "md",
                    "wrap" => true
                ),
                array(
                    "type" => "text",
                    "text" => "你好，世界！",
                    "wrap" => true,
                    "color" => "#e96bff"
                )
            )
        ),
        "footer" => array(
            "type" => "box",
            "layout" => "vertical",
            "contents" => array(
                array(
                    "type" => "button",
                    "action" => array(
                        "type" => "uri",
                        "label" => "教學文章",
                        "uri" => "https://blog.reh.tw/archives/988#Flex-%E8%A8%8A%E6%81%AF"
                    ),
                    "style" => "secondary",
                    "color" => "#FFD798"
                ),
                array(
                    "type" => "button",
                    "action" => array(
                        "type" => "uri",
                        "uri" => "https://github.com/GoneToneStudio/line-example-bot-tiny-php",
                        "label" => "GitHub"
                    )
                )
            )
        ),
        "size" => "giga"
    );

    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'flex', //訊息類型 (flex)
                'altText' => 'Example flex message template', //替代文字
                'contents' => $contentsArray //Flex Message 內容
            )
        )
    ));
}
