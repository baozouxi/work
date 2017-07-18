<?php

namespace App\Http\Controllers\Sms;

use App\Http\Controllers\SmsApi;
use App\Http\Controllers\Controller;
use App\Models\Sms;
use Illuminate\Http\Request;
use Log;

class SmsController extends Controller {

	public function index() 
	{
		$sms_data = Sms::all();
		return view('Sms.index', ['data'=>$sms_data]);
	}

	public function create(Request $req) 
	{
		dd($req->path());
		$csrf = csrf_field();
		$submit_url = route('sms.store');
		return <<<SSS
		<form id="form_sub" name="form_sub" method="post" action="javascript:fastP('{$submit_url}');">
		    <label class="inline">手机号码<span>群发使用“|”分割,最多五条</span></label>
		    <input type="text" name="phone" id="phone" class="input" value="" style="width:565px;" autocomplete="off" disableautocomplete onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';this.style.backgroundImage='none';" />
		    <label class="inline">短信内容<span>可用短信<em>0</em>条</span></label>
		    <textarea name="content" id="content" class="textarea" style="width:565px;height:100px;" onblur="this.style.backgroundColor='#fff';" onfocus="this.style.backgroundColor='#FFFEF1';"></textarea>
		    <label class="inline"></label>
		    <div name="msg" id="msg" style="width:552px;" class="msg">请稍后..</div>
		    <label class="inline"></label>
			{$csrf}
		    <button type="submit" id="submit" class="submit"><span class="icon">&#379;</span>提交</button>
		    <button type="button" onclick="closeshow();" class="button"><span class="icon">&#378;</span>关闭</button>
		</form>
SSS;
	}

	//因发送短信属于费时操作  顾采用异步发送  将发送数据存于数据库  并加上发送标志  在异步操作中 若发送成功  则改变发送标志
	public function store(Request $req) 
	{
		Log::error('异步短信方法调用失败');	
		$this->validate($req, [
			'phone' => 'string|required|min:11',
			'content' => 'string|required|min:10',
		]);
		$tel_arr = explode('|', $req->phone);
		// 过滤
		$pattern = '/^(13|17|15|18)\d{1}\d{4}\d{4}/';
		$tel_arr = array_filter($tel_arr, function ($v) use ($pattern) {
			if (preg_match($pattern, $v, $match) > 0) {
				return true;
			}
			return false;
		});
		$tel_arr = array_unique($tel_arr);
		$insert_arr = [];
		$admin_id = '1';
		foreach ($tel_arr as $key => $tel) {
			$insert_arr[$key]['phone'] = $tel;
			$insert_arr[$key]['content'] = $req->content;
			$insert_arr[$key]['admin_id'] = $admin_id;
		}

		if (Sms::insert($insert_arr)) {

			//异步发送短信 返回发送成功
			$out = "GET /sms/async-send/$admin_id HTTP/1.1\r\n";
			$out .= "Host: c.com\r\n";
			$out .= "Connection: Close\r\n\r\n";
			$fp = fsockopen('c.com', 80, $error, $errstr);
			if ($fp) {
				fwrite($fp, $out);
				fclose($fp);
			} else {
				Log::error('异步短信模块资源打开失败');
			}

			return ['code' => '-4', 'msg' => route('sms.index'), 'time' => getNow()];
		}

		return ['code'=>'1', 'msg'=>'短信发送失败，请重试', 'time'=>getNow()];

	}

	//异步调用
	public function asyncSend(Request $req) 
	{
		$admin_id = $req->admin_id;
		$takes = Sms::where('admin_id', $admin_id)->where('send_status', '0')->get();
		
		foreach ($takes as $take) {
			$status = SmsApi::send(['m'=>$take->phone, 'c'=>$take->content]);
			dump($status);
			$take->send_time = date('Y-m-d', time());
			if ($status['status'] == '0') {
				$take->send_status = '1';
				$take->save();
				continue;
			}

			$take->send_status = '2';
			$take->error = $status['msg'];
			$take->save();
		}

	}

	public function delete($id)
	{
		
	}

}




