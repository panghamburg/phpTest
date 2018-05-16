<?php
/**
 * 一些radis记录
 * Created by PhpStorm.
 * User: XX-a
 * Date: 2018/3/9
 * Time: 16:41
 */
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

//字符串
$redis->set('cat', 111);
$redis->get('cat');
//列表
$redis->lPush('list', 'html');//左侧加入
$redis->lPush('list', 'css');
$redis->lPush('list', 'php');
$list = $redis->lRange('list', 0, -1);//查看
print_r($list);
$redis->rPush('list', 'mysql');//右侧加入
$redis->lPop('list');//左侧弹出
$redis->rPop('list');//右侧弹出
$redis->lSize('list');//列表长度
$redis->lGet('list', 2);
$redis->lIndex('list', 2);
$redis->lRange('list', 1, 2);//start end 之间的元素
$redis->lGetRange('list', 1, 2);
$redis->lTrim('list', 0, 1);//截取后其他元素删除
//Hash 哈希
$redis->hSet('hash', 'cat', 'cat');
$redis->hSet('hash', 'cat', 'cat');
$redis->hSet('hash', 'cat', 'cat');
$redis->hGet('hash', 'cat');
$arr = $redis->hKeys('hash');//获取hash中的所有keys