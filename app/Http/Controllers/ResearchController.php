<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Research;
use App\Funds;
use App\User;
use App\Http\Requests\StoreResearch;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResearchController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get all research
        $researches = Research::all(); //SELECT * FROM RESEARCHES WHERE ID > 0;
        return view('research.index')->with('researches', $researches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('research.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResearch $request)
    {
        $research = new Research;

        $research->title = $request->input('title');
        $research->research_abstract = $request->input('research_abstract');
        $research->user_id = $request->user()->id;
        $user_id = $request->user()->id;
        $title = trim($request->input('title'));
        $file_name_str = "$user_id-"."$title";
        $path = $request->file('document_file_name')->storeAs('researches',$file_name_str);
        $research->document_file_name = $path;
        $research->save();

        return redirect('/research');
    }

    /**
     * Gets the user id
     * Author: Tom Abao
     * @return $userid
     */
    public function getUserId() {
        $userid = Auth::user()->id;
        return $userid;
    }

    public function showManus(Request $request){
        $file_name = $request->input('file_name');
        $path = storage_path("app\\".$file_name);

        return Response::make(file_get_contents($path), 200, [
            'Content-Type' => 'application/pdf',
        ]);        
        // $file = Storage::disk('local')->get($request->input('file_name'));

        // $url = Storage::url($file);

        // var_dump($url);
        // // return response()->file($file,['Content-Type'=>'application/pdf']);
        // return Response::make(file_get_contents($file), 200, [
        //     'Content-Type' => 'application/pdf'
        // ]);        
    }
    /**
     * Get User Information for Profile Display
     * Author: Tom Abao
     * @return $userinfo
     */
    public function readUserInfo($userid) {
        $userinfo = User::find($userid);
        return $userinfo;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        try 
        {
            $research = Research::findOrFail($id);

            $user = User::where('id', '=', $research->user_id)->get();
            $funds = Funds::where('research_id', '=', $id)->get();
            
            $fund_total = 0;
            foreach($funds as $fun)
            {
                $fund_total += $fun->amount_given;
            }
            $research->fund_total = $fund_total;
            $research->user = $user;

            $redr = view('research.detail')->with('research', $research);

            if($research->user_id != $request->user()->id){
                $redr = view('research.abstract')->with('research', $research)->with('user', $request->user());
            }

            return $redr;
        }
        catch(\Exception $e)
        {
            abort(404,"Research ID not Found!");
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $research = Research::findOrFail($id);
            return view('research.edit')->with('research', $research);
        }
        catch(\Exception $e){
            abort(404,"Research ID not Found!");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreResearch $request, $id)
    {
        try{
            $research = Research::findOrFail($id);
            $research->title = $request->input('title');
            $research->research_abstract = $request->input('research_abstract');
            $research->save();

            return view('research.detail')->with('research',$research);
        }catch(\Exception $e){
            abort(404, $e);
        }
    }

    // public function fund(Request $request,$id){
    //     $fund = new Funds;

    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        try
        {
            $research = Research::findOrFail($id);
            $research->delete();
        }
        catch(\Exception $e){
            abort(404, $e);
        }
    }

    /*******************************************************************************************************
        F             U             N             D             I             N             G
     *******************************************************************************************************/
    public function fund(Request $request, $research_id, $funder_id)
    {
        $fund = new Funds;

        $fund->amount_given = $request->input('amount');
        $fund->funder_id    = $funder_id;
        $fund->research_id  = $research_id;

        $fund->save();

        return redirect("research/detail/$research_id");
    }

    public function fundHistory(Request $request, $id)
    {
        // $history = Funds::where('research_id', '=', $id)->get();

        $history = DB::table('funds')->join('users', 'funds.funder_id', '=', 'users.id')->where('research_id', '=', $id)->get();

        return view('research/fund_history')->with('history', $history);
    }
}
