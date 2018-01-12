<?php
/**
 * 正则用到的函数
 * preg_filter($pattern正则, $replacement(替换内容), $subject(原内容))执行一个正则表达式搜索和替换
 * preg_replace($pattern, $replacement, $subject) 作用同上 返回结果不同
 * preg_grep($pattern, $input数组)返回匹配模式的数组条目
 * preg_last_error()返回最后一个PCRE正则执行产生的错误代码
 * PREG_NO_ERROR,PREG_INTERNAL_ERROR,PREG_BACKTRACK_LIMIT_ERROR,PREG_RECURSION_LIMIT_ERROR,PREG_BAD_UTF8_ERROR,PREG_BAD_UTF8_OFFSET_ERROR,PREG_JIT_STACKLIMIT_ERROR
 * preg_match_all($pattern, $subject, $matches,flags)执行一个全局正则表达式匹配
 * preg_match($pattern, $subject, $matches,flags)执行匹配正则表达式
 * preg_quote(str,delimiter) 转义正则表达式字符
 * preg_replace_callback($pattern, $callback, $subject, limit(默认-1无限), count)执行一个正则表达式搜索并且使用一个回调进行替换
 * preg_split($pattern, $subject, limit, flags)通过一个正则表达式分隔字符串
 */

/**
 * preg_match(表达式, 字符串内容, 搜索结果array, PREG_OFFSET_CAPTURE)
 * 第一次匹配成功后就会停止匹配
 */
preg_match('/(foo)/', 'faobarbaz', $matches, PREG_OFFSET_CAPTURE);
print_r($matches);
//url
preg_match("/^(http:\/\/)?([^\/]+)/i", 'http://www.baidu.com/search.', $matches);
$host = $matches[2];
preg_match('/[^\.\/]+\.[^\.\/]+$/', $host, $matches);
print_r($matches[0]);
/**
 * preg_split
 */
$keywords = preg_split("/[\s,]+/", 'hello world ,too');
print_r($keywords);
$chars = preg_split("//", 'string', -1, PREG_SPLIT_NO_EMPTY);
print_r($chars);

$string = 'send personal email to ben@forta.com or ben.forta@forta.com if your about message email ben@urgent.forta.com Se';
preg_match_all("/[\w.]+@[\w.]+\.\w+/", $string, $matches);
echo '<pre/>';
print_r($matches);

$url = 'http://www.forta.com or https://www.forta.cn.com';
preg_match_all("/http[s]?:\/\/[\w.]+/", $url, $matches);
print_r($matches);

preg_match_all("/[sS][^l]/", $string, $matches);
print_r($matches);

$str1 = '03-11-29 03/11/29 03.11.29';
preg_match_all('/03[.-\/]11[.-\/]29/', $str1, $matches);
print_r($matches);

$str2 = 'From Subject Date, hello he1232';
preg_match_all('/\b[A-Za-z]+\b/', $str2, $matches);//单词为单位
print_r($matches);

$str3 = '$33.2345678';
preg_match('/\$[0-9]+(\.[0-9])/', $str3, $matches);
print_r($matches);

$url1 = 'http://www.runoob.com:80/html/html-tutorial.html';
//preg_match_all('/(\w+)\:\/\/([^\:]+)(:\d*)?([^# ]*)/', $url1, $matches);
preg_match('/http:\/\/(.+)\:(?:\d*)\/*/', $url1, $matches);
print_r($matches);

$str4 = 'sales1.xls orders3.xls sales2.xls na1.xls sa1.xls na.xls sales.xls';
preg_match_all('/\b[ns]a(.*?)[^0-9]\.xls\b/', $str4, $matches);
print_r($matches);

$str5 = '<meta content="text/html; charset=utf-8" http-equiv="content-type"> ';
//preg_match('/<meta[^>]*?charset=([^"]+)"/', $str5, $matches);
preg_match('/charset=(.*?)"/', $str5, $matches);
//preg_match_all('/()/', $str5, $matches);
print_r($matches);

$str6 = '<p>xls orders3</p>';
preg_match_all('/<([^>]+)/', $str6, $matches);
print_r($matches);
