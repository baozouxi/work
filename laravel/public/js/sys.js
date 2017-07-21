//系统JS文件，不熟悉不要修改！alert(height)	

//##################################################共用##############################################################

//小图标
var loadimg="<img src='../img/ajax.gif' style='width: 14px;vertical-align:middle;border:0;'>"
var icon= "<i class='icon'>&#377;</i> " 
//显示隐藏
function hide(id) {
	$(id).style.display = 'none';
}
function show(id) {
	$(id).style.display = 'block';
}
function display(id) {
	var s = $(id).style;
	if (s.display == "block") {s.display = "none";}else{s.display = "block";}
}
function mom() {
	var b = $("main_db").style;
	var a = $("main_mom").style;
	if (a.display == "block"){a.display = "none";b.display = "block";}else{a.display = "block";b.display = "none";}
}


//AJAX弹出层操作
function msgbox(obj,width)
{
	//获取
	var url		= obj.getAttribute("url");
	var title	= obj.getAttribute("title");

	//默认
	if (!width) {width = 400;}
	if(!title)	{title="操作"}
	
	//显示加载层
	showline();
	
	//显示数据
	Ajax.request(url,{
			data:{req:Math.random()},
			success	:function(result){closeline();his_mask(0);if(url.substr(12,4)=="view"){result="<div class=\"chat_log\">"+result+"</div>";}_("his_show",title,result,width,0,1);},
			failure:function(xhr,msg){showline(msg)}
		});
}

//AJAX弹出层操作
function fastL(url)
{
	//显示加载层
	_("his_line",0,"请稍候...",250,40);
	
	//显示数据
	Ajax.json(url,{
			data:{req:Math.random()},
			success	:function(result){
				$("his_line").innerHTML =result.msg;
				//刷新和关闭
				if (result.code==0){
						setTimeout('closeline();', 1000);
					}else{
						setTimeout('closeline();To($("this_url").value);', 1000);
					}
				},
			failure:function(xhr,msg){alert(msg)}
		});
}

//AJAX弹出层操作
function fastB(url)
{
	//显示加载层
	_("his_line",0,"验证中...",250,40);
	
	//显示数据
	Ajax.json(url,{
			data:{req:Math.random()},
			success	:function(result){
				
				//刷新和关闭
				if (result.code==0){
						$("his_line").innerHTML = "登陆中....";window.location.href=result.msg;
					}else{
						$("his_line").innerHTML =result.msg;
						setTimeout('closeline();', 1500);
					}
				},
			failure:function(xhr,msg){alert(msg)}
		});
}

//快速设置提交
function fast(url, obj) {
	$(obj).innerHTML = loadimg;
	Ajax.json(url,{
			data:{req:Math.random()},
			success	:function(result){if(result.code==1&&obj.substr(0,3)=="del"){Del($("this_url").value);}else{$(obj).innerHTML = result.msg;}},
			failure:function(xhr,msg){alert(msg)}
		});
}



//快速删除 符合laravel
function fastDel(url, obj,csrf_token) {
	$(obj).innerHTML = loadimg;
	Ajax.json(url,{
			method:"post",
			data:{_method:'DELETE', _token:csrf_token},
			success	:function(result){if(result.code==1&&obj.substr(0,3)=="del"){Del($("this_url").value);}else{$(obj).innerHTML = result.msg;}},
			failure:function(xhr,msg){alert(msg)}
		});
}

