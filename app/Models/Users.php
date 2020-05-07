<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//应用哈希门面
use Hash;
use Illuminate\Support\Facades\Cookie;

class Users extends Model
{
    // 引入软删除
    use SoftDeletes;
    //删除字段的标识
    protected $tables = ['deleted_at'];
    //指定表名，一个模型对应一个表明
    protected $table = 'users';
    //指定主键，若主键不为'id',这可以设置为当前自增长字段
    protected $primaryKey = 'id';
    //时间戳--这里一定要注意它是用的public
    public $timestamps = true;
    //允许批量赋值的字段$guarded(黑名单)$fildable(白名单)
    protected $guarded = [];

    public function login(array $data)
    {
        $info = self::where('username', $data['username'])->first();
        if (!$info) {
            echo 'notFind';
        } elseif (!Hash::check($data['password'], $info['password'])) {
            echo false;
        } else {
            session([$info['username']=>$info['username']]);
            Cookie::queue('name', $info['username'],3600);
            echo true;
        }
    }

}
