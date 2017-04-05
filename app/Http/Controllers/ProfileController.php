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
use App\Research;
use App\Funds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;
use App\UserRequest;

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
			$posts = app('App\Http\Controllers\PostController')->getMyPosts();
			$ptags = app('App\Http\Controllers\PostController')->getTagsAllPosts($posts);
        	$researches = Research::where('user_id', $userid)->get(); 
			// var_dump($posts);
			// var_dump($researches);
			return view('profiles.profile', ['userinfo' => $userinfo, 'posts' => $posts, 'tagnames' => $ptags, 'researches' => $researches]);
			// return view('profiles.profile', $userinfo);
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
	
	public function notifications(Request $request){
		$user_id = $request->input('user_id');
		$reqs = UserRequest::where([['user_id','=',$user_id],['ack_status','=','1']])->first();
		$arrResearch = [];
		$research = Research::where('user_id','=',$user_id)->get();
		$funders = array();
		
		foreach($research as $r){ //iterate research ids
			array_push($arrResearch, $r->id);
		}
		
		$funds = Funds::whereIn('research_id',$arrResearch)->get();
		
		foreach($funds as $f){
			if ($f->ack_status === 0){
				$funder = User::find($f->funder_id);
				$funder->amount_given = $f->amount_given;
				$funder->research_id = $f->research_id;
				$funder->fund_id_tab = $f->id;
				array_push($funders,$funder);
			}
		}
		
		//var_dump($funders);
		
		if(empty($reqs)){
			$reqs = 0;
		}else{
			$reqs = 1;
		}
		
		//var_dump($reqs);
		
		return view('profiles.notifications')->with('reqs',$reqs)->with('funders',$funders);
	}
	
	public function acknowledge(Request $request){
		$user_id = $request->input('user_id');
		$ack_type = $request->input('ack_type');
		$research_id = $request->input('research_id');
		$fund_id = $request->input('fund_id');
		$res = 0;
		
		if($ack_type === 'user_type'){
			try {
				$reqs = UserRequest::where('user_id','=',$user_id)->first();
				$reqs->ack_status = 3;
				$reqs->save();
				$res = 1;
			} catch(\Exception $e){
				abort(403,"Can't acknowledge notifications " . $e);
			}
		}else if($ack_type === 'fund_status'){
			try {
				//$fund = Funds::where([['funder_id','=',$user_id],['research_id','=',$research_id],['ack_status','=','0']])->first();
				$fund = Funds::findOrFail($fund_id);
				$fund->ack_status = 1;
				$fund->save();
				$res = 1;
			} catch(\Exception $e){
				abort(403,"Can't accept fund " . $e);
			}
		}
		
		return $res;
	}
	
	public function notifications_ajax(Request $request){
		$user_id = $request->input('user_id');
		$reqs = UserRequest::where([['user_id','=',$user_id],['ack_status','=','1']])->first();
		$arrResearch = [];
		$research = Research::where('user_id','=',$user_id)->get();
		$funders = array();
		$notifs = 0;
		
		foreach($research as $r){ //iterate research ids
			array_push($arrResearch, $r->id);
		}
		
		$funds = Funds::whereIn('research_id',$arrResearch)->get();
		
		foreach($funds as $f){
			if ($f->ack_status === 0){
				$funder = User::find($f->funder_id);
				$funder->amount_given = $f->amount_given;
				$funder->research_id = $f->research_id;
				array_push($funders,$funder);
			}
		}
		
		//var_dump($funders);
		
		if(empty($reqs)){
			$reqs = 0;
		}else{
			$reqs = 1;
		}
		
		$notifs = count($funders) + $reqs;
		
		//var_dump($reqs);
		return $notifs;
	}

	public function requestStudent(Request $request)
	{
		$user_id = $request->input('user_id');
		try
        {
            $req = new UserRequest;
            $req->ack_status = 0;
            $req->user_id = $user_id;

            $req->save();
        }
        catch(\Exception $e)
        {
            abort(403, 'No request: ' . $e);
        }
	}
}
