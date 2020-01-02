<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{

   public function reg(Request $request)
   {
       echo '<pre>';print_r($request->input());echo '</pre>';
       $pass1=$request->input('pass1');
       $pass2=$request->input('pass2');

       if($pass1!=$pass2){
           dd("两次输入的密码不一致");
       }
       $password=password_hash($pass1,PASSWORD_BCRYPT);
       $data=[
           'email' =>$request->input('email'),
           'name'  =>$request->input('name'),
           'password'=>$password,
           'last_login' =>time(),
           'last_ip'=>$_SERVER['REMOTE_ADDR'],
       ];
//        $res=User::create($data);
      $res=DB::table('user')->insert($data);
        if($res){
            echo 1;
        }else{
            echo 2;
      }
   }

}












