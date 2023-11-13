<?php

namespace App\Http\Controllers;
use Mews\Captcha\Facades\Captcha;
use Illuminate\Http\Request;

class CaptchaController extends Controller
{
   public function reloadCaptcha() {
      
      return response()->json(['captcha'=> captcha_img()]);

  }
}
