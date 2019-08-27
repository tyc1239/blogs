<?php

namespace App\Http\Controllers\index;

use App\Model\Native;
use App\Model\Column;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //首页
    public function index()

    {
         $native=DB::table('native')->where('is_show',1)->get();//导航栏
         $slide=DB::table('slide')->where('is_show',1)->get();//轮播图
         $foot=DB::table('foot')->where('is_show',1)->get();//友情链接
         $column = DB::table('column')->where('is_show',1)->where('n_id',1)->get();//专为PHP而研制的核心产品
         $column1 = DB::table('column')->where('is_show',1)->where('n_id',2)->get();//专业服务

        return view ('index.index',compact('native','slide','foot','column','column1'));
    }

 


    //关于
    public function about(){
         
         $native=DB::table('native')->get();
          $foot=DB::table('foot')->get();
          $column6 = DB::table('column')->where('is_show',1)->where('n_id',6)->get();
          $column7 = DB::table('column')->where('is_show',1)->where('n_id',7)->get();
        return view('index.about',compact('native','foot','column6','column7'));
    }
    //案例
    public function casea(){
        
         $native=DB::table('native')->get();
          $foot=DB::table('foot')->get();
          $column5 = DB::table('column')->where('is_show',1)->where('n_id',5)->get();
        return view('index.case',compact('native','foot','column5'));
    }
    //动态
    public function news(Request $request)
    {
         $page = request()->page;
        $native=DB::table('native')->get();
         $foot=DB::table('foot')->get();
         $column4 = DB::table('column')->where('is_show',1)->where('n_id',4)->paginate(1);
        
        return view('index.news',compact('native','foot','column4','page'));
    }
    //动态详情
    public function details(){
        
        $native=DB::table('native')->get();
         $foot=DB::table('foot')->get();
        return view('index.details',compact('native','foot'));
    }
    //产品
    public function product(){
        
        $native=DB::table('native')->get();
         $foot=DB::table('foot')->get();
        $column3 = DB::table('column')->where('is_show',1)->where('n_id',3)->get();

        return view('index.product',compact('native','foot','column3' ));
    }
}
