<?php
is_numeric('aa');//
echo round(2.4);
echo ceil(2.4);//向上取整
echo floor(2.4);//向下取整
print_r(range('a', 'g'));
//echo mt_rand(10, 100);

function pick_color()
{
    $colors = ['red', 'orange', 'yellow', 'blue', 'green', 'indigo'];
    $i = mt_rand(0, count($colors) - 1);
    return $colors[$i];
}
mt_srand(34543);
echo pick_color();
echo pick_color();

$ads = ['ford' => 1111, 'att' => 333, 'ib' => 2222];
echo log(10, 2);//对数
echo exp(2); //幂
echo pow(4, 2); //某个数幂
echo number_format(123.56);
$num = 1234.45;
//$usa = new NumberFormatter('en-US', NumberFormatter::CURRENCY);
//$formatted1 = $usa->format($num);
//sin() cos() tan() asin() acos() atan()
$hex = 'a1';
echo base_convert($hex, 16, 2);//进制转换
bindec(110011);//2 -> 10
octdec(33);//8 -> 10
hexdec('1b');//16->10
//decbin(), decoct(), dechex()

function sphere_distance($lat1, $lon1, $lat2, $lon2, $radius=6378.135)
{
    $rad = doubleval(M_PI/180);
    $lat1 = doubleval($lat1) * $rad;
    $lon1 = doubleval($lon1) * $rad;
    $lat2 = doubleval($lat2) * $rad;
    $lon2 = doubleval($lon2) * $rad;
    $theta = $lon2 - $lon1;
    $dist = acos(sin($lat1) * sin($lat2) + cos($lat1) * cos($lat2) * cos($theta));
    if($dist < 0) {$dist += M_PI; }
    return $dist = $dist * $radius;
}

$lat1 = 40.858704;
$lon1 = -73.928532;
$lat2 = 37.758434;
$lon2 = -122.435126;
echo sphere_distance($lat1, $lon1, $lat2, $lon2), '<br/>';

date_default_timezone_set('Asia/Shanghai');//设置默认时间
//$when = new DateTime();
print_r(getdate());
print_r(localtime());

//一周 月或某年天 date()
//d 一个月哪天 j 一个月那天 z一年哪天 N一周哪天 w一周哪一天 S一个月第几天 D星期缩写 l星期全名 W周
echo date('l');
var_dump(checkdate(3, 10, 1993));//是否是合法日期

$even = range(2, 52, 2);
echo '<pre/>';
print_r($even);
echo count($even);
$animals = ['ant', 'bee', 'cat', 'dog', 'elk', 'fox', 'elk'];
array_pad($animals, 7, '');
//array_splice($animals, 2, 2);
//array_shift($animals);
//array_pop($animals);
array_merge($animals, ['a', 'b']);
print_r($animals);
echo implode(',', $animals);//explode()
array_key_exists(1, $animals);//一个键是否在
in_array('ant', $animals);
echo array_search('cat', $animals);//值所在的位置
//max() min()
print_r(array_reverse($animals));
//sort 排序
//shuffle()随机排序
print_r(array_unique($animals));
//array_unique 并集 array_intersect 交集 array_diff差集
var_dump(isset($animals));
serialize($animals);
unserialize('');
//json_encode() json_decode()
//闭包例子
$increment = 7;
$add = function($i, $j) use ($increment) {
    return $i + $j + $increment;
};

echo $add(12,2);
