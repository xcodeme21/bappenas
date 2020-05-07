<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User; 
use DB;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */   
    public function dashboard()
    {
		$totaluser=DB::table('users')->count();

		$data = array(  
			'indexPage' => "dashboard",
			'totaluser' => $totaluser,
		);
        return view('backend.home')->with($data);
	}
	
	public function logout(Request $request)
	{
		Auth::logout();
		flash('Terima kasih telah menggunakan aplikasi ini. Sampai ketemu lagi.')->success(); 
		return redirect('/');
	}
	
}