//AJAX快速提交 post
function fastP(url,n){
	var m = $('msg_box'),sb=$('submit_box'),dt = 'form_box';
	if (!n){m = $('msg');sb=$('submit');dt = 'form_sub';}
	if (typeof(instance) !== 'undefined'){instance.post();}
		m.style.display = 'block';
		m.innerHTML = '正在提交....';
		sb.disabled = false;
	Ajax.json(url,{
		method:"POST",
		type:"json",
		data:formToHash(dt),
		success	:function(result){
			var t=result.code;
			var s=result.msg;
			//CODE 错误提示 RES新增了高级属性，所以加了个判断，后续可以优化下
			if (t>0){sb.disabled = false;m.innerHTML =icon + s;if(result.field.length>0){if (url.substr(0,3)=="res"){setTab(0);};focus($(result.field));}}
			if(t==0){To(s,"main");}

			//下面情况比较少
			if(t==-1){m.innerHTML =icon + s;if(result.hasOwnProperty("field")){setTimeout('To("'+result.field+'","main");',500);}else{setTimeout('closeshow();',500);}}
			if(t==-2){m.innerHTML =icon + s;setvalue('key',result.field)}//生成密钥使用
			if(t==-3){m.innerHTML =icon + s;if(result.hasOwnProperty("field")){setTimeout('window.location.href="/login/exit";',2000)}else{sb.disabled = false;setTimeout('hide("msg");',1500);}}//修改密码使用
			if(t==-4){m.innerHTML =icon + s;closeshow();To($("this_url").value, 'main');}//快速提交 返回
			if(t==-5){m.innerHTML =icon + s;setTimeout('To($("this_url").value);closeshow();',500);}//MSBOX表格属性
			},
		// failure:function(xhr,msg){sb.disabled = false;alert(msg)}
		 failure:function(xhr, msg){
		 	if (xhr.status == 422) {
		 		//转换为对象
		 		ajaxobj=eval("("+xhr.responseText+")");
		 		var errorList = {
		 			'name' : '姓名错误，请输入真实的姓名',
		 			'age'  : '年龄错误，请输入1-99之间的数字',
		 			'phone': '手机号码错误，输入正确的手机号码',
		 			'postdate' : '预约时间不能为空',
		 			'province' : '地区错误，请选择省份',
		 			'city' : '地区错误，请选择城市',
		 			'town' : '地区错误，请选择地区',
		 			'content' : '备注信息不能小于10个字符',
		 			'dose' : '请输入正确的用药量',
		 			'check_cost' : '请输入正确的用检查费用',
		 			'treatment_cost' : '请输入正确的用治疗费用',
		 			'hospitalzation_cost' : '请输入正确的住院费用',
		 			'drug_cost' : '请输入正确的药品费用',
		 			'doctor': '请选择医生',
		 			'bid': '病历号不能为空',
		 			'track_time': '回访时间格式错误，日期应该大于等于今天',
		 			'role_id': '请选择正确的角色组',
		 			'username': '昵称格式错误，最少5个字符串',
		 			'qq': 'QQ格式错误，最少5个字符串',
		 			'nickname' : '请输入正确的中文名称',
		 			'oldpass' : '请输入正确的原密码',
		 			'password' : '请输入正确的新密码'
		 		}
		 		for(var key in ajaxobj){
		 			sb.disabled = false;m.innerHTML =icon + errorList[key];focus($(key));//if(result.field.length>0){setTab(0);}
		 			break;
		 			// alert(errorList[key]);
		 		}


		 	}
		 	

		 }
	});
}

//快速显示
function fastC(o,id) {
	var obj="_info"+id;
	if ($(obj).style.display == "none") {
		$(obj).style.display = "";
		var str="info"+id;
			$(str).innerHTML = loadimg + "加载中...";
		var url	= o.getAttribute("url");
		Ajax.request(url,{
				data:{req:Math.random()},
				success	:function(result){$(str).innerHTML = result;},
				failure:function(xhr,msg){alert(msg)}
			});
	}else{
		$(obj).style.display = "none";
	}
}

