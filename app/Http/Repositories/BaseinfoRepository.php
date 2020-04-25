<?php
namespace App\Http\Repositories;

use App\Models\SystemBaseinfo;
use Illuminate\Support\Facades\Cache;

class BaseinfoRepository
{

    protected $baseinfo;

    public function __construct(SystemBaseinfo $baseinfo) {
        $this->baseinfo = $baseinfo;
    }
    //读取所有设置基本信息
    public function get() {
        //$return = Cache::get('baseinfo');
       /// if(empty($return)){        
            $new_data = $this->baseinfo->get();
            foreach($new_data->toArray() as $v){
                $return[$v['tag']] = Array('name'=>$v['name'],'value'=>$v['val']);
            }
            Cache::put('baseinfo', $return, 86400);
     //   }
        return $return;        
    }
    //读取一个标签的值
    public function  get_one($tag){
        $new_data = $this->baseinfo->where('tag', $tag)->first();
        $return = $new_data;
        return $return;
    }
    
    //保存修改标签
    public function  save($arr){
        foreach($arr as $a){    //需要优化
            $flight = $this->baseinfo->where('id', $a['id'])->first();
            $flight->name = $a['name'];
            $flight->tag = $a['tag'];
            $flight->val = $a['val'];
            $flight->save();
        }
        $new_data = $this->baseinfo->where('tag', $tag)->first();
        $return = $new_data;
        return $return;
    }

}