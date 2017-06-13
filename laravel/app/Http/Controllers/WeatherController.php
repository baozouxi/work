<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
	/**
	 * 页面内天气接口
	 * @return [type] [description]
	 */
    public function index()
    {
    	$ip  = $_SERVER['REMOTE_ADDR'];
    	$url = "http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=Json&ip=".$ip;

     	//获取位置信息
     	$cu = curl_init($url);
     	curl_setopt($cu, CURLOPT_RETURNTRANSFER, 1);
     	$cityInfo = curl_exec($cu);
     	$city = json_decode($cityInfo,1)['city'];
     	
     	//获取天气信息
     	$url = 'http://api.jirengu.com/weather.php?city='.$city;
     	curl_setopt($cu, CURLOPT_URL, $url);
     	$weatherInfo = json_decode(curl_exec($cu), 1);
     	$weather = $weatherInfo['results']['0']['weather_data']['0'];
     	$des     = $weatherInfo['results']['0']['index']['0']['des'];
     	curl_close($cu);
 		$time = date('Y-m-d H:i:s');


        //图片数组尚未完成    待续


     	// 返回信息
    	return <<<SSS
			{"code":1,"msg":"<script>$('sidebar').style.backgroundImage='url(\"http://cdn.ehis.cc/2.3/weather/13.png\")';</script><b>$city</b> {$weather['date']} {$weather['weather']} {$weather['temperature']} ℃，{$weather['wind']}，$des","time":"$time"}
SSS;
    }
}
