<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;

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

    $post = Post::find(2);//!!this should be edited to find an appropriate post and not just find 2 all the time.
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

}
