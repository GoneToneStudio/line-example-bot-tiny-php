<?php
$path = "../example.jpg"; // 圖片所在網址
$type = getimagesize($path); // 取得圖片資訊
switch($type[2]){ // 判斷圖片的類型
    case 1 : $img_type = "gif"; break;  
    case 2 : $img_type = "jpeg"; break;  
    case 3 : $img_type = "png"; break;  
}

header("Content-type: image/" . $img_type); // 設定圖檔格式

$percent = 1 / (1040 / 460); // 縮略圖比例 公式：1 / (原始圖大小 / 調整後大小)

// 縮略圖尺寸
list($width, $height) = getimagesize($path);
$newwidth = round($width * $percent);
$newheight = round($height * $percent);
$dst_im = imagecreatetruecolor($newwidth, $newheight);

if ($img_type == "jpeg"){
    $src_im = imagecreatefromjpeg($path);
    imagecopyresized($dst_im, $src_im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height); // 調整大小
    imagejpeg($dst_im); //輸出調整大小後的圖像
}
if ($img_type == "png"){
    $src_im = imagecreatefrompng($path);
    imagecopyresized($dst_im, $src_im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height); // 調整大小
    imagepng($dst_im); //輸出調整大小後的圖像
}
if ($img_type == "gif"){
    $src_im = imagecreatefromgif($path);
    imagecopyresized($dst_im, $src_im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height); // 調整大小
    imagegif($dst_im); //輸出調整大小後的圖像
}

imagedestroy($dst_im);
imagedestroy($src_im);
?>