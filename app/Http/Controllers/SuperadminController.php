<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use App\User;

use App\Http\Middleware\checkSuperAdmin;

class SuperadminController extends Controller
{
    public function __construct()
    {
        $this->middleware(checkSuperAdmin::class);
    }

    public function index()
    {
        return view('superadmin.index');
    }

	public function changeRole(Request $request)
    {
    	$user_id = $request->input('user_id');
        $user = User::findOrFail($user_id);

        $user->user_type_id = $request->input('usertype');

        $user->save();        
    }

    public function viewAllUsers()
    {
    	$users = User::all();
    	return view('superadmin.users', compact('users'));

        // $users = DB::table('users')->join('user_type', 'users.user_type_id', '=', 'user_type.id')->select('users.*', 'user_type.name as user_type_name')->get();

        // return view('superadmin.users')->with('users', $users);
    }

	public function deleteUser($id, Request $request)
    {
		try {
			$user = User::findOrFail($id);
			$user->delete();

            $allUsers = User::all();
            return view('superadmin.users', compact('allUsers'));
		} catch (\Exception $e) {
			abort(404, "User ID not found");
		}
	}

	
}
 ?>