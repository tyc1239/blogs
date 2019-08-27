<?php

namespace App\Http\Controllers\admin;

use App\Model\Foot;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FootController extends Controller
{
    //底部链接添加
    public function footadd()
    {
        return view('admin.footadd');
    }

    //底部链接添加执行
    public function footadddo(Request $request)
    {
        $f_name = $request->f_name;
        $details =$request->details;
        $f_url=$request->f_url;
        $time = time();
        $where = [
            'f_name' => $f_name,
            'details' => $details,
            'f_url'=>$f_url,
            'created_at' => $time
        ];
        $res = Foot::insert($where);
        if ($res) {
            return "<script>alert('添加成功');location.href='/admin/footlist'</script>";
        } else {
            return "<script>alert('添加失败');location.href='/admin/footadd'</script>";
        }
    }

    //底部链接列表展示
    public function footlist(Request $request)
    {
        $request = $_GET;
        // $type = \request()->type ?? '';
        $res = Foot::where('is_show',1)->paginate(4);
        return view('admin/footlist', ['res' => $res,'request'=>$request]);
    }

    //底部链接内容删除
    public function footdel(Request $request)
    {
        $f_id=$request->f_id;
        $res=Foot::where('f_id',$f_id)->update(['is_show'=>2]);
        if ($res) {
            return "<script>alert('删除成功');location.href='/admin/footlist'</script>";
        } else {
            return "<script>alert('删除失败');location.href='/admin/footlist'</script>";
        }
    }

    //底部链接修改
    public function footupd($id)
    {
        $data =Foot::where('f_id',$id)->first();
        return view('admin/footupd',['data'=>$data]);
    }

    public function footupddo (Request $request,$id)
    {
        $post=$request->except('_token');

        $res=DB::table('foot')
            ->where('f_id',$id)
            ->update($post);

        if ($res) {
            return "<script>alert('修改成功');location.href='/admin/footlist'</script>";
        } else {
            return "<script>alert('你啥也没改啊');location.href='/admin/footlist'</script>";
        }

    }
}
