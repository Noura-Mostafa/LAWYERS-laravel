<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete' , ['only' => ['index' , 'show']]);
        $this->middleware('permission:permission-create' , ['only' => ['create' , 'store']]);
        $this->middleware('permission:permission-edit' , ['only' => ['edit' , 'update']]);
        $this->middleware('permission:permission-delete' , ['only' => ['destroy']]);

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();

        return view('permissions.index', [
            'permissions' => $permissions
        ]);
    }

     /**
     * Show form for creating permissions
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {   
        return view('permissions.create');
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
            'name' => 'required|unique:users,name'
        ]);

        Permission::create($request->only('name'));

        return redirect()->route('permissions.index')
            ->with('success',__('Permission created successfully.'));
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
    public function edit(Permission $permission)
    {
        return view('permissions.edit', [
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name,'.$permission->id
        ]);

        $permission->update($request->only('name'));

        return redirect()->route('permissions.index')
            ->withSuccess(__('Permission updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('permissions.index')
            ->withSuccess(__('Permission deleted successfully.'));
    }
}
