<?php
/**
 * Author: Tom Abao
 * Github: https://github.com/kormin
 * Email: abaotom14@gmail.com
 * Description: 
 * Created On: January 11, 2016
 * Additional Comments: 
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;

class ProfileController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$data = $this->userprofile();
		return view('profile', $data);
	}

	/**
	 * Get User Information for Profile Display
	 *
	 * @return data
	 */
	public function userprofile() {
		$data = array(
			'firstname' => 'First Name',
			'lastname' => 'Last Name',
			'contactnum' => 1234567890
		);
		return $data;
	}
	
	/**
	 * Fetches Edit profile form
	 *
	 * @return null
	 */
	public function editprofile(Request $request) {
		$input = array('firstname', 'lastname', 'contactnum');

		$messages = [
			$input[0].'.max' => 'The First Name field may not be greater than 50 characters.',
			$input[1].'.max'  => 'The Last Name field may not be greater than 50 characters.',
			$input[2].'.max' => 'The Contact Number field may not be greater than 50 characters.'
		];

		$this->validate($request, [
			$input[0] => 'max:50',
			$input[1] => 'max:50',
			$input[2] => 'max:50'
		], $messages);

		$edituser = array();

		$this->update($edituser);

		return redirect()->action('ProfileController@index');
	}

	/**
	 * Updates user table in db
	 * @param $userinfo
	 * @return null
	 */
	public function update($userinfo) {
	}
}
