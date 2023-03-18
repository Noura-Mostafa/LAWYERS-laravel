<?php

namespace App\Http\Controllers;

use App\Models\court;
use App\Models\circle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CircleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:circle-list|circle-create|circle-edit|circle-delete' , ['only' => ['index' , 'show']]);
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
        $circle = circle::where('company_id' , Auth::user()->company_id)
        ->with('court')
        ->simplepaginate(10);
        return view('circle.index',compact('circle'));
    }

     /**
     * Show form for creating permissions
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {   
        $court=court::all();
        return view('circle.create',compact('court'));
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
            'circle_name' => 'required|unique:circles,circle_name',
            'court_id'=>'required',
        ]);

        $r = circle::create([
            'circle_name' => $request->input('circle_name'),
            'court_id' =>$request->input('court_id'),
            'company_id' =>Auth::user()->company_id,
        ]);

        return redirect()->back()
            ->with('success',__('Circle created successfully.'));
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
       $circle = circle::findOrfail($id);
       $court = court::all();
       return view('circle.edit' , compact('court' , 'circle'));
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
            'circle_name' => 'required|unique:circles,circle_name',
            'court_id'=>'required',
        ]);

        $circle = circle::findOrfail($id);
        $circle->circle_name = $request->input('circle_name');
        $circle->court_id = $request->input('court_id');
        $court = court::all();


        return redirect()->route('circle.index')
            ->withSuccess(__('Circle updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       circle::findOrfail($id)->delete();

        return redirect()->back()
            ->withSuccess(__('Circle deleted successfully.'));
    }
}