//快速查找
function fastK(e,o){
	var fb,db;
	var url = e.getAttribute("action");
	if (o=="key"){
		fb="form_key";
		if($(o).value==""){
			showline('请输入姓名、预约号或手机尾号进行搜索！');
			return false;
		}else{
			url = url + $(o).value;
			set_title('搜索<q>'+$(o).value+'</q>');
		}
	}else{
		fb="form_date";
		if($(o).value==""){
			showline('请选择开始和结束日期，可单选开始日期！');
			return false;
		}else{	
			url = url+$(o).value+'/'+$('de').value;
			set_title('日期范围');
		}
	}
	var obj = "main";his_mask(obj,1);
	//加个随机数

	Ajax.request(url,{
			//data:formToHash(fb),
			success	:function(result){close_mask(obj);set_innerHTML(obj,result)},
			failure:function(xhr,msg){alert(msg)}
		});
	return false;
}

//快速查看
function fastS(url, obj) {
	display(obj);$(obj).innerHTML = loadimg + "加载中，请稍候.....";
	Ajax.request(url,{
			data:{req:Math.random()},
			success	:function(result){$(obj).innerHTML = result;},
			failure:function(xhr,msg){alert(msg)}
		});
}

//快速获取
function fastH(e,obj){
	if(!obj){obj="box";}his_mask(obj,1);
	if(exist('wrap')){$('wrap').scrollTop=0;}
	var url=e.getAttribute("url");
	if(!url){url=e.getAttribute("href");}
	Ajax.request(url,{
			data:{req:Math.random()},
			success	:function(result){close_mask(obj);set_innerHTML(obj,result);},
			failure:function(xhr,msg){alert(msg)}
		});
	//return false;
}
//快速获取 下拉
function To(url,obj){
	if(!obj){obj="box";}his_mask(obj,1);
	Ajax.request(url,{
			data:{req:Math.random()},
			success	:function(result){close_mask(obj);set_innerHTML(obj,result);},
			failure:function(xhr,msg){alert(msg)}
		});
	return false;
}
//快速删除
function Del(url){
	Ajax.request(url,{
			data:{req:Math.random()},
			success	:function(result){$("box").innerHTML = result;},
			failure:function(xhr,msg){alert(msg)}
		});
}
//快速修改
function fastE(url, obj, id) {
	var CellText = $(obj + id).innerHTML,Eobj = "E" + obj + id;;
	if (CellText.substring(0, 6) != "<input") {
		CellText = CellText.replace(/<\/?[^>]*>/g, '');
		$(obj + id).innerHTML = "<input type=\"text\" class=\"edit\" id=\"" + Eobj + "\" value=\"" + CellText + "\" onblur=\"fastblur('" + url + "','" + obj + "','" + id + "',this)\" />";
		$(Eobj).select();
	}	
}
function fastblur(url, obj, id, thisText) {
	$(obj+ id).innerHTML = loadimg;
	url = url + '/' +thisText.value;
	Ajax.json(url,{
			//data:'act=' + obj + '&' + obj + '=' + thisText.value + '&id=' + id + "&req="+ Math.random(),
			success	:function(result){$(obj + id).innerHTML = result.msg;},
			failure:function(xhr,msg){alert(msg)}
		});
}

//后台登陆
function login(){
	var m = $('login-box'),sb=$('submit');
		m.style.backgroundImage="url(/img/login.gif)"; 
		m.style.backgroundRepeat = "no-repeat"
		m.style.backgroundPositionX="center"; 
		m.style.backgroundPositionY="bottom"; 
	sb.disabled = true;
	Ajax.json("/login",{
		method:"POST",
		data:formToHash('form_sub'),
		success	:function(result){
			if (result.code>0){
				m.style.backgroundImage=""; 
				sb.disabled = false;
				alert(result.msg);
				if (result.code==5||result.code==6){
					show("code");
					};
				if(result.field.length>0){
					focus($(result.field));
					}
				}else{
				location.href=result.msg;
			}
		},
		failure:function(xhr,msg){
			if(msg==422){
				alert('用户名，密码错误');
			}
		}
	});
}

