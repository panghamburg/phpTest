<?php
$image = 'http://light-school.oss-cn-qingdao.aliyuncs.com/APP/cust/images/s512X512.png';
$file = 'D:\phpStudy\WWW\otherCode\test';
function download($image, $path)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $image);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
    $file = curl_exec($ch);
    curl_close($ch);
    $filename = pathinfo($image, PATHINFO_BASENAME);
    $file_path = $path.'/'.$filename;
    $resource = fopen($file_path, 'a');
    fwrite($resource, $file);
    fclose($resource);
    return $file_path;
}

function deleteImage($file)
{
    if(is_readable($file) != false) {
        return unlink($file);
    }
}
//download($image, $file);
var_dump(deleteImage('D:\phpStudy\WWW\otherCode\test\s512X512.png'));