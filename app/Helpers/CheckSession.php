<?php

namespace App\Helpers;

class CheckSession  
{
  
  public static function checkLogin($role, $request)
  {
    $role_check = $request->session()->get('role');
    
    if ($request->session()->has('user') && $role_check == $role) {
      return 200;
    }

    return 401;
  }

}
