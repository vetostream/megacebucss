<?php
/**
 * Author: Tom Abao
 * Github: https://github.com/kormin
 * Email: abaotom14@gmail.com
 * Description: 
 * Created On: December 12, 2016
 * Additional Comments: 
getPostTypeId() currently static
Values Columns:
post_type
user_type
--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `post_type_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

 */

namespace App\Http\Controllers;

use App\Models\Post as Post;
use App\Models\PostComment as PostComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Tag;
//zafra edit april 02 app\user and report
use App\User;
use App\Report;


class PostController extends Controller
{
	// protected $table = 'posts';

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
	public function index()
	{
		// $posts = Post::all();
		$posts = $this->read();
		$userid = $this->getUserId();
		// $name = $this->readUserName($userid);
		$ptags = $this->getTagsAllPosts($posts);
		return view('posts.showposts', ['posts' => $posts, 'userid' => $userid, 'tagnames' => $ptags]);
		// return view('posts.showposts', ['posts' => $posts, 'userid' => $userid]);
		// $page = $posts->simplePaginate(1);
	}

	/**
	 * Show the individual post
	 * @param $postid
	 * @return \Illuminate\Http\Response
	 */
	public function showPost($postid) {
		$post = $this->readUserPost($postid);
		$userid = $this->getUserId();
		$tagnames = $this->readTagByPostId($postid);
		$comments = DB::table('postscom')->join('users', 'postscom.user_comment', '=', 'users.id')->where('post_id', '=', $postid)->get();
		$likes = DB::table('likedtl')->where('post_id','=',$postid)->get();
		$checkStat = DB::table('likedtl')->where([['post_id', '=', $postid],['user_id','=',Auth::user()->id]])->first();
		$ableLike = 1;
		
		if(!empty($checkStat)){
			$ableLike = 0; //only unlike
		}
		// var_dump($tagnames);
		// echo !is_null($tagnames);
		return view('posts.showpost', ['post' => $post, 'userid' => $userid, 'tagnames' => $tagnames, 'comments' => $comments,'likes' => count($likes),
									   'ableLike' => $ableLike]);
		// return view('posts.showpost', ['post' => $post, 'userid' => $userid]);
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

	public function getTagsAllPosts($posts) {
		$tagnames = $this->readAllTags();
		// var_dump($posts[0]);
		// var_dump($tagnames[0]);
		$plen = count($posts);
		$taglen = count($tagnames);
		$ptags = array();
		for ($ip=0; $ip < $plen; $ip++) { 
			for ($i=0; $i < $taglen; $i++) {
				if ($tagnames[$i]->post_id == $posts[$ip]->id) {
					// echo $tagnames[$i]->post_id.'<br>';
					$ptags[$posts[$ip]->id] = $this->readTagByPostId($posts[$ip]->id);
				}
			}
		}
		// foreach ($ptags as $i => $v) {
		// 	foreach ($v as $i1 => $v1) {
		// 		if ($i == 27) {
		// 			var_dump($v1[0]->tag_name);
		// 		}
				
		// 	}
		// }
		// var_dump($ptags);
		// var_dump($ptags[27]);
		return $ptags;
	}

	/**
	 * Gets the post id
	 *
	 * @return $postid
	 */
	public function getPostTypeId() {
		$posttypeid = 1;
		return $posttypeid;
	}

	public function getMyPosts() {
		$userid = $this->getUserId();
		$posts = $this->readByUserId($userid);
		return $posts;
	}

	public function showMyPosts() {
		$userid = $this->getUserId();
		$posts = $this->readByUserId($userid);
		$ptags = $this->getTagsAllPosts($posts);
		// $users = DB::table('users')->get();
		// var_dump($posts);
		return view('posts.showmyposts', ['posts' => $posts, 'tagnames' => $ptags]);
	}

	public function insertPost() {
		return view('posts.createpost');
	}

	public function updatePost($postid, $userid) {
		// add check if user_id == user's id; if not, no edit allowed
		if ($userid != $this->getUserId()) {
			return view('errors.404');
		}
		$post = $this->readByPostId($postid);
		if ($post == null) {
			return view('errors.404');
		}
		// var_dump($post);
		return view('posts.editpost', $post);

		// try {
		// 	$post = Post::findOrFail($postid);
			// return view('posts.editpost', $post);
		// } catch(Exception $e) {
		// 	return view('errors.404');
		// 	// abort(404,"Research ID not Found!");
		// }
	}

	/**
	 * Deletes post from table
	 * @param null
	 * @return null
	 */
	public function deletePost($postid, $userid) {
		if ($userid != $this->getUserId()) {
			return view('errors.404');
		}
		$this->delete($postid);
		return redirect()->action('PostController@index');
	}

	/**
	 * Gets array of user inputs
	 * @param null
	 * @return userInputs
	 */
	public function userInputs() {
		return array('title', 'content', 'postimg');
	}

	/**
	 * Gets the post from form and inserts to posts table
	 * @param Request $request
	 * @return null
	 */
	public function getPost(Request $request) {
		$input = $this->userInputs();

		$messages = [
			$input[0].'.required' => 'Title field is required.',
			$input[1].'.required' => 'Content field is required.',
			$input[2].'.image' => 'File must be an image.',
			// $input[2].'.required' => 'No image chosen.'
		];

		$this->validate($request, [
			$input[0] => 'required',
			$input[1] => 'required',
			$input[2] => 'image'
		], $messages);

		$picname = null;
		if ($request->hasFile($input[2])) {
			$path = $request->file($input[2])->store('public');
			$picname = pathinfo($path, PATHINFO_FILENAME).'.'.pathinfo($path, PATHINFO_EXTENSION);
		}
		$lastpostid = $this->create($request->$input[0], $request->$input[1], $picname);
		// echo "Last Post id:".$lastpostid;
		// $path = $request->postimg->store('postimages');
		// $path = $request->file('postimg')->storeAs('postimages', 'testing');
		// $path = $request->file($input[2])->storeAs('postimages', $postid);
  //       $this->insertImagePath($path);

		// $newpost = Post::create([
		// 			'title' => $request->title,
		// 			'content' => $request->content,
		// 			'user_id' => Auth::user()->id,
		// 			// 'post_type_id' => 1,
		// 			//'' => $picname, From Zafra: "Does the database support a picture?"
		// 		]);

		// //--beyond this point is zafra country
		// $lastpostid = $newpost->id;

		$post = $this->readByPostId($lastpostid);
		// $post = Post::find($lastpostid);//this should find an appropriate post and not just find 1 all the time.

		if(Tag::count()!=0) {
			$post->Tag()->detach();//removes all previous tags
			// echo "tag count != 0";
		}

		$tagslist = explode(";",$request->tags);
		// $tagslist = explode(";",$request->tags,6);
		// var_dump($request->tags);
		// var_dump($tagslist);
		unset($tagslist[0]);
		array_values($tagslist);
		foreach ($tagslist as $tag)//adds new tags to connections. if tag does not exist, it is added, otherwise tag is retrieved
		{
			if(Tag::count()==0 || !Tag::where('tag_name','=', $tag)->exists())
			{
				$tagitem = Tag::create([
					'tag_name' => $tag,
				]);
			}
			else
			{
				$tagitem = Tag::where('tag_name','=', $tag)->first();
			}

			$post->Tag()->attach($tagitem->id);//attach to connector table
		}
		
		return redirect()->action('PostController@index');
	}

	/**
	 * Gets the post from form and edits to posts table
	 * @param Request $request
	 * @return null
	 */
	public function editPost(Request $request, $postid, $userid) {
		if ($userid != $this->getUserId()) {
			return view('errors.404');
		}
		$inputvals = $this->userInputs();
		$input = array($inputvals[0] => $request->title, $inputvals[1] => $request->content);
		// remove null values
		$input = array_filter($input, 'strlen');
		// var_dump($input);
		$this->update($postid, $input);
		return redirect()->action('PostController@index');
	}

	public function insertPostComment(Request $request) {
        $post_id = $request->input("post_id");
        $post_comment = new PostComment;
        $post_comment->content = $request->input("comment_content");
        $post_comment->post_id = $post_id;
        $post_comment->user_comment = $this->getUserId();
        $post_comment->save();

        return redirect("posts/postid/$post_id");
	}

	public function create($title, $content, $path) {
		$userid = $this->getUserId();
		// $posttypeid = $this->getPostTypeId();
		// $arr = ['title' => $title, 'content' => $content, 
		// 'created_at' => $created, 'updated_at' => $updated,
		// 'user_id' => $userid, 'post_type_id' => $posttypeid];
		// var_dump($arr);
		// DB::table($table)->insert($arr);

		$post = new Post;
		$post->title = $title;
		$post->content = $content;
		$post->user_id = $userid;
		$post->document_file_name = $path;
		// $post->post_type_id = $posttypeid;
		$post->save();
		return $post->id;
	}

	public function insertImagePath($path) {
		$post = $this->readByPostId($postid);
		$post->document_file_name = $path;
		$post->save();
	}

	public function readUserName($userid) {
		$uname = DB::table('users')->where('id', $userid)->value('name');
		return $uname;
	}

	public function read() {
		// SELECT `posts`.`id`,`posts`.`title`,`posts`.`content`,`posts`.`user_id`,`users`.`name` FROM `users` JOIN `posts` ON `users`.`id` = `posts`.`user_id`
		$res = DB::select("SELECT `posts`.`id`,`posts`.`title`,`posts`.`content`,`posts`.`document_file_name`,`posts`.`user_id`,`users`.`name` FROM `users` JOIN `posts` ON `users`.`id` = `posts`.`user_id`");
		return $res;
	}

	public function readUserPost($postid) {
		$res = DB::select("SELECT `posts`.`id`,`posts`.`title`,`posts`.`content`,`posts`.`user_id`,`posts`.`document_file_name`,`users`.`name` FROM `users` JOIN `posts` ON `users`.`id` = `posts`.`user_id` WHERE `posts`.`id` = :id", ['id' => $postid]);
		return $res;
	}

	public function readByPostId($postid) {
		// $post = DB::table()->where('picname', $picname)->first();
		// $post = App\Models\Post::find($postid);
		$post = Post::find($postid);
		return $post;
	}

	public function readByUserId($userid) {
		$posts = Post::where('user_id', $userid)->get();
		return $posts;
	}

	public function readAllTags() {
		$tagids = DB::table('postdtl')->get();
		// var_dump($tagids);
		return $tagids;
	}

	public function readTagByPostId($postid) {
		$tagids = DB::table('postdtl')->where('post_id', $postid)->get();
		$i=0;
		$arrlen = count($tagids);
		$tagnames = array();
		for ($i=0; $i<$arrlen; $i++) {
			// echo $tagids[$i]->tag_id;
			$tagnames[$i] = DB::table('tags')->where('id', $tagids[$i]->tag_id)->get();
		}
		// var_dump($tagids);
		// var_dump($tagnames[0]);
		return $tagnames;
	}

	/**
	 * Updates a post from postid
	 * $postvals = ['tablename' => value, ...]
	 * @param $postid, $postvals
	 * @return null
	 */
	public function update($postid, $postvals) {
		$post = $this->readByPostId($postid);
		foreach ($postvals as $k => $v) {
			$post->$k = $v;
		}
		$post->save();
	}

	public function updateTitle($postid, $title) {
		$post = $this->readByPostId($postid);
		$post->$title = $title;
		$post->save();
	}

	public function updateContent($postid, $content) {
		$post = $this->readByPostId($postid);
		$post->$content = $content;
		$post->save();
	}

	public function updateAll($postid, $title, $content) {
		// $updated = $this->getTime();
		// $arr = ['title' => $title, 'content' => $content, 'updated_at' => $updated];
		// DB::table($table)->where('id', $vid)->update($arr);
		$post = $this->readByPostId($postid);
		$post->$title = $title;
		$post->$content = $content;
		$post->save();
	}

	public function delete($postid) {
		// DB::table($table)->where('id', $vid)->delete();
		Post::destroy($postid);
	}

	//report and unreport functionality by zafra
	public function reportPostdb($postid, $userid) {//following the conventions in the post controller
            //assuming this function is called from the showpost.blade.php view: <a href="{{ action('HomeController@reportPostdb',['postid' => $post[0]->id, 'userid' => $post[0]->user_id]) }}">Report Post</a>
            //to test this, try <a href="{{ action('HomeController@reportPostdb',['postid' => 1, 'userid' => 1]) }}">Report Post</a>
            $post = Post::find($postid);
            //$user = User::find($userid);
            $user = User::find($this->getUserId());
            $report = Report::where('post_id','=', $postid)->first();

            //if post has no reports, then create the post, else increment the number of reports.
            if(Report::count()==0 || $report==NULL)
            {
                $reportitem = Report::create([
                    'post_id' => $post->id,
                    'number_of_reps' => 1,
                ]);
            	$reportitem->User()->attach($user->id);// Attach user-report pair to pivot table
            }
            else if(($user->Report()->where('post_id',$post->id)->first() == NULL))
            {
                $reportitem = Report::where('post_id','=', $post->id)->first();
                $reportitem->number_of_reps = $reportitem->number_of_reps + 1;
                $reportitem->save();
            	$reportitem->User()->attach($user->id);// Attach user-report pair to pivot table
            }

        return redirect()->action('PostController@index');
    }

    public function unreport($postid, $userid){
            $reportitem = Report::where('post_id','=', $postid)->first();

            $reportitem->User()->detach($userid);
            $reportitem->number_of_reps = $reportitem->number_of_reps - 1;
            $reportitem->save();
            if($reportitem->number_of_reps < 1)
            {
                //delete it
                $reportitem->delete();
            }

            return redirect()->action('PostController@index');
    }
	
	public function likePost(Request $request){
		//get user id
		$user_id = $request->input('user_id');
		$post_id = $request->input('post_id');
		
		$checkStat = DB::table('likedtl')->where([['post_id', '=', $post_id],['user_id','=',$user_id]])->first();
		
		if(empty($checkStat)){ //if true user can like.
			$arrData = array('post_id' => $post_id, 'user_id' => $user_id);
		
			try {
				DB::table('likedtl')->insert($arrData);
				return "1";
			}catch(\Exception $e){
				abort(404,"Something went wrong.");
			}
		}else{
			return "0"; //user already liked.
		}	
	}
	
	public function unlikePost(Request $request){
		$user_id = $request->input('user_id');
		$post_id = $request->input('post_id');
		
		$checkStat = DB::table('likedtl')->where([['post_id', '=', $post_id],['user_id','=',$user_id]])->first();
		
		if(!empty($checkStat)){ //if true user can unlike
			$arrData = array('post_id' => $post_id, 'user_id' => $user_id);
		
			try {
				DB::table('likedtl')->where([['post_id', '=', $post_id],['user_id','=',$user_id]])->delete();
				return "1";
			}catch(\Exception $e){
				abort(404,"Something went wrong.");
			}
		}else{
			return "0"; //user didn't event like the post!
		}
		
	}

}