//验证码获取
function Getcode(url,obj){
	var o=$(obj)
	Ajax.json(url,{
		data:'act=code&' + obj + '=' + o.value + '&req=' + Math.random(),
		success	:function(result){
			switch(obj){
			case "sphone":
				alert(result.msg);
				if(result.code==0){o.readOnly=false;focus(o);}else{o.readOnly=true;focus($('code'));}
				break;
			case "qq_tmp":
				if(result.code==0){o.readOnly=false;focus(o);alert(result.msg);}else{o.readOnly=true;setvalue('qq_code',result.msg);}
				break;
			default	:
				alert(result.msg);
				focus($('keycode'));
			}
		
		},
		failure:function(xhr,msg){alert(msg);}
	});
}

//验证码获取
function Getsms(obj,str){
	var o=$(obj);
	if (o.value.length==0){alert("请输入号码！");focus(o);return false;}
	if(o.value==""+str+""){
		alert('请输入新号码,不修改请关闭！');
		o.readOnly=false;
		focus(o);
	}else{
		Getcode('user.asp',''+obj+'');
		}
}

//验证字段
function check(url,obj,id){
	var str = $(obj).value;
	if (str.length>0){	
		Ajax.json(url,{
			success	:function(result){
				var o =  $(obj);
				if (result.code==0){o.style.borderColor="#aaa";o.style.color="#333";}else{o.style.borderColor="red";o.style.color="red";o.style.backgroundImage="url(/img/cf.gif)";o.style.backgroundRepeat = "no-repeat";o.style.backgroundPosition="center right";}
			},
			failure:function(xhr,msg){alert(msg);}
		});
	}
}


// //验证PHONE
// function check_phone(){
// 	var str = $("phone").value;
// 	if (str.length>0){	
// 		Ajax.json("call_back.asp",{
// 			success	:function(result){
// 				var msg='phone_city';
// 				$(msg).innerHTML = result.msg;
// 			},
// 			failure:function(xhr,msg){alert(msg);}
// 		});
// 	}
// }

//验证PHONE
function check_phone(){
	var str = $("phone").value;
        var istel=/^(?:13\d|18\d|15\d|17\d|14\d)\d{5}(\d{3}|\*{3})$/;
        if(!istel.test(str)){
         	$('phone_city').innerHTML = "请正确填写电话号码";return false;
        }        
		$('phone_city').innerHTML = "";
        return true;
}



//数据每天备份一次
function dbbak(){
	Ajax.json("call_back.asp",{
		data:{act:"dbbak",req:Math.random()},
		success	:function(result){if(result.code==0){$("call_dbbak").innerHTML = result.msg;}}
	});
}

//定时刷新小数字
function track(){
	Ajax.json("call_back.asp",{
		data:{act:"call",req:Math.random()},
		success	:function(result){$("call_track").innerHTML = result.msg;if(result.code==2){alert("你有"+result.field+"条新的回拨需要处理！");}window.setTimeout("track()",5120);}
	});
}

//验证QQ号码
function auto_qq(){
	Ajax.json("user.asp",{
		data:{act:"auto",req:Math.random()},
		success	:function(result){if(result.code==1){$("submit_box").click();}window.setTimeout("auto_qq()",500);}
	});
}

//定时刷新天气预报 需要可执行脚本
function weather(){
	Ajax.json("/weather",{
		data:{act:"weather",req:Math.random()},
		success	:function(result){set_innerHTML("call_weather",result.msg);window.setTimeout("weather()",3000000);}
		//success	:function(result){$("call_weather").innerHTML = result.msg;window.setTimeout("weather()",3000000);}
	});
}

//获取IP地址信息
function local(ip){
	Ajax.json("call_back.asp",{
		data:{act:"local",key:ip,req:Math.random()},
		success	:function(result){$("call_local").innerHTML = result.msg;}
	});
}

//定时刷新 MO修改
function now_tip1(){
	Ajax.json("/callback/checkNow",{
		data:{act:"now",req:Math.random()},
		success	:function(result){
			if(result.code==0){
				var id = '';
				for(var name in result){
					if(!result.hasOwnProperty(name)) continue;
					id = 'now_' + name;
					if (result[name]>0 && exist(id)){show(id);$(id).innerHTML = result[name];}
				}
				window.setTimeout(now_tip,9384);
			}else{location.reload();}
		}
	});
}

