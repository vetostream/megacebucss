<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use App\User;
use App\Report;
use App\UserRequest;

use App\Http\Middleware\checkSuperAdmin;

class SuperadminController extends Controller
{
    public function __construct()
    {
        $this->middleware(checkSuperAdmin::class);
    }

    public function index()
    {
		$reqs = UserRequest::where('ack_status','=','0')->get()->count();
        return view('superadmin.index')->with('reqs',$reqs);
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

    public function viewAllReports()
    {
        $reports = Report::all();
        return view('superadmin.reports', compact('reports'));
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
	
	public function showRequests(Request $request){
		$arrId = [];
		try {
			$user_reqs = UserRequest::where('ack_status','=','0')->get();
			
			foreach($user_reqs as $reqs){
				array_push($arrId,$reqs->user_id);
			}
			
			$users = User::whereIn('id',$arrId)->get();
		} catch(\Exception $e) {
			$user_reqs = NULL;
			abort(403, "Cannot show requests " . $e);			
		}
		
		return view('superadmin.requests')->with('user_reqs',$user_reqs)->with('users',$users);
	}
	
	public function changeType(Request $request){
		$user_id = $request->input('user_id');
		$res = '0';
		
		try{
			$user = User::findOrFail($user_id);
			$reqs = UserRequest::where('user_id','=',$user_id)->first();
			$user->user_type_id = 2;
			$reqs->ack_status = 1;
			$user->save();			
			$reqs->save();
			$res = '1';
		} catch(\Exception $e){
			abort(403,'Cant change user type:' + $e);
		}
		
		return $res;
	}

}
 ?>