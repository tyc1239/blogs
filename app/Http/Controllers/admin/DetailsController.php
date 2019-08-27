<?php

namespace App\Http\Controllers\admin;

use App\Model\Details;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DetailsController extends Controller
{
    //栏目添加
    public function detailsadd()
    {
        return view('admin.detailsadd');
    }

    //栏目添加执行
    public function detailsadddo(Request $request)
    {
        $d_name = $request->d_name;
         $d_img=$request->d_img;
         $d_desc=$request->d_desc;

        if($request->hasFile('d_img')){
            $d_img= $this->upload($request,'d_img');
        }
        $time = time();  

        $where = [
            'd_name' => $d_name,
             
            'd_img'=>$d_img,
            'd_desc'=>$d_desc,
            'created_at' => $time
        ];
        $res = Details::insert($where);
        if ($res) {
            return "<script>alert('添加成功');location.href='/admin/detailslist'</script>";
        } else {
            return "<script>alert('添加失败');location.href='/admin/detailslist'</script>";
        }
    }

    //上传
    public function upload(Request $request,$d_name)
    {
        if ($request->file($d_name)->isValid()) {
            $post=$request->file($d_name);
            $extension=$request->$d_name->extension();
            $store_result=$post->storeAs(date('Ym'),date('Ym').rand(100,999).'.'.$extension); 
            return $store_result; 
        } 
        exit('上传文件出错'); 
    }


    //栏目详情列表展示
    public function detailslist(Request $request)
    {
       $query=request()->all();
       // $type = \request()->type ?? ''; 
        
         $where=[];
        $data=Details::where('is_show',1)->paginate(1); 
        $line=$data['line'];
        return view('admin/detailslist',['data'=>$data,'line'=>$line,'query'=> $query]);

        
    }

     

    ////栏目详情软删除
    public function detailsdel(Request $request)
    {
        $d_id=$request->d_id;
        $res=Details::where('d_id',$d_id)->update(['is_show'=>2]);
       if ($res) {
            return "<script>alert('删除成功');location.href='/admin/detailslist'</script>";
        } else {
            return "<script>alert('删除失败');location.href='/admin/detailslist'</script>";
        }
    }

    //栏目详情修改
    public function detailsupd($id)
    {
        $datan = Details::get();
        $data=DB::table('details')->where('d_id',$id)->first();
        return view('admin.detailsupd',['data'=>$data,'datan'=>$datan]);
    }

    //栏目详情修改执行
    public function detailsupddo (Request $request,$id)
    {
         
         $post=$request->except('_token');
        if($request->hasFile('edit_img')){
            $post['d_img']= $this->upload($request,'edit_img');
            unset($post['edit_img']); 
        }
        $res=DB::table('details')
            ->where('d_id',$id) 
            ->update($post);

       if ($res) {
            return "<script>alert('修改成功');location.href='/admin/detailslist'</script>";
        } else {
            return "<script>alert('你啥也没改啊');location.href='/admin/detailslist'</script>";
        }
    }

}
