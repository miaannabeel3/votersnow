<?php
ini_set('max_execution_time', 30000);
ini_set('memory_limit', '512M');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$user      = $_REQUEST['id'];
$post_data = array(
    'supporterUserId' => $user,
    'supporteeUserId' => 'e508d579-5042-42b6-b86a-255a0399b1c4',
);
sleep(5);
addVote($post_data);
function addVote($post_data){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.coloros11.com/api/support');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($post_data));
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
    $headers = array();
    $headers[] = 'Authority: www.coloros11.com';
    $headers[] = 'Accept: application/json, text/plain, */*';
    $headers[] = 'User-Agent:  Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1';
    $headers[] = 'Content-Type: application/json;charset=UTF-8';
    $headers[] = 'Origin: https://www.coloros11.com';
    $headers[] = 'Sec-Fetch-Site: same-origin';
    $headers[] = 'Sec-Fetch-Mode: cors';
    $headers[] = 'Sec-Fetch-Dest: empty';
    $headers[] = 'Referer: https://www.coloros11.com/leaderboard';
    $headers[] = 'Accept-Language: en-US,en;q=0.9';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    echo $result;
}