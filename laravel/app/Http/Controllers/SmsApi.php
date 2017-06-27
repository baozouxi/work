<?php

namespace App\Http\Controllers;

class SmsApi
{
	public static $apiUrl = 'https://api.smsbao.com/sms?';
	public static $user = '123456';
	public static $pass = '12asada';
	public static $error = ["0" => "短信发送成功",
							"-1" => "参数不全",
							"-2" => "服务器空间不支持,请确认支持curl或者fsocket，联系您的空间商解决或者更换空间！",
							"30" => "密码错误",
							"40" => "账号不存在",
							"41" => "余额不足",
							"42" => "帐户已过期",
							"43" => "IP地址限制",
							"50" => "内容含有敏感词"];

	/**
	 * 发送短信
	 * @param  [array] $data [待发送数据 格式：['phone'=>'133', 'content'=>'***']]
	 * @return void       [description]
	 */	
	static public function send($data)
	{
		$data = (array) $data;
		if(!isset($data['m']) || !isset($data['c'])){
			return;
		}
		$data['c'] = urlencode($data['c']);
		$data['u'] = self::$user;
		$data['p'] = self::$pass;
		$query = http_build_query($data);
		$status = file_get_contents(self::$apiUrl.$query);
		if($status == '0') return ['status'=>'0'];
		return ['status'=>$status, 'msg'=>self::$error[$status]];
	}

}

