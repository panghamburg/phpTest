<?php
include "CurlTool.php";

print_r(http_build_query([
    'start' => 11,
    'count' => 12]));

$http_query = new CurlTool();
$query = [
    'teacher_id' => 36,
];
$query_1 = [
    'school_key' => 'jskdjfweji8787',
];
$get_query = $http_query->get('app.lbj.bd/teacher/info', $query);
$post_query = $http_query->post('api.school.bd/v1/signups', [], $query_1);
echo '<pre/>';
print_r($get_query);
print_r($post_query);