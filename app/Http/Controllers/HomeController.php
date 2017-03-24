<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Post;
use App\Tag;
use App\Research;
use App\Report;
use App\User;

class HomeController extends Controller
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
    public function index()
    {
        return view('home');
    }

    public function tagsdb(Request $request)
    {

        /*//sample code in the view that uses this function
        <form method="post" action="{{ url('/tagsdb') }}">
            {{ csrf_field() }}
            <input type="text" name="tags" id="tags" value=""/>
            <input type="submit" name="submit" id="submiT" value="Submit"/>
        </form>*/

    $post = Post::find(3);//!!this should be edited to find an appropriate post and not just find 2 all the time.
    if(Tag::count()!=0)
       $post->Tag()->detach();//removes all previous tags

    $taglist = explode(";",$request->tags);//split strings @ semi-colons
    array_splice($taglist,5);//limit to 5 tags
    foreach ($taglist as $tag)//adds new tags to connections. if tag does not exist, it is added, otherwise tag is retrieved
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
      
        return redirect('index');
    }
    
    public function tagsdbResearch(Request $request)
    {
    $research = Research::find(1);//this should find an appropriate post and not just find 1 all the time.
    //if research is a type of post, look for post where post_type is [research]
    if(Tag::count()!=0)
       $research->Tag()->detach();//removes all previous tags

    $taglist = explode(";",$request->tags);//split strings @ semi-colons
    array_splice($taglist,5);//limit to 5 tags
    foreach ($taglist as $tag)//adds new tags to connections. if tag does not exist, it is added, otherwise tag is retrieved
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
            
            $research->Tag()->attach($tagitem->id);//attach to connector table
        }
      
        return redirect('index');
    }

    public function autoComplete(Request $request) {

        /* use this or edit wherever. Please add jquery links to the layout
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                
            <form method="post" action="{{ url('/tagsdbResearch') }}">
                {{ csrf_field() }}
                <input type="text" name="tags" id="tags" value="" placeholder="semicolon separates tags"/>
                <input type="submit" name="submit" id="submit" value="Submit"/>
            </form>

            </div>
        </div>
    </div>
    
   <script>
       $(document).ready(function() {
        src = "{{ route('searchajax') }}";
         $("#tags").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: src,
                    dataType: "json",
                    data: {
                        term : request.term
                    },
                    success: function(data) {
                        response(data);
                       
                    }
                });
            },
            min_length: 1,
           
         });
        });
    </script>
        */

        $query = $request->get('term','');
        
        $tags=Tag::where('tag_name','LIKE','%'.$query.'%')->get();
        
        $data=array();
        foreach ($tags as $tag) {
                $data[]=array('value'=>$tag->tag_name,'id'=>$tag->id);
        }
        if(count($data))
             return $data;
        else
            return ['value'=>'No Result Found','id'=>''];
    }

    public function reportPostdb($postid, $userid) {//following the conventions in the post controller
            //assuming this function is called from the showpost.blade.php view: <a href="{{ action('HomeController@reportPostdb',['postid' => $post[0]->id, 'userid' => $post[0]->user_id]) }}">Report Post</a>
            //to test this, try <a href="{{ action('HomeController@reportPostdb',['postid' => 1, 'userid' => 1]) }}">Report Post</a>
            $post = Post::find($postid);
            $user = User::find($userid);
            $report = Report::where('post_id','=', $postid)->first();

            //if post has no reports, then create the post, else increment the number of reports.
            if(Report::count()==0 || !$report->exists())
            {
                $reportitem = Report::create([
                    'post_id' => $post->id,
                    'number_of_reps' => 1,
                ]);
            $reportitem->User()->attach($user->id);// Attach user-report pair to pivot table
            }
            else if(!$user->Report->contains($report->id))
            {
                $reportitem = Report::where('post_id','=', $post->id)->first();
                $reportitem->number_of_reps = $reportitem->number_of_reps + 1;
                $reportitem->save();
            $reportitem->User()->attach($user->id);// Attach user-report pair to pivot table
            }

        return redirect('index');
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

            return redirect('index');
    }
    
}