//定时刷新 MO修改
var tip_lists='res,turn,tel,cons,call,reply,track,take'.split(',');
function now_tip(){
	Ajax.json("/callback/checkNow",{
		data:{},
		success	:function(result){
			if(result.code==0){
				var id = '';
				for(var i=0;i<tip_lists.length;i++){
					id = 'now_' + tip_lists[i];
					if (exist(id)){
						if (result[tip_lists[i]]==0){
							hide(id);
						}else{
							show(id);
							$(id).innerHTML = result[tip_lists[i]];
						}
					}
				}
				//在后台首页同步刷新数据
				//if (exist('this_main')){To('main.asp?s=1','main');}
				window.setTimeout(now_tip,9384);
			}else{
				location.reload();
			}
		}
	});
}
//定时刷新 MO修改

function now_tip2(){
	Ajax.json("call_back.asp",{
		data:{act:"now",req:Math.random()},
		success	:function(result){
			var id = '';
			for(var i=0;i<lists.length;i++){
				id = 'now_' + lists[i];
				if (result[lists[i]]>0 && exist(id)){show(id);$(id).innerHTML = result[lists[i]];}else{hide(id);}
			}
			window.setTimeout(now_tip,10000);
		}
	});
}



//统计
function fastT(n,u,t,b,c,d,e){
	var a,url,menu=$("tab").getElementsByTagName("li");
	for(i=0;i<menu.length;i++){
		menu[i].className=i==n?"now":"";
		//功能
		switch(t){
			case 1	: a="time"	;break;
			case 2	: a="day"	;break;
			case 3	: a="week"	;break;
			case 4	: a="month"	;break;
			case 5	: a="dis";break;
			case 6	: a="dep"	;break;
			case 7	: a="area"	;break;
			case 8	: a="way"	;break;
			case 9	: a="age"	;break;
			case 10	: a="gender";break;
			default	: a="admin_id";
			}
		//地址
		switch(u){
			case 1	: url="stat_res.asp";break;
			case 2	: url="/patient/statistics/list";break;
			// case 3	: url="stat_rank.asp";break;
			// case 4	: url="stat_turn.asp";break;
			// case 5	: url="stat_take.asp";break;
			// default	: url="stat_res.asp";
			}
		}
	//设置默认值
	if (!b){b='';}else{b='&to='+b;}
	if (!c){c='';}else{c='&ds='+c;}
	if (!d){d='';}else{d='&de='+d;}

	//AJAX
	his_mask('box',1);
	Ajax.request(url,{
			data:'key='+a+b+c+d+e+ "&req="+ Math.random(),
			success	:function(result){close_mask('box');$("tablist").innerHTML = result;},
			failure:function(xhr,msg){alert(msg)}
		});
}

//统计
// function fastT(url,n,date='sta_date'){

// 	date = $(date).options[$(date).selectedIndex].value;

// 	var menu=$("tab").getElementsByTagName("li");
// 	for(i=0;i<menu.length;i++){

// 		menu[i].className=i==n?"now":"";

// 	}
// 	url = url + '?date='+date;
// 	//AJAX
// 	his_mask('box',1);
// 	Ajax.request(url,{
// 			//data:'act=stat_'+a+b+c+d+e+ "&req="+ Math.random(),
// 			success	:function(result){close_mask('box');$("tablist").innerHTML = result;},
// 			failure:function(xhr,msg){alert(msg)}
// 		});
// }



