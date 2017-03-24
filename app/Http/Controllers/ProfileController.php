<?php
/**
 * Author: Tom Abao
 * Github: https://github.com/kormin
 * Email: abaotom14@gmail.com
 * Description: 
 * Created On: January 11, 2017
 * Additional Comments: 

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

 */

namespace App\Http\Controllers;

use App\Models\Users as User;
use App\Models\Post as Post;
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
		$userid = $this->getUserId();
		$userinfo = $this->readUserInfo($userid);
		if (count($userinfo) == 1) {
			// var_dump($userinfo);
			return view('profiles.profile', $userinfo);
		}else {
			return view('errors.404');
		}
	}

	/**
	 * Show the profile of user
	 * @param $userid
	 * @return \Illuminate\Http\Response
	 */
	public function visit($userid) {
		$userinfo = $this->readUserInfo($userid);
		if (count($userinfo) == 1) {
			// if $userid is Logged in user's id, then redirect to user's profile
			if ($userid == $this->getUserId()) {
				return view('profiles.profile', $userinfo);
			}
			// var_dump($userinfo);
			return view('profiles.viewprofile', $userinfo);
		}else {
			return view('errors.404');
		}
	}

	/**
	 * Show the Edit Profile view
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function edit() {
		$userid = $this->getUserId();
		$userinfo = $this->readUserInfo($userid);
		if (count($userinfo) == 1) {
			// var_dump($userinfo);
			return view('profiles.editprofile', $userinfo);
		}else {
			return view('errors.404');
		}
	}

	/**
	 * Fetches Delete profile form
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function deleteUser() {
		$userid = $this->getUserId();
		$userinfo = $this->readUserInfo($userid);
		if (count($userinfo) == 1) {
			return view('profiles.delete', $userinfo);
		}else {
			return view('errors.404');
		}
	}

	/**
	 * Gets the user id
	 *
	 * @return $userid
	 */
	public function getUserId() {
		$userid = Auth::user()->id;
		return $userid;
	}

	/**
	 * Gets array of user inputs
	 * @param null
	 * @return userInputs
	 */
	public function userInputs() {
		return array('name', 'first_name', 'last_name', 'middle_name', 'mobile_no', 'birthdate');
	}
	
	/**
	 * Fetches Edit profile form
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function editCheck(Request $request) {
		$inputvals = $this->userInputs();
		// remove null values
		$input = array(
			$inputvals[0] => $request->name, $inputvals[1] => $request->first_name,
			$inputvals[2] => $request->last_name, $inputvals[3] => $request->middle_name,
			$inputvals[4] => $request->mobile_no, $inputvals[5] => $request->birthdate
		);
		$input = array_filter($input, 'strlen');
		$this->update($input);
		return redirect()->action('ProfileController@index');
	}

	/**
	 * Fetches Delete profile form
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function deleteOption(Request $request) {
		$id = $this->getUserId();
		Auth::logout();
		switch ($request->option) {
			case 1:
				// Requires disabling foreign key constraints
				// http://stackoverflow.com/questions/34298639/laravel-migrations-nice-way-of-disabling-foreign-key-checks
				$this->delete($id);
				break;
			case 2:
				$this->deletePosts($id);
				$this->delete($id);
				break;
			default:
				return view('errors.404');
				break;
		}
		return view('welcome');
	}

	/**
	 * Get User Information for Profile Display
	 *
	 * @return $userinfo
	 */
	public function readUserInfo($userid) {
		$userinfo = User::find($userid);
		return $userinfo;
	}

	/**
	 * Updates user table in db
	 * @param $userinfo
	 * @return null
	 */
	public function update($userinfo) {
		$userid = $this->getUserId();
		$user = $this->readUserInfo($userid);
		foreach ($userinfo as $k => $v) {
			$user->$k = $v;
		}
		$user->save();
	}

	/**
	 * Deletes user from db
	 * @param $id
	 * @return null
	 */
	public function delete($id) {
		User::destroy($id);
	}

	/**
	 * Deletes user's posts from db
	 * @param $id
	 * @return null
	 */
	public function deletePosts($id) {
		$deletedRows = Post::where('user_id', $id)->delete();
	}
}
