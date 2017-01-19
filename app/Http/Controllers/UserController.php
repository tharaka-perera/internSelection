<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Database\DataConnection;
use Illuminate\Support\Facades\Auth;
use App\Events\emailVerify;
use Illuminate\Support\Facades\Event;
use App\functions\functions;
use Hash;
use View;
use Session;
Use Input;
Use App\Student;
Use App\Coordinator;

class UserController extends Controller{
	
	

public function checkdatabasequery()
{
	
	$testDB = new functions();
	$testDB -> testFunction();
	 return view('welcome');
}

public function RegisterStudent(Request $request)
{	
 
	$this->validate($request,[
			'username' => 'required',
			'password' => 'required|min:3'
			]);
	
		$student = new Student();
		$student->index_no = $request['Index_no'];
		$student->username = $request['username'];
		$student->password = bcrypt($request['password']);
		$student->email = $request['email'];
		$student->save();
	$user=new User();
	$user->index_no = $request['Index_no'];
	$user->password = bcrypt($request['password']);
	$user->type = 'Student';
	$user->save();
	
}
public function RegisterCoordinator(Request $request)
{	
 
	$this->validate($request,[
			'username' => 'required',
			'password' => 'required|min:3'
			]);
	
		$Coordinator = new Coordinator();
		$Coordinator->ID = $request['Index_no'];
		$Coordinator->Company_Name = $request['Company_Name'];
		$Coordinator->username = $request['username'];
		$Coordinator->password = bcrypt($request['password']);
		$Coordinator->email = $request['email'];
		$Coordinator->save();
	$user=new User();
	$user->index_no = $request['Index_no'];
	$user->password = bcrypt($request['password']);
	$user->type = 'Coordinator';
	$user->save();
	
}

	
}

?>