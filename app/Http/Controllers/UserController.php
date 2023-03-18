<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;


class UserController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:employee-list|employee-create|employee-edit|employee-delete' , ['only' => ['index' , 'show']]);
        $this->middleware('permission:employee-create' , ['only' => ['create' , 'store']]);
        $this->middleware('permission:employee-edit' , ['only' => ['edit' , 'update']]);
        $this->middleware('permission:employee-delete' , ['only' => ['destroy']]);

    }


   public function index(){
    $users = User::latest()->where('company_id',Auth::user()->company_id)->with('profile')->simplepaginate(5);

    return view('users.index', compact('users'));
   }

   /**
     * Show form for creating user
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        return view('users.create');
    }

    /**
     * Store a newly created user
     * 
     * @param User $user
     * @param StoreUserRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, StoreUserRequest $request) {
    //   $this->validate($request)([
    //    'name'=>'required',
    //    'email'=>'required',
    // ]);
        //For demo purposes only. When creating user or inviting a user
        // you should create a generated random password and email it to the user
        $user->create([
         'name'=>$request->get('name'),
         'email'=>$request->get('email'),
         'company_id'=>Auth::user()->company_id,
         'password'=>Hash::make($request->get('password')),


        ]);

        return redirect()->route('users.index')
            ->with('success',__('Employee created successfully.'));
    }
    
/**
     * Show user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(User $id) 
    {
        return view('users.show', [
            'user' => $id
        ]);
    }

    /**
     * Edit user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) 
    {
        return view('users.edit', compact('user')); 
        
        // 
        //     'user' => $user,
        //     // 'userRole' => $user->roles->pluck('name')->toArray(),
        //     // 'roles' => Role::latest()->get()
        // 
    }


    /**
     * Update user data
     * 
     * @param User $user
     * @param UpdateUserRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UpdateUserRequest $request) 
    {
        $user->update($request->validated());

        // $user->syncRoles($request->get('role'));

        return redirect()->route('users.index')
            ->with('success',__('Employee updated successfully.'));
    }

     /**
     * Delete user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) 
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success',__('Employee deleted successfully.'));
    }
}
 



