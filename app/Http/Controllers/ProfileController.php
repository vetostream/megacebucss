<?php
/**
 * Author: Tom Abao
 * Github: https://github.com/kormin
 * Email: abaotom14@gmail.com
 * Description: 
 * Created On: January 11, 2016
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
		if (count($data) == 1) {
			return view('profiles.profile', ['data' => $data]);
		}else {
			return view('errors/404');
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
	 * Get User Information for Profile Display
	 *
	 * @return data
	 */
	public function userprofile() {
		$id = $this->getUserId();
		$userinfo = DB::table('users')->where('id', $id)->get();
		return $userinfo;
	}


	/**
	 * Gets array of user inputs
	 * @param null
	 * @return userInputs
	 */
	public function userInputs() {
		return array();
	}
	
	/**
	 * Fetches Edit profile form
	 *
	 * @return null
	 */
	public function editprofile(Request $request) {
		$input = $this->userInputs();
		// remove null values
		$input = array_filter($input, 'strlen');

		$this->update($input);

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
