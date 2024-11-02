<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\ApplyPerson;
use Illuminate\Http\Request;
use DB;
use Auth;
class ApplyPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function post($id)
    {
        if($id){
            return view('post');
        }
    }
    public function applyprocess(Request $request){

        if($request->userId!='Null'){
            
            $userDublicateCheck = ApplyPerson::where('tracking_id', $request->trackingId)->where('user_id', $request->userId)->get()->first();
            if(!empty($userDublicateCheck)){
                return redirect()->route('dashboard')->with('success','Already submitted');
            }

            $postAddress = Post::where('tracking_id', $request->trackingId)->get()->pluck('address')->first();
            dd($postAddress);
            $user = DB::table('users')->where('address', 'LIKE', '%' . strtolower($postAddress) . '%')->first();
            if($user){
                $data = new ApplyPerson();
                $data->tracking_id = $request->trackingId;
                $data->user_id = $request->userId;
                $data->save();
                return redirect()->route('dashboard')->with('success','Submit Confirm');
            }
            else{
                return redirect()->route('dashboard')->with('success','Not match');
            }
        }else{

            $url = $request->url;
            return view('auth.login', compact('url'));
        }
    }

    
    public function index()
    {
 
        $postId = Post::where('user_id', Auth::id())->get()->pluck('tracking_id')->first();
        $data = ApplyPerson::where('tracking_id', $postId)->get();
        // $data = ApplyPerson::where('tracking_id', '7520103EW')->get();
        return view('list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request){
            return redirect()->route('dashboard')->with('success','Successfully Managed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ApplyPerson  $applyPerson
     * @return \Illuminate\Http\Response
     */
    public function show(ApplyPerson $applyPerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ApplyPerson  $applyPerson
     * @return \Illuminate\Http\Response
     */
    public function edit(ApplyPerson $applyPerson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ApplyPerson  $applyPerson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ApplyPerson $applyPerson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ApplyPerson  $applyPerson
     * @return \Illuminate\Http\Response
     */
    public function destroy(ApplyPerson $applyPerson)
    {
        //
    }
}