//快速关闭
function closeshow() {
	$('his_show').parentNode.removeChild($('his_show'));
	if ($('0_mask')) {
		$('0_mask').parentNode.removeChild($('0_mask'));
	}
}
function closeline() {
	$('his_line').parentNode.removeChild($('his_line'));
}
function close_mask(obj){
	$(obj + '_mask').parentNode.removeChild($(obj + '_mask'));
	if(exist(obj + '_str')){
		$(obj + '_str').parentNode.removeChild($(obj + '_str'));
	}
}
function showline(str){
	if (!str){_("his_line",0,"请稍候...",200,40);}else{_("his_line",0,str,250,40);setTimeout('closeline();', 1500);}
}
	
//透明层
function his_mask(obj,n) {
	var md=obj + "_mask",m = $(md);
	var sd=obj + "_str",s = $(sd);
	var c,x,o,w,h,t=0,l=0;

	//是否全屏
	if (obj==0)
	{	
		c='000';
		x=5;
		o=document.body;
		w=document.documentElement.scrollWidth;
		h=Math.max(document.documentElement.scrollHeight, document.documentElement.clientHeight);
	}else{
		c='FFF'
		x=3;
		o=$(obj);
		w=o.offsetWidth;
		h=o.offsetHeight;
		t=o.offsetTop;
		l=o.offsetLeft;
		if (obj=="box")
		{
			w=w-20;
			h=h-20;
			t=t+10;
			l=l+10;
		}
	}
	//透明层
	if (!m) {
		m = document.createElement("div");
		m.id = md;
		m.style.cssText = "position:absolute;left:0px;top:0px;background-color:#"+c+";filter:Alpha(opacity="+x+"0);opacity: 0."+x+"";
		o.appendChild(m);
		m.style.zIndex	= 10;
		m.style.display	= "block";
		m.style.width	= w + "px";
		m.style.height	= h + "px";
		if (obj=="box"){
			m.style.top		= t + "px";
			m.style.left	= l + "px";
		}
	}		
	else{
		m.style.display = "block";
	}

	//不透明层
	if(!n){n=0}
	if (n==1)
	{
		if (!s) {
		var s=document.createElement("div");
			s.id=sd;
			s.style.cssText = "position:absolute;left:0px;top:0px;background:url(../img/loading.gif) no-repeat center center;";
			o.appendChild(s);
			s.style.zIndex	= 100;
			s.style.width	= w + "px";
			s.style.height	= h + "px";
			if (obj=="box"){
				s.style.top		= t + "px";
				s.style.left	= l + "px";
			}
			//s.innerHTML = "<span style='float:left;background-color:#FF5454;color:#fff;padding:0 20px;height:40px;line-height:40px;display:block;'><i class='icon'>&#313;</i>加载中，请稍后</span>";
		}
		else{
			s.style.display = "block";
		}
	}
}

