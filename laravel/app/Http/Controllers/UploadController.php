<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class UploadController extends Controller
{


    public function index()
    {
        $files = File::all();
        $users = getAuxiliary()['users'];
        foreach ($files as $file) {
            $file->add_time = formatDate($file->add_time, 'Y-m-d H:i');
            $file->admin_id = isset($users[$file->admin_id]) ? $users[$file->admin_id] : '----' ;
            $file->size = round( $file->size/ 1000/1000, 2);
        }

        return view('uploadList', ['files'=>$files]);
    }

    public function upload(Request $req)
    {
        $file = $req->file('files1');
        if ($file->isValid()) {
            $originName =  $file->getClientOriginalName();
            $size = $file->getSize();
            $extension = $file -> getClientOriginalExtension();
            if(!in_array(strtoupper($extension), $this->getAllowExt())) return "<script>window.parent.$('uploadstate').innerHTML='<b>错误：</b><hr>文件类型不被允许：<i>".$originName."</i><br>如果是文本请直接粘贴到聊天记录框即可！';</script>";
            $filePath = 'storage/uploads/';
            $realPath = date('Y',time()).'/'.date('m',time()).'/'.date('d', time());
            $filePath = $filePath.$realPath;
            $newName = md5($originName).'.'.$extension;
            if ($path = $file->move($filePath,$newName)) {
                $fileObj = new File();
                $fileObj->path = $path;
                $fileObj->size = $size;
                $fileObj->hash = md5($originName);
                $fileObj->admin_id = '1';
                $fileObj->origin_name = $originName;
                if($fileObj->save()){
                    return "<script>window.parent.setvalue('filepath','".$realPath.'/'.$newName."');window.parent.closeshow();</script>";
                }else{
                    unlink($path);
                     return "<script>window.parent.$('uploadstate').innerHTML='<b>错误：</b><hr>文件保存失败，请重试<i>".$originName."</i><br>如果是文本请直接粘贴到聊天记录框即可！';</script>";
                }
            }
        }
    }


    private function getAllowExt()
    {
        return  ['MP3', 'WAV', 'OGG', 'WMA'];
    }



    public function play(Request $req)
    {
        if(!isset($req->path)) return '';
        $path = '/storage/uploads/'.$req->path;

        return '<div class="file">
                    <audio src="'.$path.'" controls>
                    您的浏览器不支持 audio 标签。
                    </audio>
                </div>';
    }

}
