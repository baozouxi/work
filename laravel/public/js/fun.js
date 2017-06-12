/*
 * LazyLoad.js(['a.js','b.js','c.js'], function(){
 * 		console.log('js加载完毕');
 * }, scope);
 *
 * LazyLoad.css(['a.css','b.css','c.css'], function(){
 * 		console.log('css加载完毕');
 * }, scope);
 *
 */

LazyLoad = function (win) {
	var list1,
	list2,
	hash = {},
	isIE = /*@cc_on!@*/
		!1,
	doc = win.document,
	head = doc.getElementsByTagName('head')[0];

	function createEl(type, attrs) {
		var el = doc.createElement(type),
		attr;
		for (attr in attrs) {
			el.setAttribute(attr, attrs[attr]);
		}
		return el;
	}
	function jsDone(obj) {
		hash[obj.url] = true;
		list1.shift();
		if (!list1.length) {
			obj.fn.call(obj.scope);
		}
	}
	function cssDone(obj) {
		hash[obj.url] = true;
		list2.shift();
		if (!list2.length) {
			obj.fn.call(obj.scope);
		}
	}
	function load(type, urls, fn, scope) {
		var obj = {
			scope : scope || win,
			fn : fn
		};
		var list = [].concat(urls);
		type == 'js' ? list1 = list : list2 = list;
		for (var i = 0, len = urls.length; i < len; i++) {
			var el,
			url = urls[i];

			// 已经加载过的不再加载
			if (hash[url]) {
				alert('warning: ' + url + ' has loaded!');
				return;
			}
			if (type == 'js') {
				el = createEl('script', {
						src : url
					});
			} else {
				el = createEl('link', {
						href : url,
						rel : 'stylesheet',
						type : 'text/css'
					});
			}

			(function (url) {
				if (isIE) {
					obj.url = arguments.callee.url;
					el.onreadystatechange = function () {
						var readyState = this.readyState;
						if (readyState == 'loaded' || readyState == 'complete') {
							this.onreadystatechange = null;
							obj.url = url;
							type == 'js' ? jsDone(obj) : cssDone(obj);
						}
					}
				} else {
					if (type == 'js') {
						el.onload = el.onerror = function () {
							obj.url = url;
							jsDone(obj);
						};
					} else {
						setTimeout(function () {
							obj.url = url;
							cssDone(obj);
						}, 50 * len);
					}
				}
			})(url);
			head.appendChild(el);
		}
	}
	return {
		js : function (type, urls, fn, scope) {
			load('js', type, urls, fn, scope);
		},
		css : function (type, urls, fn, scope) {
			load('css', type, urls, fn, scope);
		}
	};
}
(this);

//获取当前引用路径
var nowurl=document.getElementsByTagName("script")[0].src;
	nowurl=nowurl.substr(0,nowurl.indexOf("fun.js"))
	
//简化ID获取
function $(id) {
	return document.getElementById(id);
}

//检测DIV是否存在
function exist(id) {
	if ($(id)) {
		return true
	} else {
		return false
	}
}

//加载CSS
LazyLoad.css(['/css/editor/tiny.css'], function () {});

//加载JS
var js_ary = [
	'/js/ajax.js',
	'/js/geo.js',
	'/js/sys.js',
	'/js/DatePicker/WdatePicker.js',
	'/js/editor/tiny.js'
];
//JS加载完成
LazyLoad.js(js_ary, function () {
	
	//窗体加载完成
	window.onload = function () {

		//执行回调 时间加了个时间差
		//if(exist('call_dbbak')){window.setTimeout("dbbak()",100);}else{window.setTimeout("now_tip()",100);}
		//if(exist('call_weather')){window.setTimeout("weather()",200);}
		//if(exist('call_track')){window.setTimeout("track()",300);}
		//if(exist('call_local')){window.setTimeout("$('call_local').click()",50);}
		//if(exist('this_user')){To('user.asp?act=pass');}
	}
	
	//改变F5刷新区域 
	window.document.onkeydown=function(event){
		var e = event || window.event || arguments.callee.caller.arguments[0];
		var c=e.keyCode||e.which||e.charCode;

		//改变后退属性 不包含输入框
		if(document.activeElement.type == "text"||document.activeElement.type == "textarea"||document.activeElement.type == "password"){
			if(c==116){return false;}
		}else{
			//if(c==116){To($("this_url").value);return false;}
			if(c==8){if (exist('ref_url')){To($("ref_url").getAttribute("url"),"main");return false;}else{return false;}}
		}
		if ((e.ctrlKey)&&(c==78)){e.returnvalue=false;return false;}
	} 
});

window.onerror=function(){return!0};