<?php

namespace App\Http\Controllers\admin;

use App\Model\Slide;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SlideController extends Controller
{
    //轮播图添加展示
    public function slideadd ()
    {
    	 return view('admin.slideadd');
    }

    //轮播图添加执行
    public function slideadddo(Request $request)
    {

         
        $s_img = $request->s_img;
        $s_desc = $request->s_desc;
        

        if($request->hasFile('s_img')){
            $s_img= $this->upload($request,'s_img');
        }
        $time=time();

        $data= [
             
            's_img'=>$s_img,
            's_desc'=>$s_desc,
            'created_at'=>$time,
            
        ];

        $res = DB::table('slide')->insert($data);
        if ($res) {
            return "<script>alert('添加成功');location.href='/admin/slidelist'</script>";
        } else {
            return "<script>alert('添加失败');location.href='/admin/slidelist'</script>";
        }
      }

       //上传
    public function upload(Request $request,$s_desc)
    {
        if ($request->file($s_desc)->isValid()) {
            $post=$request->file($s_desc);
            $extension=$request->$s_desc->extension();
            $store_result=$post->storeAs(date('Y'),date('YHis').rand(100,999).'.'.$extension); 
            return $store_result; 
        }
        exit('上传文件出错'); 
    }

    //轮播图展示
    public function slidelist (Request $request)
    {
    	$query=request()->all();
        // $where=[];
        $data= Slide::where('is_show',1)->paginate(2); 
        $line=$data['line'];
        return view('admin/slidelist',['data'=>$data,'line'=>$line,'query'=> $query]);
    	 
    }

     //轮播图删除
    public function slidedel (Request $request)
    {
    	 $s_id=$request->s_id;
        $res=Slide::where('s_id',$s_id)->update(['is_show'=>2]);
        if ($res) {
            return redirect('admin/slidelist')->with('msg','删除成功了');
        }
    	 
    }


}
