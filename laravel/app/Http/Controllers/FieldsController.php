<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;

class FieldsController extends Controller
{
    private static $appFields = [   'attribute' => Array ('width' => '80', 'name' => '属性' ) ,
                                    'file' => Array ('width' => '50', 'name' => '附件' ) ,
                                    'gender' => Array ('width' => '50', 'name' => '性别' ) ,
                                    'age' => Array ('width' => '50', 'name' => '年龄' ) ,
                                    'job' => Array ('width' => '80', 'name' => '职业' ) ,
                                    'phone' => Array ('width' => '100', 'name' => '手机' ) ,
                                    'qq' => Array ('width' => '100', 'name' => 'QQ' ) ,
                                    'weixin' => Array ('width' => '100', 'name' => '微信' ) ,
                                    'town' => Array ('width' => '140', 'name' => '地域' ) ,
                                    'dis' => Array ('width' => '100', 'name' => '病种' ) ,
                                    'way' => Array ('width' => '100', 'name' => '途径' ) ,
                                    'keyword' => Array ('width' => '120', 'name' => '关键字' ) ,
                                    'website' => Array ('width' => '120', 'name' => '来源网站' ),
                                    'postdate' => Array ('width' => '100', 'name' => '预约到诊' ) ,
                                    'track' => Array ('width' => '110', 'name' => '回访时间' ) ,
                                    'admin_id' => Array ('width' => '110', 'name' => '录入员' ),
                                    'do' => Array ('width' => '110', 'name' => '操作' ),
                                ];
    private static $patientFields = [   'id' => Array ('width' => '50', 'name' => '编号' ),
                                        'add_time' => Array ('width' => '120', 'name' => '时间' ),
                                        'medical_num' => Array ('width' => '120', 'name' => '病历号' ),
                                        'gender' => Array ('width' => '50', 'name' => '性别' ),
                                        'age' => Array ('width' => '50', 'name' => '年龄' ),
                                        'phone' => Array ('width' => '100', 'name' => '手机' ),
                                        //'6' => Array ('width' => '50', 'name' => '就诊' ),
                                        //'7' => Array ('width' => '50', 'name' => '周期' ),
                                        'sum' => Array ('width' => '80', 'name' => '消费' ),
                                        'town' => Array ('width' => '140', 'name' => '地区' ),
                                        'ads' => Array ('width' => '100', 'name' => '媒介' ),
                                        'dis' => Array ('width' => '100', 'name' => '病种' ),
                                        'dep' => Array ('width' => '100', 'name' => '医生' ),
                                        'track' => Array ('width' => '100', 'name' => '回访时间' ),
                                        'admin_id' => Array ('width' => '120', 'name' => '操作员' ),
                                        'do' => Array ('width' => '30', 'name' => '删' ),
                                ];







    static public function getFields($type=0)
    {
        $fields = [];
        switch ($type) {
            case '1':
                $fields = self::$appFields; 
                break;
            
            case '2':
                $fields = self::$patientFields;
                break;

        }
        return $fields;

    }

    public function create(Request $req)
    {
        $fields = self::getFields($req->type);
        $fields = array_chunk($fields, 4, true);
        return view('Fields.create', ['fields'=>$fields, 'type'=>(int)$req->type]);
    }


    public function store(Request $req)
    {   
        $this->validate($req, [
            'type' => 'numeric|min:1|required',
            'fields' => 'required|array|'
            ]);
        $field =  new Field();
        $field->admin_id = '1';
        $field->fields = serialize($req->fields);
        $field->type = (int)$req->type;
        if ($field->save()) {
            return code('设置成功', '-5');
        }
        return code('设置失败', '1');

    }

    public function edit($id)
    {
        $field = Field::findOrFail((int)$id);
        $field->fields = unserialize($field->fields);
        $origin_fields = self::getFields($field->type);
        $origin_fields = array_chunk($origin_fields, 4, true);
        return view('fields.edit',['fields'=>$field->fields, 'origin_fields'=>$origin_fields, 'type'=>$field->type,'id'=>$field->id]);
    }


    public function update(Request $req, $id)
    {
        $field = Field::findOrFail($id);   
        $field_arr = serialize($req->fields);
        $field->fields = $field_arr;
        if ($field->save()) {
            return code('修改成功', '-5');
        } 
        return code('修改失败', '1');
    }   

}
