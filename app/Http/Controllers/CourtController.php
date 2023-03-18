<?php

namespace App\Http\Controllers;

use App\Models\court;
use App\Models\country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourtController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:court-list|court-create|court-edit|circle-delete' , ['only' => ['index' , 'show']]);
        $this->middleware('permission:circle-create' , ['only' => ['create' , 'store']]);
        $this->middleware('permission:circle-edit' , ['only' => ['edit' , 'update']]);
        $this->middleware('permission:circle-delete' , ['only' => ['destroy']]);

    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $court = court::where('company_id' , Auth::user()->company_id)
        ->with(['country' , 'circles'])
        ->simplepaginate(10);

        return view('court.index',compact('court'));
    }

     /**
     * Show form for creating permissions
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {   
        $country=country::all();
        return view('court.create',compact('country'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'court_name' => 'required|unique:courts,court_name',
            'country_id'=>'required',
        ]);

        $r = court::create([
            'court_name' => $request->input('court_name'),
            'country_id' =>$request->input('country_id'),
            'company_id' =>Auth::user()->company_id,
        ]);

        return redirect()->back()
            ->with('success',__('court created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Permission  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $court = court::where('company_id' , Auth::user()->company_id)->findOrfail($id);
       $country = country::all();
       return view('court.edit' , compact('court' , 'country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'court_name' => 'required|unique:courts,court_name',
            'country_id'=>'required',
        ]);

        $court = court::findOrfail($id);
        $court->court_name = $request->input('court_name');
        $court->country_id = $request->input('country_id');
        $country = country::all();


        return redirect()->route('court.index')
            ->withSuccess(__('court updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       court::findOrfail($id)->delete();

        return redirect()->back()
            ->withSuccess(__('court deleted successfully.'));
    }
}
