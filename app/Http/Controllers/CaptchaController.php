<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
   public function reloadCaptcha() {
      try {
          return response()->json(['captcha' => captcha_img()]);
      } catch (\Exception $e) {
          return response()->json(['error' => $e->getMessage()], 500);
      }
  }
}
