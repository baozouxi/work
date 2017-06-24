<?php

namespace App\Http\Controllers\Sms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SmsController extends Controller
{
    
    public function index()
    {
    	return view('Sms.index');
    }


    public function create()
    {
    	$csrf = csrf_field();
    	$submit_url =  route('sms.store');
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
    	$this->validate($req, [
    		'phone' => 'string|required|min:11',
    		'content' => 'string|required|min:10'
    		]);

    	$tel_arr = explode('|', $req->phone);
    	// 过滤
    	$pattern = '/^(13|17|15|18)\d{1}\d{4}\d{4}/';
    	$tel_arr = array_filter($tel_arr,function($v)use($pattern){
    		if (preg_match($pattern, $v, $match) > 0 ) {
    			return true;
    		}
    		return false;
    	});
    	$tel_arr = array_unique($tel_arr);
    	
    }

    public function save()
    {

    }


}
