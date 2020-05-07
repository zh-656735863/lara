<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class PermissionController extends Controller
{
//    public function __construct()
//    {
//        #->except('index')黑名单,写了的路由就不会此请求发送到我们定义的中间件里面去
//        return $this->middleware(['CheckUser'])->except('index');
//
//    }
    //登陆
    public function login()
    {
        return view('login.login');
    }

    //注册
    public function register()
    {
        return view('login.register');
    }

    public function registerTest(UserRequest $request)
    {
        //方案一，简单
        //input = $this->validate($request,[
//            'user'=>'required|between:2,6',
//            'password'=>'required|confirmed',
//            'password_confirmed'=>'required',
//            'email'=>'required|email',
//        ],[
//            'user.required'=>'名字不能为空',
//            'password.required'=>'密码不能为空',
//            'password_confirmed.required'=>'确认密码不能为空',
//            'password.confirmed'=>'两次密码不一致',
//            'email.required'=>'邮箱不能为空',
//            'email.email'=>'邮箱格式不对',
//            'user.between'=>'2-6个字符之间'
//        ]);
        //方案二 适用于ajax
//        $validator = Validator::make($request->all(), [
//            'user'=>'required|between:2,6',
//            'password'=>'required|confirmed',
//            'password_confirmed'=>'required',
//            'email'=>'required|email',
//        ],[
//            'user.required'=>'名字不能为空',
//            'password.required'=>'密码不能为空',
//            'password_confirmed.required'=>'确认密码不能为空',
//            'password.confirmed'=>'两次密码不一致',
//            'email.required'=>'邮箱不能为空',
//            'email.email'=>'邮箱格式不对',
//            'user.between'=>'2-6个字符之间'
//        ]);
//        if($validator->fails()){
//            return redirect()->back()->withErrors($validator);
//        }
//        else{
//            dd($request->all());
//        }
        //方案三 门面验证
        return redirect()->route('home');
    }

    public function db(Request $request)
    {
        //        //原生查询语句
//        $sql = "insert into users (name,password) values(:name,:password)";
//        #$res = DB::insert($sql, [':name'=>'222', ':password'=>'222']);
//        $res = DB::insert($sql, ['name'=>'223', 'password'=>'223']);
//        dd($res);
//        $kw = $request->get('kw');

//        // when    字段  如果为真则执行匿名函数中的操作
//        $ret = DB::table('users')->when($kw, function (Builder $query) use ($kw) {
//            $query->where('name', 'like', "%{$kw}%");
//        })->get();
//        $ret = DB::table('users')->where('id',1)->value('name');
        $ret = DB::table('users')->pluck('name');
        dd($ret);
    }

    public function model()
    {
        #新增数据
        //        $data = [
//            'title' => '标题',
//            'desn' => 'PHP',
//            'cnt' => 'PHP是世界上最好的语言'
//        ];
//        //推荐写法--返回模型对象
//        dd(Article::create($data));
        #查询数据--查询一条--返回模型对
        //        #$ret = Article::where('id',1)->first();
//        //查询数据--查询多条--返回模型对象的集合collection
//        $ret = Article::where('id','>',2)->get();
//
//        //查询指定字段的值
//        #$ret = Article::where('id',2)->value('cnt');
//
//        //查询一列
//        #$ret = Article::pluck('title');
//
//        //分页
//        #$ret = Article::offset(0)->limit('2')->get();
        #修改数据
        //方案一
//        $article = Article::find(1);
//        $article->title='A标题';
//        $article->save();
        #删除数据
        //        $data = ['title'=>'快开学了','cnt'=>'怎么还不开学啊'];
//        $res = Article::where('id','>',3)->update($data);
//        //删除和修改数据都需要先查询
//        //真*删除
//        //对象的方式删除
//        #$article = new Article();
//        #$res = $article->where('id',1)->delete();
//        //静态方法删除
//        #$res = Article::destroy('3');//这种方法会执行两条sql语句，
//
//        //软删除
//        #$res = Article::onlyTrashed()->get();
//        #$res = Article::onlyTrashed()->where('id',3)->first();
        //        $model = Article::onlyTrashed()->where('id',3)->first();
//        dump($model->restore());
//
//        $article = Article::find(20);
//        $article->ip=request()->ip();
//        $article->save();

        #事件观察者的两种方式
        //在服务提供这provider的boot方法中注册，或者是写在模型当中
        $data = [
            'title' => '标题',
            'desn' => 'PHP',
            'cnt' => 'PHP是世界上最好的语言'
        ];
        $ret = Article::create($data);

        dump($ret);
    }

    public function lj(){

        #设置session
        //session(['key'=>'值']);

        #取出session
        //dump(session('key'));

        #删除session
        //session()->forget('键名');

        #判断是否存在需要的session
        //dump(session()->has('_token'));

        //使用这个方法保存 session，只能将数据保留到下个 HTTP 请求，然后就会被自动删除。
        #session()->flash('message','hello world');

        #dump(Session::all());
    }

}