//层
function _(obj, title, content, width, height, o) {
	if ($(obj)) {
		var d = $(obj)
	} else {
		var d = document.createElement("div");
		d.id = obj;
		document.body.appendChild(d)
	}

	d.style.display = "block";
	d.style.position = 'absolute';
	if (obj == "his_line") {
		d.innerHTML = content
	} else {
		d.innerHTML = "<h4 id='his_title' onmousedown='Drag(this);'><span class='icon right' onmousedown='closeshow();'>&#378;</span>" + title + "</h4><div id='his_content' class='his_content'>" + content + "</div>"
		if (!height){height = $("his_content").offsetHeight + 40;}
		
	}
	d.style.width = width + "px";
	d.style.height = height + "px";
	var bt = Math.max(document.documentElement.scrollHeight, document.documentElement.clientHeight) - height;
	var bl = document.documentElement.clientWidth - width;
	var top = (bt / 2);
	var left = (bl / 2);
	if (top < 15){top = 20}
	d.style.top = top + "px";
	d.style.left = left + "px"
}
//移动
function Drag(o) {
		o = o.parentNode
	var e = window.event || arguments.callee.caller.arguments[0];
		e.stopPropagation ? e.stopPropagation() : e.cancelBubble = true;
	if (e.button == 1 || e.button == 0) {
		var XX = e.clientX - parseInt(o.offsetLeft);
		var YY = e.clientY - parseInt(o.offsetTop);
		var HH = Math.max(document.documentElement.scrollHeight, document.documentElement.clientHeight);
		var WW = document.documentElement.scrollWidth;
		var t = document.createElement("div");
			t.id = "his_temp";
			document.body.appendChild(t);
			t.style.height = o.offsetHeight - 2 + "px";
			t.style.width = o.offsetWidth - 2 + "px";
			t.style.top = o.offsetTop + "px";
			t.style.left = o.offsetLeft + "px";
			t.style.display = "block";
			t.style.position = 'absolute';
			t.style.zindex = 9999; ;
		document.onmousemove = function (e) {
			window.getSelection ? window.getSelection().removeAllRanges() : document.selection.empty();
			var e = window.event || e;
			var X = e.clientX - XX;
			var Y = e.clientY - YY;
			var W = WW - t.offsetWidth;
			var H = HH - t.offsetHeight;
			if (Y > 0 || X > 0) {
				if (Y >= H) {
					t.style.top = H + "px";
				} else {
					t.style.top = Y + "px";
				}
				if (X >= W) {
					t.style.left = W + "px";
				} else {
					t.style.left = X + "px";
				}
			}
			if (Y <= 0) {
				t.style.top = 0;
			}
			if (X <= 0) {
				t.style.left = 0;
			}
			t.setCapture();
		};
		document.onmouseup = function (e) {
			document.onmousemove = null;
			document.onmouseup = null;
			o.style.top = t.offsetTop + "px";
			o.style.left = t.offsetLeft + "px";
			t.parentNode.removeChild(t);
			t.releaseCapture();
		}
	}
}

//导航菜单
function nav(n){
	var menu=$("header").getElementsByTagName("li");
	for(i=0;i<menu.length;i++)
	{
		menu[i].className=i==n?"now":"";
		$('nav_'+i+'').style.display=i==n?"block":"none";
	}
}

//导航菜单左侧
function sidebar(n){
	var menu=$("sidebar").getElementsByTagName("ol");
	for(i=0;i<100;i++)
	{
		if(!$('bar_'+i+'')) continue;
		$('bar_'+i+'').style.display = (i==n)?"block":"none";
	}

}

//点中效果
function getChange(o,m) {
	var Par=$("sidebar").getElementsByTagName("a");
	if(m==1){Par=o.parentNode.parentNode.getElementsByTagName("a");}
	var menu=$("sidebar").getElementsByTagName("ol");
	for(i=0;i<Par.length;i++){Par[i].className="";}
	o.className="now";
	if (!m) { 
		for(j=0;j<100;j++){
			if(!$('bar_'+j+'')) continue;
			$('bar_'+j+'').style.display="none";
		}
	}
}

 //搜索切换
function fundisp() {
	var n = $('fun-n').style, s= $('fun-s').style;
	if (s.display == "none") {n.display = "none";s.display = "block";}else{n.display = "block";s.display = "none";}
}

//光标定位在最后
function focus(input){
	var val = input.value;
		input.focus();
	if(val.length>0){input.value = '';input.value = val;}
}

