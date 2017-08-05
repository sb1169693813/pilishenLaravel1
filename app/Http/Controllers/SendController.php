<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;

class SendController extends Controller
{
    public function index()
    {
      $uid= 1;
      $activationcode = "testcode";
      return view('activemail',compact('uid','activationcode'));
    }
    
    public function send()
    {
      $email = "446352377@qq.com";
      $name="testmail";
      $uid= 1;
      $code = "testcode";
      $data = ['email'=>$email, 'name'=>$name, 'uid'=>$uid, 'activationcode'=>$code];
      Mail::send('activemail', $data, function($message) use($data)
      {
          $message->to($data['email'], $data['name'])->subject('欢迎注册我们的网站，请激活您的账号！');
      });
    }
}
