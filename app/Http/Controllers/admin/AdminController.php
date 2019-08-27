<?php


namespace App\Http\Controllers\admin;

use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Mail;

class AdminController extends Controller
{
    /**
     * 注册
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    //后台管理员注册
    public function reg()
    {
        return view('admin.reg');
    }
    //注册执行
    public function regdo(Request $request)
    {
        $u_name = request()->u_name;
        $u_pwd = request()->u_pwd;
        $u_email = request()->u_email;

        $time = time();
        $u_pwd = MD5($u_pwd);
        $data = [
            'u_name' => $u_name,

            'u_pwd' => $u_pwd,
            'u_email' => $u_email,
            'created_at' => $time
        ];

        $res = User::insert($data);
    

        if ($res) {
            return "<script>alert('注册成功');location.href='/admin/login'</script>";
        } else {
            return "<script>alert('注册失败');location.href='/admin/reg'</script>";
        }
    }




    /**
     * 修改密码
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    //修改密码展示页面
    public function forget()
    {
        return view('admin.forget');
    }

    public function forgetdo(Request $request)
    {
        $data=request()->all();
       // dd($data);
        $code=$data['code'];
        //dd($code);
        $res=DB::table('user')->first();
        //dd($res);
        if(empty($data['u_email']) || empty($data['u_pwd']) || empty($data['u_pwds']) || empty($data['code'])){
            die('缺少参数');
        }

//        if($data['u_email'] != $res->u_email){
//            echo json_encode(['msg'=>'该手机号不是用户当时注册的手机号','code'=>2]);
//        }

        if($code != Redis::get('code')){
            echo json_encode(['msg'=>'输入验证码不正确，请重新输入','code'=>3]);
        }
        $where=[
            'u_pwd'=>$data['u_pwd'],
        ];
        unset($data['u_pwds']);
        unset($data['$code']);
        $info=DB::table('user')->update($where);
        //dd($info);
        if($info){
            Redis::del('code');
            echo json_encode(['msg'=>'修改密码成功','code'=>1]);
        }
    }

    //发送验证码
    public function send()
    {
        $u_email=request()->u_email;
        //dd($tel);
        $code=rand(1000,9000);
        // $host = "http://yzxtz.market.alicloudapi.com";
        // $path = "/yzx/notifySms";
          $host = "http://dingxin.market.alicloudapi.com";
         $path = "/dx/sendSms";

        $method = "POST";
        //$appcode = "78477519dadc4eadbe0b0aa25e8eacd6";
          $appcode = "2b506cccc1cb48b7a9981c8f2a3abafd";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);
        //$querys = "phone=$u_email&templateId=TP18040316&variable=num%3A$code%2Cmoney%3A888";
        $querys = "mobile=".$u_email."&param=code%3A".$code."&tpl_id=TP1711063";
        $bodys = "";
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }
        //var_dump(curl_exec($curl));

        Redis::set('code',$code);
        return (curl_exec($curl));
    }











    /**
     * 登录
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    //后台管理员登录
    public function login()
    {
        return view('admin.login');
    }

    //执行登录
    public function logindo(Request $request)
    {
        $u_name = $request->u_name;
        //dd($u_name);
        $u_pwd =$request->u_pwd;
        $where =[
          'u_name'=>$u_name,
            'u_pwd'=>$u_pwd
        ];
        $time =time();
        $token =[
            'salt'=>'sadfghjklds2345678ds',
            'u_name'=>$u_name,
            'time'=>$time,
            'exprec'=>$time + 3600
        ];
        $tokens = serialize($token);
        $tokenkey = encrypt($tokens);
        $res = DB::table('user')->where($where)->first();
        //dd($res);
        if(!empty($res)){
            $data =[
                'code'=>200,
                'msg'=>'验证通过，请稍等',
                'data'=>[
                    'token'=>$tokenkey
                ]
            ];
            if (!session_id()) session_start(); 
            $_SESSION['userinfo']=$u_name;
            return json_encode($data,JSON_UNESCAPED_UNICODE);
        }else{
            $data =[
              'code'=>100,
                'msg'=>'登录失败,请输入正确的用户名和密码',
                'data'=>[
                ]
            ];

            return json_encode($data,JSON_UNESCAPED_UNICODE);

        }
    }


    /**
     * 后台页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    //后台主页面展示
    public function index()
    {
        return view('admin.index');
    }

    //执行退出
    public function outlogin()
    {
//        request()->session()->forget('userinfo');
//        return json_encode(['code'=>1]);
        if (!session_id()) session_start(); 
        unset($_SESSION['userinfo']);
        return json_encode(['code'=>1]);
    }
}

