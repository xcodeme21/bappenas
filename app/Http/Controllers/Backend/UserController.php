<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator, Auth, Mail, DB, Hash, Response, DateTime;
use Yajra\Datatables\Datatables;

class UserController   extends Controller

{ 

    protected $base = 'backend.user.';

    public function __construct()
    {
        view()->share('base', $this->base);
    } 

	

    public function index()
    { 		
		$user=DB::table('users')->join('tb_level','users.id_level','=','tb_level.id')->select('users.*','tb_level.level')->get();

		$data = array(   
			'indexPage' => "master-user",
			'user' => $user
		);

		return view($this->base.'index')->with($data); 
	} 
	
	public function tambah()
    { 
		$level=DB::table('tb_level')->where('id','!=',1)->get();

		$data = array( 
			'indexPage' => "tambah-user",
			'level' => $level
		);

		return view($this->base.'add')->with($data);
    } 

	public function add(Request $request)
    { 
		$nama=$request->input('nama');
		$email=$request->input('email');
		$nip=$request->input('nip');
		$no_hp=$request->input('no_hp');
		$alamat=$request->input('alamat');
		$id_level=$request->input('id_level');
		$password=$request->input('password');
		$ulangi_password=$request->input('ulangi_password');

		$ceknip=DB::table('users')->where('nip',$nip)->first();

		if($ceknip != null)
		{
            flash('NIP telah terdaftar. Silahkan menggunakan nip yang lain!')->error();
			return redirect('/backend/user');
		}

		if($password != $ulangi_password)
		{
            flash('Password tidak sama!')->error();
			return redirect('/backend/user');
		}
		

		$insert =DB::table('users')->insert(
			[
				'nama' => $nama,
				'email' => $email,
				'nip' => $nip,
				'no_hp' => $no_hp,
				'alamat' => $alamat,
				'id_level' => $id_level,
				'password' => bcrypt($password),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s'),
			]
		);

		flash('User berhasil ditambahkan.')->success();
		return redirect('/backend/user');
    } 
  

	public function edit($id)
    { 
		$user =DB::table('users')->where('id',$id)->first();
		$level=DB::table('tb_level')->where('id','!=',1)->get();

		$data = array( 
			'indexPage' => "edit-user",
			'user' => $user,
			'level' => $level,
		);

		return view($this->base.'update')->with($data);

    } 

	public function update(Request $request)
    { 
		$id=$request->input('id');// var_dump($id);die();
		$nama=$request->input('nama');
		$email=$request->input('email');
		$nip=$request->input('nip');
		$no_hp=$request->input('no_hp');
		$alamat=$request->input('alamat');
		$id_level=$request->input('id_level');
		$password=$request->input('password');
		$ulangi_password=$request->input('ulangi_password');

		if($password != $ulangi_password)
		{
            flash('Password tidak sama!')->error();
			return redirect('/backend/user');
		}
		

		$update=DB::table('users')->where('id',$id)->update(
			[
				'nama' => $nama,
				'email' => $email,
				'nip' => $nip,
				'no_hp' => $no_hp,
				'alamat' => $alamat,
				'id_level' => $id_level,
				'password' => bcrypt($password),
				'updated_at' => date('Y-m-d H:i:s'),
			]
		);

		flash('User berhasil diupdate.')->success();
		return redirect('/backend/user');
    } 
  

	public function hapus($id)
    { 
		$delete =DB::table('users')->where('id',$id)->delete();

		flash('User telah dihapus.')->success();
		return redirect('/backend/user');

    } 
	

}

