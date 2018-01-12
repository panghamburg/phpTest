<?php
function bar_chart($question, $answers)
{
    $colors = [0xFF6600, 0x009900, 0x3333CC, 0xFF0033, 0xFFFF00, 0x66FFFF, 0x9900CC];
    $total = array_sum($answers['votes']);
    //定义间隔值
    $padding = 5;
    $line_width = 20;
    $scale = $line_width * 7.5;
    $bar_height = 10;
    $x = $y = $padding;
    //分配大区域
    $image = imagecreatetruecolor(150, 500);
    imagefilledrectangle($image, 0, 0, 149, 499, 0xE0E0E0);
    $black = 0x000000;
    //输出问题
    $wrapped = explode("\n", wordwrap($question, $line_width));
    foreach($wrapped as $line) {
        imagestring($image, 3, $x, $y, $line, $black);
        $y += 12;
    }
    $y += $padding;
    //输出答案
    for ($i = 0; $i < count($answers['answer']); $i++) {
        //格式化百分比
        $percent = sprintf('%1.1f', 100*$answers['votes'][$i]/$total);
        $bar = sprintf('%d', $scale*$answers['votes'][$i]/$total);
        //获取颜色
        $c = $i % count($colors);
        $text_color = $colors[$c];
        //绘制直条和百分比
        imagefilledrectangle($image, $x, $y, $x + $bar, $y + $bar_height, $text_color);
        imagestring($image, 3, $x+$bar+$padding, $y, "$percent%", $black);
        $y += 12;
        //输出答案
        $wrapped = explode("\n", wordwrap($answers['answer'][$i], $line_width));
        foreach ($wrapped as $line) {
            imagestring($image, 2, $x, $y, $line, $black);
            $y += 12;
        }
        $y += 7;
    }
    //复制图像完成
    $chart = imagecreatetruecolor(150, $y);
    imagecopy($chart, $image, 0, 0, 0, 0, 150, $y);
    $chart = imagecrop($image, [
        'x' => 0,
        'y' => 0,
        'width' => 150,
        'height' => $y
    ]);
    //提供图像
    header('Content-type: image/png');
    imagepng($chart);
    //清理
    imagedestroy($image);
    imagedestroy($chart);
}

$question = 'What a piece of work is man';
$answers['answer'][] = 'Noble in reason';
$answers['votes'][] = 2;
$answers['answer'][] = 'Infinite in faculty';
$answers['votes'][] = 10;
$answers['answer'][] = 'In form , in moving, how express and adminirable';
$answers['votes'][] = 30;
$answers['answer'][] = 'In action how like an angel';
$answers['votes'][] = 45;
$answers['answer'][] = 'In action how like an angel';
$answers['votes'][] = 13;

bar_chart($question, $answers);

//
htmlentities('');
//对数据库转义