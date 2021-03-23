<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\CheckSession;
use App\Siswa;
use App\Admin;
use App\Guru;

class AuthController extends Controller
{
    public function role_list()
    {
        $role = [
            'admin', 'guru', 'siswa'
        ];

        return $role;
    }

    public function viewLogin(Request $request, $role = null)
    {
        if (!in_array($role, $this->role_list())) {
            return abort(404);
        }

        if (CheckSession::checkLogin($role, $request) == 200) {
            return redirect()->route('redirect.route', $role); //redirect to home route role itself
        }

        return view('auth.login', ['role' => $role]);
    }

    public function postLogin(Request $request, $role = null)
    {
        if (!in_array($role, $this->role_list())) {
            return abort(404);
        }

        if (CheckSession::checkLogin($role, $request) == 200) {
            return redirect()->route("$role.home"); //redirect to home route role itself
        }

        $auth = null;

        if ($role == 'admin') {
            $auth = Admin::where('username', $request->username)->where('password', $request->password)->first();
        }elseif ($role == 'guru') {
            $auth = Guru::where('nip', $request->nip)->where('password', $request->password)->first();
        }else {
            $auth = Siswa::where('nis', $request->nis)->where('password', $request->password)->first();
        }

        if ($auth !== null) {
            session([
                'user' => $auth,
                'role' => $role
            ]);
            return redirect()->route("$role.home"); //redirect to home route role itself
        }else{
            return redirect()->route('login', ['role' => $role])->withErrors('Wrong Credentials');
        }
    }

    public function logout(Request $request, $role)
    {
        if (!in_array($role, $this->role_list())) {
            return abort(404);
        }

        if (CheckSession::checkLogin($role, $request) == 200) {
            $request->session()->forget(['user', 'role']);
            return redirect()->route('login', $role);
        }

        return abort(500);
    }
}
