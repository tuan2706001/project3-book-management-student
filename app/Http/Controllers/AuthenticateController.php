<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\Redirect;

use function PHPUnit\Framework\returnValueMap;

class AuthenticateController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginProcess(Request $request)
    {
        $email = $request->get('stu_userName');
        $password = $request->get('stu_passWord');

        try {
            $ministry = Student::where('stu_userName', $email)->where('stu_passWord', $password)->firstOrFail();

            if ($ministry->status == 1) {
                return Redirect::route("login")->with('error', [
                    "message" => 'Nick đã bị khóa !',
                ]);
            } else {
                $request->session()->put('stu_id', $ministry->stu_id);
                $request->session()->put('stu_name', $ministry->stu_name);
                $request->session()->put('status', $ministry->status);
                $request->session()->put('cl_id', $ministry->cl_id);
                return Redirect::route("home.index");
            }
        } catch (Exception $e) {
            return Redirect::route("login")->with('error', [
                "message" => 'Sai Email hooặc mật khẩu !',
                "email" => $email

            ]);
        }
        return $request;
    }

    public function logout(Request $request)
    {
        //xoa session
        $request->session()->flush();
        //dieu huong ve trang login
        return Redirect::route("login");
    }
}