//快速输入
function setvalue(inp,val) {
	$(inp).value = val;
}
function set_title(val) {
	if (exist('guide')){$('guide').innerHTML = val;}
}
//执行返回脚本
function set_innerHTML(obj,html){
	$(obj).innerHTML = html; 
	 var hd = document.getElementsByTagName("head")[0];   
	 var re = /(?:<script([^>]*)?>)((\n|\r|.)*?)(?:<\/script>)/ig;   
	 var srcRe = /\ssrc=([\'\"])(.*?)\1/i;   
	 var typeRe = /\stype=([\'\"])(.*?)\1/i;   
	 var match;   
	 while(match = re.exec(html)){   
		  var attrs = match[1];   
		  var srcMatch = attrs ? attrs.match(srcRe) : false;   
		  if(srcMatch && srcMatch[2]){   
			   var s = document.createElement("script");   
			   s.src = srcMatch[2];   
			   var typeMatch = attrs.match(typeRe);   
			   if(typeMatch && typeMatch[2]){   
					s.type = typeMatch[2];   
			   }   
			   hd.appendChild(s);   
		   }else if(match[2] && match[2].length > 0){   
			   if(window.execScript) {   
					   window.execScript(match[2]);   
			   } else {   
					   window.eval(match[2]);   
			   }   
		  }   
	 }   
}
//复制
function copy(n,id){
	var str=$(n+id).innerHTML;
		str=str.replace(/<\/?[^>]*>/g,'');
		window.clipboardData.setData("Text",str);
		$("v"+n+id).innerHTML="已复制";
	}

function Copy(n){window.clipboardData.setData("Text",$(n).value);alert("已复制,直接在QQ信息窗口右键粘贴发送即可！");}


//自动调整框架结构
function AutoHeight() {
	back_result="true";
  if(navigator.userAgent.indexOf("MSIE 6")>0){
		var w= document.documentElement.scrollWidth;
		var h = Math.max(document.documentElement.scrollHeight, document.documentElement.clientHeight);
			$('wrap').style.width = (w-180)+'px';
			$('wrap').style.height= (h-150)+'px';
			$('sidebar').style.height = (h-80)+'px';
			$('footer').style.width = (w-180)+'px';
	}
}

//切换效果
function setTab(n){
	var menu=$("tab").getElementsByTagName("li");
	for(i=0;i<menu.length;i++)
	{
		menu[i].className=i==n?"now":"";
		$('list_'+i+'').style.display=i==n?"block":"none";
	}
}


//二级联动菜单
function getdis(){    
	var sltProvince=document.form_sub.provinces;   
	var sltdis=document.form_sub.dis;   
	var provincedis=dis[sltProvince.selectedIndex - 1];   
		sltdis.length=1;     
	for(var i=0;i<provincedis.length;i++){   
		var provincedbdis=provincedis[i].split(":")
			sltdis[i]=new Option(provincedbdis[1],provincedbdis[0]);   
	}
	var sltres=document.form_sub.res,sltdep=document.form_sub.dep;
		sltres.length=1,sltdep.length=1;
	var provinceres=res[sltProvince.selectedIndex - 1]; 
	for(var i=0;i<provinceres.length;i++){   
		var provincedbres=provinceres[i].split(":")
			sltres[i+1]=new Option(provincedbres[1],provincedbres[0]);
			sltdep[i]=new Option(provincedbres[1],provincedbres[0]); 
	}
}

//hash
function formToHash(form) {
	var hash = {},
		form = $(form),
		el;
	for (var i = 0, len = form.elements.length; i < len; i++) {
		el = form.elements[i];
		if (el.name == "" || el.disabled)
			continue;
		switch (el.tagName.toLowerCase()) {
		case "fieldset":
			break;
		case "input":
			switch (el.type.toLowerCase()) {
			case "radio":
				if (el.checked)
					hash[el.name] = el.value;
				break;
			case "checkbox":
				if (el.checked) {
					if (!hash[el.name]) {
						hash[el.name] = [el.value]
					} else {
						hash[el.name].push(el.value)
					}
				}
				break;
			case "button":
				break;
			case "image":
				break;
			default:
				hash[el.name] = el.value;
				break
			}
			break;
		case "select":
			if (el.multiple) {
				for (var j = 0, lens = el.options.length; j < lens; j++) {
					if (el.options[j].selected) {
						if (!hash[el.name]) {
							hash[el.name] = [el.options[j].value]
						} else {
							hash[el.name].push(el.options[j].value)
						}
					}
				}
			} else {
				hash[el.name] = el.value
			}
			break;
		default:
			hash[el.name] = el.value;
			break
		}
	}
	form = el = null;
	return hash
}