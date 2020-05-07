<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Family;

class FamilyController extends Controller
{
    //主页--controller
    public function index()
    {
        $arr = ["/MyHome/images/x1.jpg", "/MyHome/images/x2.jpg",
                "/MyHome/images/x3.jpg", "/MyHome/images/x4.jpg",
                "/MyHome/images/x5.jpg", "/MyHome/images/x6.jpg"];
        return view('family.index',['list'=> $arr]);
    }

    //管理页面--controller
    public function manage()
    {
        return view('family.manage');
    }

    //根据ID删除数据
    public function delete(Request $request)
    {
        $id = $input = $request->input('id');
        $res = Family::where('id',$id)->delete();
        echo $res;
    }

    //获取表中的数据数量
    public  function totalItem()
    {
        $total = Family::count();
        echo $total;
    }

    //获取单个信息更新时间和备注
    public function getUpTimeById(Request $request)
    {
        $id = $request->json('id');
        $family = new Family();
        $res = $family->where('id',$id)->select('times','note','id')->get();
        echo json_encode($res);
    }

    public function getOneImageById(Request $request){
        $id = $request['id'];
        $data = Family::where('id',$id)->select('image')->get();
        return response($data[0]->image, 200, [
            'Content-Type' => 'image/jpg',
        ]);
    }

    public function queryPartData(Request $request)
    {
        $rows = $request->json('rows');
        $offset = $request->json('offset');
        $res = Family::offset($offset+1)->limit($rows)->get(['name','birthday','note','sex','age','id']);
        echo $res;
    }

    //添加页--controller
    public function append(Request $request)
    {
        $family = new Family();
        $id = $request->input("id");
        if(!empty($id)){
            $res = $family->where('id',$id)->select('name','age','sex','birthday','note')->get();
            return view('family.append',['data'=>$res[0]]);
        }
        return view('family.append',['data'=>new Family()]);
    }

    public function insertOne(Request $request){
       $oneData = $request->all();
       $family = new Family();
       $res = $family->insert([
                'name' => $oneData['name'],
                'birthday' => $oneData['birthday'],
                'note' => $oneData['note'],
                'age' => $oneData['age'],
                'sex' => $oneData['sex']]
       );
       echo $res;
    }

    //关于我--about
    public function about()
    {
        return view('family.about');
    }

    //图片上传
    public function upload()
    {
        return view('family.upload');
    }

    //图片保存到数据库
    public function upOneImage(Request $request){
        $id = $request->input('id');

        $file=$_FILES['file'];
        $size=$file['size'];
        $tmp_name=$file['tmp_name'];
        $fileHan=fopen($tmp_name,'r');
        $contents=fread($fileHan,$size);

        $family = new Family();
        $res = $family->where('id',$id)->update([
           'image'=>$contents
        ]);

        echo $res;
    }

    //根据ID更新一条数据
    public function upOneData(Request $request)
    {
        $data = $request->all();
        $family = new Family;
        $res = $family->where('id',$data['id'])->update([
            'name'=>$data['name'],
            'note'=>$data['note'],
            'age'=>$data['age'],
            'sex'=>$data['sex'],
            'birthday'=>$data['birthday']
        ]);
        echo $res;
    }
}
