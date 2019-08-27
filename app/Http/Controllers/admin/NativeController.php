<?php

namespace App\Http\Controllers\admin;

use App\Model\Native;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class NativeController extends Controller
{
    //导航栏添加
    public function nativeadd()
    {
        return view('admin.nativeadd');
    }

    //导航栏添加执行
    public function nativeadddo(Request $request)
    {
        $n_name = $request->n_name;
        $details =$request->details;
        $n_url=$request->n_url;
        $time = time();
        $where = [
            'n_name' => $n_name,
            'details' => $details,
            'n_url'=>$n_url,
            'created_at' => $time
        ];
        $res = Native::insert($where);
        if ($res) {
            return "<script>alert('添加成功');location.href='/admin/nativeadd'</script>";
        } else {
            return "<script>alert('添加失败');location.href='/admin/nativeadd'</script>";
        }
    }


    //导航栏列表展示
    public function nativelist(Request $request)
    {
        $request = $_GET;
       // $type = \request()->type ?? '';
        $res = Native::where('is_show',1)->paginate(4);
        return view('admin/nativelist', ['res' => $res,'request'=>$request]);
    }

    //导航栏修改展示
    public function nativeupd($id){
        $data =Native::where('n_id',$id)->first();
        return view('admin/nativeupd',['data'=>$data]);
    }
    //导航栏修改执行
    public function nativeupddo(Request $request,$id)
    {
        $post=$request->except('_token');

        $res=DB::table('native')
            ->where('n_id',$id)
            ->update($post);
        if ($res) {
            return "<script>alert('修改成功');location.href='/admin/nativelist'</script>";
        } else {
            return "<script>alert('你啥也没改啊');location.href='/admin/nativelist'</script>";
        }

    }




    //导航栏内容删除
    public function nativedel(Request $request)
    {
        $n_id=$request->n_id;
        $res=Native::where('n_id',$n_id)->update(['is_show'=>2]);
        if ($res) {
            return redirect('admin/nativelist')->with('msg','删除成功了');
        }
    }

}
