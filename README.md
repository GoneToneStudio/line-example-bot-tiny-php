Line Bot 基礎範例程式碼教學 (PHP)
====================
在開始之前，可以先加範例機器人！([@omp3220g](https://line.me/R/ti/p/j1sMDEJCyW "@omp3220g"))

#### 範例指令
- [類型：text](#類型text) > `text` 或 `文字`
- [類型：image](#類型image) > `image` 或 `圖片`
- [類型：video](#類型video) > `video` 或 `視頻` 或 `影片`
- [類型：audio](#類型audio) > `audio` 或 `音頻` 或 `音樂`
- [類型：location](#類型location) > `location` 或 `地址` 或 `位置`
- [類型：sticker](#類型sticker) > `sticker` 或 `貼圖` 或 `貼紙`
- [類型：imagemap](#類型imagemap) > `imagemap` 或 `圖像地圖` 或 `圖片地圖`
- 類型：template (buttons) > `buttons template` 或 `按鈕模板`
- 類型：template (confirm) > `confirm template` 或 `確認模板`
- 類型：template (carousel) > `carousel template` 或 `旋轉木馬模板`

## 開始
### 類型：text
我們要讓機器人回傳文字訊息，Json 格式如下：
```json
{
    "type": "text",
    "text": "Hello, world!"
}
```

當機器人收到關鍵字訊息 `text` 或 `文字`，則回傳 Hello, world!，PHP 的寫法如下：
```php
if (strtolower($message['text']) == "text" || $message['text'] == "文字"){
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'text', // 訊息類型 (文字)
                'text' => 'Hello, world!' // 回復訊息
            )
        )
    ));
}
```

- 在 `type` 那我們設定 `text`，代表訊息類型為文字。
- 在 `text` 那可以自行修改成您想讓機器人回復的訊息。
***PS：文字最大 2000 個字符***
- 判斷式中的 `$message['text']` 為使用者傳送的文字，您可自行修改判斷式。

官方文檔：https://devdocs.line.me/en/#text

------------

### 類型：image
我們要讓機器人回傳圖片訊息，Json 格式如下：
```json
{
    "type": "image",
    "originalContentUrl": "https://api.reh.tw/line/bot/example/assets/images/example.jpg",
    "previewImageUrl": "https://api.reh.tw/line/bot/example/assets/images/example.jpg"
}
```

當機器人收到關鍵字訊息 `image` 或 `圖片`，則回傳圖片，PHP 的寫法如下：
```php
if (strtolower($message['text']) == "image" || $message['text'] == "圖片"){
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'image', // 訊息類型 (圖片)
                'originalContentUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg', // 回復圖片
                'previewImageUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example.jpg' // 回復的預覽圖片
            )
        )
    ));
}
```

- 在 `type` 那我們設定 `image`，代表訊息類型為圖片。
- 在 `originalContentUrl` 那可以自行修改成您想讓機器人回復的圖片網址。
***PS：必須是 https 加密、網址最大 1000 個字符、圖片長寬最大 1024 x 1024、圖片大小最大 1 MB***
- 在 `previewImageUrl` 那可以自行修改成您想讓機器人回復的預覽圖片網址。
***PS：必須是 https 加密、網址最大 1000 個字符、圖片長寬最大 240 x 240、圖片大小最大 1 MB***
- 判斷式中的 `$message['text']` 為使用者傳送的文字，您可自行修改判斷式。

官方文檔：https://devdocs.line.me/en/#image

------------

### 類型：video
我們要讓機器人回傳影片訊息，Json 格式如下：
```json
{
    "type": "video",
    "originalContentUrl": "https://api.reh.tw/line/bot/example/assets/videos/example.mp4",
    "previewImageUrl": "https://api.reh.tw/line/bot/example/assets/images/example.jpg"
}
```

當機器人收到關鍵字訊息 `video` 或 `視頻` 或 `影片`，則回傳影片，PHP 的寫法如下：
```php
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
```

- 在 `type` 那我們設定 `video`，代表訊息類型為影片。
- 在 `originalContentUrl` 那可以自行修改成您想讓機器人回復的影片網址。
***PS：必須是 https 加密、網址最大 1000 個字符、影片長度小於 1 分鐘、影片大小最大 10 MB***
- 在 `previewImageUrl` 那可以自行修改成您想讓機器人回復的預覽圖片網址。
***PS：必須是 https 加密、網址最大 1000 個字符、圖片長寬最大 240 x 240、圖片大小最大 1 MB***
- 判斷式中的 `$message['text']` 為使用者傳送的文字，您可自行修改判斷式。

官方文檔：https://devdocs.line.me/en/#video

------------

### 類型：audio
我們要讓機器人回傳音頻訊息，Json 格式如下：
```json
{
    "type": "audio",
    "originalContentUrl": "https://api.reh.tw/line/bot/example/assets/audios/example.ogg",
    "duration": 3000
}
```

當機器人收到關鍵字訊息 `audio` 或 `音頻` 或 `音樂`，則回傳音頻，PHP 的寫法如下：
```php
if (strtolower($message['text']) == "audio" || $message['text'] == "音頻" || $message['text'] == "音樂"){
    $audiofile = dirname(dirname(__FILE__)).'/assets/audios/example.ogg'; // 音樂文件路徑
    $audiofileurl = 'https://api.reh.tw/line/bot/example/assets/audios/example.ogg'; // 音樂文件網址
    
    // 使用 getID3 取得音樂長度 (毫秒)
    require_once(dirname(dirname(__FILE__)).'/assets/getid3/getid3.php');
    $getID3 = new getID3;
    $file = $getID3->analyze($audiofile);
    $milliseconds = round($file['playtime_seconds'] * 1000); // 音樂長度 (毫秒)
    
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'audio', // 訊息類型 (音樂)
                'originalContentUrl' => $audiofileurl, // 回復音樂
                'duration' => $milliseconds // 音樂長度 (毫秒)
            )
        )
    ));
}
```

- 在 `type` 那我們設定 `audio`，代表訊息類型為影片。
- 在 `originalContentUrl` 那可以自行修改成您想讓機器人回復的音頻網址。
***PS：必須是 https 加密、網址最大 1000 個字符、音頻長度小於 1 分鐘、影片大小最大 10 MB***
- 在 `duration` 那設定為音頻長度 (毫秒)，單位計算 1 秒 \* 1000。
***PS：我們使用了 getID3 自動取得音樂長度，詳情請看專案***
- 判斷式中的 `$message['text']` 為使用者傳送的文字，您可自行修改判斷式。

官方文檔：https://devdocs.line.me/en/#audio

------------

### 類型：location
我們要讓機器人回傳位置訊息，Json 格式如下：
```json
{
    "type": "location",
    "title": "Example location",
    "address": "台灣高雄市三民區大昌一路 98 號 (立志中學)",
    "latitude": 22.653742,
    "longitude": 120.32652400000006
}
```

當機器人收到關鍵字訊息 `location` 或 `地址` 或 `位置`，則回傳位置，PHP 的寫法如下：
```php
if (strtolower($message['text']) == "location" || $message['text'] == "地址" || $message['text'] == "位置"){
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
```

- 在 `type` 那我們設定 `location`，代表訊息類型為位置。
- 在 `title` 那可以自行修改成您想讓機器人回復位置時顯示的標題。
***PS：文字最大 100 個字符***
- 在 `address` 那可以自行修改成您想讓機器人回復位置時顯示的位置名稱。
***PS：文字最大 100 個字符***
- 在 `latitude` 那可以自行修改成您想讓機器人回復位置的緯度。
***PS：網路上有工具可將地址轉換成經緯度***
- 在 `longitude` 那可以自行修改成您想讓機器人回復位置的經度。
***PS：網路上有工具可將地址轉換成經緯度***
- 判斷式中的 `$message['text']` 為使用者傳送的文字，您可自行修改判斷式。

官方文檔：https://devdocs.line.me/en/#location

------------

### 類型：sticker
我們要讓機器人回傳貼圖訊息，Json 格式如下：
```json
{
    "type": "sticker",
    "packageId": 1,
    "stickerId": 1
}
```

當機器人收到關鍵字訊息 `sticker` 或 `貼圖` 或 `貼紙`，則回傳貼圖，PHP 的寫法如下：
```php
if (strtolower($message['text']) == "sticker" || $message['text'] == "貼圖" || $message['text'] == "貼紙"){
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'sticker', // 訊息類型 (貼圖)
                'packageId' => 1, // 貼圖包 ID
                'stickerId' => 1 // 貼圖 ID
            )
        )
    ));
}
```

- 在 `type` 那我們設定 `sticker`，代表訊息類型為貼圖。
- 在 `packageId` 那可以自行修改成您想讓機器人回復貼圖的貼圖包 ID。
***貼圖 ID 查詢：https://devdocs.line.me/files/sticker_list.pdf***
- 在 `stickerId` 那可以自行修改成您想讓機器人回復貼圖的貼圖 ID。
***貼圖 ID 查詢：https://devdocs.line.me/files/sticker_list.pdf***
- 判斷式中的 `$message['text']` 為使用者傳送的文字，您可自行修改判斷式。

官方文檔：https://devdocs.line.me/en/#sticker

------------

### 類型：imagemap
我們要讓機器人回傳圖片地圖訊息，Json 格式如下：
```json
{
    "type": "imagemap",
    "baseUrl": "https://api.reh.tw/line/bot/example/assets/images/example",
    "altText": "Example imagemap"
    "baseSize": {
        "height": 1040,
        "width": 1040
    },
    "actions": [
        {
            "type": "uri",
            "linkUri": "https://github.com/GoneTone/line-example-bot-php",
            "area": {
                "x": 0,
                "y": 0,
                "width": 520,
                "height": 1040
            }
        },
        {
            "type": "message",
            "text": "Hello",
            "area": {
                "x": 520,
                "y": 0,
                "width": 520,
                "height": 1040
            }
        }
    ]
}
```

當機器人收到關鍵字訊息 `imagemap` 或 `圖像地圖` 或 `圖片地圖`，則回傳圖片地圖，PHP 的寫法如下：
```php
if (strtolower($message['text']) == "imagemap" || $message['text'] == "圖像地圖" || $message['text'] == "圖片地圖"){
    $client->replyMessage(array(
        'replyToken' => $event['replyToken'],
        'messages' => array(
            array(
                'type' => 'imagemap', // 訊息類型 (圖片地圖)
                'baseUrl' => 'https://api.reh.tw/line/bot/example/assets/images/example', // 圖片網址 (可調整大小 240px, 300px, 460px, 700px, 1040px)
                'altText' => 'Example imagemap', // 替代文字
                'baseSize' => array(
                    'height' => 1040, // 圖片寬
                    'width' => 1040 // 圖片高
                ),
                'actions' => array(
                    array(
                        'type' => 'uri', // 類型 (網址)
                        'linkUri' => 'https://github.com/GoneTone/line-example-bot-php', // 連結網址
                        'area' => array(
                            'x' => 0, // 點擊位置 X 軸
                            'y' => 0, // 點擊位置 Y 軸
                            'width' => 520, // 點擊範圍寬度
                            'height' => 1040 // 點擊範圍高度
                        )
                    ),
                    array(
                        'type' => 'message', // 類型 (用戶發送訊息)
                        'text' => 'Hello', // 發送訊息
                        'area' => array(
                            'x' => 520, // 點擊位置 X 軸
                            'y' => 0, // 點擊位置 Y 軸
                            'width' => 520, // 點擊範圍寬度
                            'height' => 1040 // 點擊範圍高度
                        )
                    )
                )
            )
        )
    ));
}
```

- 在 `type` 那我們設定 `imagemap`，代表訊息類型為圖片地圖。
- 在 `baseUrl` 那可以自行修改成您想讓機器人回復的圖片。
***PS：圖片網址結尾必須包含圖片的像素，例如 https://api.reh.tw/line/bot/example/assets/images/example/1040 、網址最大 1000 個字符***
- 在 `altText` 那可以自行修改成您想讓機器人回復圖片地圖的替代文字。
***文字最大 400 個字元***
- 在 `baseSize.width` 那設定為 1040 像素。
- 在 `baseSize.height` 那設定為 1040 像素。
- 判斷式中的 `$message['text']` 為使用者傳送的文字，您可自行修改判斷式。

官方文檔：https://devdocs.line.me/en/#imagemap-message

------------

### 未完成...