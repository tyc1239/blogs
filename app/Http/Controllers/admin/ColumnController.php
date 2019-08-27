<?php

namespace App\Http\Controllers\admin;

use App\Model\Native;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\Column;

class ColumnController extends Controller
{
    //栏目添加
    public function columnadd()
    {
        //phpinfo();die;
        $data = Native::get();
        return view('admin.columnadd',['data'=>$data]);
    }

    //栏目添加执行
    public function columnadddo(Request $request)
    {
        $c_name = $request->c_name;
        $c_img = $request->c_img;
        $c_desc = $request->c_desc;
        $n_id =$request->n_id;
        $c_descs = $request->c_descs;


        if($request->hasFile('c_img')){
            $c_img= $this->upload($request,'c_img');
        }
        $time=time();

        $data= [
            'c_name'=>$c_name,
            'c_img'=>$c_img,
            'c_desc'=>$c_desc,
            'c_descs'=>$c_descs,
            'created_at'=>$time,
            'n_id'=>$n_id
        ];

        $res = DB::table('column')->insert($data);
        if ($res) {
            return "<script>alert('添加成功');location.href='/admin/columnlist'</script>";
        } else {
            return "<script>alert('添加失败');location.href='/admin/columnlist'</script>";
        }
    }


    //上传
    public function upload(Request $request,$c_name)
    {
        if ($request->file($c_name)->isValid()) {
            $post=$request->file($c_name);
            $extension=$request->$c_name->extension();
            $store_result=$post->storeAs(date('Ymd'),date('YmdHis').rand(100,999).'.'.$extension); 
            return $store_result; 
        } 
        exit('上传文件出错'); 
    }

     //栏目的图文展示
    public  function columnlist(Request $request)
    {
         
        $query=request()->all();
        $where=[];
        $c_name=$query['c_name']??'';
        if ($c_name) {
            $where[]=['c_name','like',"%$c_name%"];
        }
        $data=Column::where('is_show',1)->where($where)->paginate(3); 
         // $num = DB::table('read_goods')->where('read_look',1)->join('sort','sort.sort_id','=','read_goods.sort_id')->orderBy('num','desc')->get();

        $line=$data['line'];
        return view('admin/columnlist',['data'=>$data,'c_name'=>$c_name,'line'=>$line,'query'=> $query]);

    }

    //栏目的图文删除
    public function columndel(Request $request)
    {
        $c_id=$request->c_id;
        $res=Column::where('c_id',$c_id)->update(['is_show'=>2]);
       if ($res) {
            return "<script>alert('删除成功');location.href='/admin/columnlist'</script>";
        } else {
            return "<script>alert('删除失败');location.href='/admin/columnlist'</script>";
        }
    }

    //栏目的修改

     public function columnupd($id)
    {
        $datan = Native::get();
        $data=DB::table('column')->where('c_id',$id)->first();
        return view('admin.columnupd',['data'=>$data,'datan'=>$datan]);

    }
    //栏目的修改执行
    public function columnupddo(Request $request,$id)
    {
        $post=$request->except('_token');
        if($request->hasFile('edit_img')){
            $post['c_img']= $this->upload($request,'edit_img');
            unset($post['edit_img']); 
        }
        $res=DB::table('column')
            ->where('c_id',$id)
            ->update($post);

       if ($res) {
            return "<script>alert('修改成功');location.href='/admin/columnlist'</script>";
        } else {
            return "<script>alert('你啥也没改啊');location.href='/admin/columnlist'</script>";
        }

    }

    // //搜索
    // public function cname() 
    // {
    //     $c_name = request()->c_name;

    //     $res =DB::table('column')->where('c_name','like', '%'.$c_name.'%')->get()->toArray();

    //     return json_encode($res,JSON_UNESCAPED_UNICODE);

    // }

    /*
    *排序
    */
        //正序
    public function by()
    {
        $all=request()->token;
         //解密
        $token=decrypt($all);
        //dd($token);
        //反序列化
        $info=unserialize($token);
//    dd($info);
        if($info){
            $data=DB::table('column')->orderBy('created_at','asc')->get();
            //dd($data);
            return json_encode($data,JSON_UNESCAPED_UNICODE);
        }else{
            $data=[
                'code'=>'101',
                'message'=>'缺少必要参数',
                'data'=>[]
            ];

            return json_encode($data,JSON_UNESCAPED_UNICODE);
        }
    }

    //倒序
    public function desc()
    {
        $all=request()->token;
        //dd($all);
        //解密
        $token=decrypt($all);
        //dd($token);
        //反序列化
        $info=unserialize($token);
//    dd($info);
        if($info){
            $data=DB::table('column')->orderBy('created_at','desc')->get();
            //dd($data);
            return json_encode($data,JSON_UNESCAPED_UNICODE);
        }else{
            $data=[
                'code'=>'101',
                'message'=>'缺少必要参数',
                'data'=>[]
            ];

            return json_encode($data,JSON_UNESCAPED_UNICODE);
        }
    }

}
