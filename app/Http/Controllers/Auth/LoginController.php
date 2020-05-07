<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller; 
use App\User;
use App\Models\LoginFront;  
use Validator, Auth, DB; 
use Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
 
    public function login_form()
    {
		if (Auth::check()) {
			// The user is logged in...
			return redirect('backend/dashboard');
		}
        $querySistem = null;
		$data = array(   
			'querySistem' => $querySistem, 
		);
		
        return view('auth.login')->with($data);;
    }
	
    public function masuk(Request $request)
    {
        $rules = [
            'email'   => 'required',
            'password'=> 'required',
            'captcha'=>'required|captcha',
        ];
         $messages = [
            'required'=>"Harus diisi.",
            'captcha'=>"Captcha tidak sesuai",
        ];
        $remember = $request->input('remember');
        $validation = Validator::make($request->all(),$rules, $messages);
        if($validation->fails()){
            return redirect()->back()
                ->withInput()
                ->withErrors($validation);
        }

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember)) { 
            flash('Selamat datang di Aplikasi Disposisi Surat Menyurat.')->success(); 
			return redirect('backend/dashboard');
        }else{ 
            flash('Login gagal. Silahkan cek kembali isian Anda!')->error();
			return redirect('/'); 
        }

    }
	
    public function reloadCaptcha()
    {
        return captcha_img();
    }


}
