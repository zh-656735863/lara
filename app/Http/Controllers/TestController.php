<?php

namespace App\Http\Controllers;


use App\Models\Family;
use App\Models\Users;
use Illuminate\Http\Request;
use Validator;

class TestController extends Controller
{
    // 定义返回数组
    public $message = [
        "meta" => [
            "status" => 200,
            "msg" => "登陆成功"
        ],
        "data" => null
    ];

    // 登陆测试路由
    public function index()
    {
        // 登录验证，调用模型的方法
        $users = new Users;
        $res = $users->login(request()->input());
        // 验证结果返回判定
        if ($res) {
            $this->message['data'] = [
                "token" => "test"
            ];
            return json_encode($this->message);
        } else {
            $this->message["meta"] = [
                "status" => 400,
                "msg" => "失败"
            ];
            return json_encode($this->message);
        }
    }

    // 获取用户列表数据
    public function userList(Request $request)
    {
        $pagenum = $request->input('pagenum');
        $pagesize = $request->input('pagesize');
        // 根据数据查询数据
        $total = Family::count();
        $res = Family::offset(($pagenum - 1) * $pagesize)
            ->limit($pagesize)->get(['name', 'birthday', 'note', 'sex', 'age', 'id']);

        $this->message["data"] = [
            "total" => $total,
            "user" => $res
        ];
        return json_encode($this->message);
    }

    // 增加用户路由
    public function adduser(Request $request)
    {
        $validator = Validator::make($request->input(), [
            'username' => 'required|between:4,6',
            'password' => 'required',
            'rePassword' => 'required',
            'email' => 'required'
        ]);
        if ($validator->fails()) {
            $this->message["meta"] = [
                "mgs" => "后台数据检测不通过失败了",
                "status" => "400"
            ];
            $this->message["data"] = [
                "errors" => $validator->errors(),
                "flag" => $validator->fails()
            ];
            return json_encode($this->message);
        } else {
            // 向数据库中添加数据
            $input = [
                'username' => $request->input('username'),
                'password' => $request->input('password'),
                'email' => $request->input('email')
            ];
            $res = Users::create($input);

            if ($res) {
                $this->message["meta"]["msg"] = "注册成功";
                return json_encode($this->message);
            }
            $this->message["meta"]["msg"] = "数据库新增数据失败";
            return json_encode($this->message);
        }
    }
}
